<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Degree;
use App\User;

class DegreesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busqueda = Input::get('busqueda');
        $degrees = Degree::where(DB::raw("CONCAT(code,' ',rvoe,' ',name,' ',dicipline)"), 'like',"%$busqueda%")->paginate(10);
        return view('Degrees.index', compact('busqueda','degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = null;
        do{
            $code = $this->code();
            $degree = Degree::whereCode($code)->get();
            $status = $degree->isEmpty();
        }while($status == false);
        
        return view('Degrees.create', compact('code'));
    }

    public function code(){
        $code = (string)rand(0,99999);
        if (strlen($code)<5) {
            $code = str_pad($code, 5, "0", STR_PAD_LEFT);
        }
        return $code;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'unique:degrees|digits:5|required',
            'rvoe' => 'unique:degrees|nullable',
            'name' => 'unique:degrees|required',
            'semesters' => 'required|numeric'

        ],[ 
            'code.unique' => 'El código único ingresado ya está en uso',
            'code.digits' => 'El código único debe contener 5 caracteres',
            'code.required' => 'El código único es requerido',

            'rvoe.unique' => 'El código RVOE ya está en uso',

            'name.unique' => 'El nombre ingresado ya está en uso',
            'name.required' => 'El campo nombre es requerido',

            'semesters.required' => 'El campo semestres es requerido',
            'semesters.numeric' => 'El campo semestres debe ser númerico'
            
        ]);

        $degree = new Degree();
        $degree->code = $request->code;
        $degree->rvoe = $request->rvoe;
        $degree->name = $request->name;
        $degree->semesters = $request->semesters;
        $degree->dicipline = $request->dicipline;
        $degree->description = $request->description;

        $degree->save();

        return redirect()->route('degrees.index')->withStatus('Licenciatura registrada correctamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $degree = Degree::findOrfail($id);
        return view('Degrees.show', compact('degree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
