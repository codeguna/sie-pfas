<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

/**
 * Class FacilityController
 * @package App\Http\Controllers
 */
class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::paginate();

        return view('facility.index', compact('facilities'))
            ->with('i', (request()->input('page', 1) - 1) * $facilities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facility = new Facility();
        return view('facility.create', compact('facility'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Facility::$rules);

        $facility = Facility::create($request->all());

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = Facility::find($id);

        return view('facility.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::find($id);

        return view('facility.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Facility $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        request()->validate(Facility::$rules);

        $facility->update($request->all());

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $facility = Facility::find($id)->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Facility deleted successfully');
    }
}
