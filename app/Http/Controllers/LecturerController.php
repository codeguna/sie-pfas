<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Lecturer;
use Illuminate\Http\Request;

/**
 * Class LecturerController
 * @package App\Http\Controllers
 */
class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::paginate();
        $users = User::doesntHave('employee')->doesntHave('lecturer')->pluck('id', 'name');
        return view('lecturer.index', compact('lecturers', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $lecturers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturer = new Lecturer();
        return view('lecturer.create', compact('lecturer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lecturer::$rules);

        $lecturer = Lecturer::create($request->all());

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = Lecturer::find($id);

        return view('lecturer.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::find($id);
        $users = User::doesntHave('employee')->doesntHave('lecturer')->pluck('id', 'name');
        return view('lecturer.edit', compact('lecturer', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        request()->validate(Lecturer::$rules);

        $lecturer->update($request->all());

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::find($id)->delete();

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer deleted successfully');
    }
}
