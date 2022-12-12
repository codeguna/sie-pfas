<?php

namespace App\Http\Controllers;

use App\Models\Bap;
use App\Models\Facility;
use App\Models\MataKuliah;
use App\Models\Room;
use Illuminate\Http\Request;

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

        return view('bap.index', compact('baps'))
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
        request()->validate(Bap::$rules);

        $bap = Bap::create($request->all());

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

        return view('bap.show', compact('bap'));
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
}
