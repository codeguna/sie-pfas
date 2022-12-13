<?php

namespace App\Http\Controllers;

use App\Models\FacilityDamage;
use Illuminate\Http\Request;

/**
 * Class FacilityDamageController
 * @package App\Http\Controllers
 */
class FacilityDamageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilityDamages = FacilityDamage::paginate();

        return view('facility-damage.index', compact('facilityDamages'))
            ->with('i', (request()->input('page', 1) - 1) * $facilityDamages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilityDamage = new FacilityDamage();
        return view('facility-damage.create', compact('facilityDamage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FacilityDamage::$rules);

        $facilityDamage = FacilityDamage::create($request->all());

        return redirect()->route('facility-damages.index')
            ->with('success', 'FacilityDamage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facilityDamage = FacilityDamage::find($id);

        return view('facility-damage.show', compact('facilityDamage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilityDamage = FacilityDamage::find($id);

        return view('facility-damage.edit', compact('facilityDamage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FacilityDamage $facilityDamage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FacilityDamage $facilityDamage)
    {
        request()->validate(FacilityDamage::$rules);

        $facilityDamage->update($request->all());

        return redirect()->route('facility-damages.index')
            ->with('success', 'FacilityDamage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facilityDamage = FacilityDamage::find($id)->delete();

        return redirect()->route('facility-damages.index')
            ->with('success', 'FacilityDamage deleted successfully');
    }
}
