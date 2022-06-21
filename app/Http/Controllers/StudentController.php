<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =  User::filter(request(['search']))->where('is_admin', false)->paginate(5);

        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        return view('students.create', compact('rayons', 'rombels', $rayons, $rombels));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $validatedData['is_admin'] = false;
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Berhasil Menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        return view('students.edit', compact('student', 'rayons', 'rombels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = User::find($id);

        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
            'email' => 'required',
        ]);

        $validatedData['is_admin'] = false;
        if (!is_null($request->password)) $validatedData['password'] = bcrypt($request->password);

        $student->update($validatedData);

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Berhasil Hapus !');
    }
}
