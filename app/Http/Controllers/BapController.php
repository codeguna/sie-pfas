<?php

namespace App\Http\Controllers;

use App\Models\Bap;
use App\Models\Facility;
use App\Models\FacilityDamage;
use App\Models\MataKuliah;
use App\Models\Room;
use App\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

/**
 * Class BapController
 * @package App\Http\Controllers
 */
class BapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baps = Bap::paginate();
        $users = User::has('employee')->orderBy('name', 'ASC')->pluck('id', 'name');
        return view(
            'bap.index',
            compact(
                'baps',
                'users'
            )
        )
            ->with('i', (request()->input('page', 1) - 1) * $baps->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bap = new Bap();
        $rooms = Room::orderBy('name', 'ASC')->pluck('id', 'name');
        $mata_kuliah = MataKuliah::orderBy('name', 'ASC')->pluck('id', 'name');
        $facility = Facility::orderBy('name', 'ASC')->pluck('id', 'name');
        return view(
            'bap.create',
            compact(
                'bap',
                'facility',
                'mata_kuliah',
                'rooms'

            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $bap = Bap::create([
            'user_id' => $request->user_id,
            'ticket_code' => $request->ticket_code,
            'room_id' => $request->room_id,
            'mata_kuliah' => $request->mata_kuliah,
            'status' => 0,
            'created_at' => now()

        ]);

        //Insert ke Facility Damage
        $facility_id = $data["facility_id"];
        $description = $data["description"];

        if ($facility_id) {
            foreach ($facility_id  as $key => $value) {
                $facility_damage = new FacilityDamage();
                $facility_damage->bap_id = $bap["id"];
                $facility_damage->facility_id = $facility_id[$key];
                $facility_damage->description = $description[$key];
                $facility_damage->save();
            }
        }
        return redirect()->route('admin.baps.index')
            ->with('success', 'Bap created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bap = Bap::find($id);
        $facility_damage = FacilityDamage::where('bap_id', $id)->get();
        $id = $id;

        return view('bap.show', compact(
            'bap',
            'id',
            'facility_damage'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bap = Bap::find($id);

        return view('bap.edit', compact('bap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bap $bap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bap $bap)
    {
        request()->validate(Bap::$rules);

        $bap->update($request->all());

        return redirect()->route('admin.baps.index')
            ->with('success', 'Bap updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bap = Bap::find($id)->delete();

        return redirect()->route('admin.baps.index')
            ->with('success', 'Bap deleted successfully');
    }

    public function assignPetugas(Request $request, $id)
    {
        $idPetugas = $request->employee_id;

        $bap                = Bap::find($id);
        $bap->employee_id   = ($idPetugas);
        $bap->update();

        return redirect()->route('admin.baps.index')
            ->with('success', 'Berhasil melakukan penugasan');
    }

    public function setDoneBap(Request $request, $id)
    {
        $fixed_date = $request->fixed_date;

        $bap                = Bap::find($id);
        $bap->fixed_date    = ($fixed_date);
        $bap->status        = 1;
        $bap->update();

        return redirect()->route('admin.baps.index')
            ->with('success', 'Berhasil melakukan perbaikan');
    }

    public function unsetDoneBap($id)
    {
        $bap                = Bap::find($id);
        $bap->fixed_date    = null;
        $bap->status        = 0;
        $bap->update();

        return redirect()->route('admin.baps.index')
            ->with('warning', 'Berhasil pembatalan melakukan perbaikan');
    }

    public function reportGeneral()
    {
        $chart_options = [
            'chart_title' => 'Frekuensi Ruangan Fasilitas Rusak',
            'chart_type' => 'pie',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Bap',

            'relationship_name' => 'room', // represents function user() on Transaction model
            'group_by_field' => 'name', // users.name

            'aggregate_function' => 'count',
            'aggregate_field' => 'name',

            'filter_field' => 'created_at',
            'filter_days' => 30, // show only transactions for last 30 days
        ];
        $chartGeneral = new LaravelChart($chart_options);
        return view('bap.report.index', compact('chartGeneral'));
    }
}
