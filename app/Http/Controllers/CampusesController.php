<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Campus;
use App\User;

class CampusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $busqueda = Input::get('busqueda');
        $campuses = Campus::where(DB::raw("CONCAT(code,' ',name)"), 'like', "%$busqueda%")->paginate(10);
        return view('Campuses.index', compact('campuses','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereStatus(true)->get();
        $status = null;
        do{
            $code = $this->code();
            $campus = Campus::whereCode($code)->get();
            $status = $campus->isEmpty();
        }while($status == false);

        return view('Campuses.create', compact('code','users'));
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
            'code' => 'required|unique:campuses|digits:5',
            'cct' => 'nullable|size:10|unique:campuses',
            'name' => 'required|unique:campuses',
            'state' => 'required|regex:/^[\pL\s\-]+$/u',
            'municipality' => 'required|regex:/^[\pL\s\-]+$/u',
            'colony' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'street' => 'required|string',
            'zipcode' => 'required|digits:5|numeric',
            'external_number' => 'required|numeric',
            'internal_number' => 'nullable|alpha_num',
            'shift' => 'required|alpha',
            'level' => 'required|regex:/^[\pL\s\-]+$/u',
            'user_id' => 'numeric|required',

        ],[ 
            'code.required' => 'El código único es requerido',
            'code.unique' => 'El código único ya está en uso',
            'code.digits' => 'El código único debe ser de 5 dígitos',
            
            'cct.digits' => 'CCT debe ser de 10 caracteres',
            'cct.unique' => 'El código CCT ya está en uso',
            
            'name.required' => 'El nombre es requerido',
            'name.unique' => 'El nombre ingresado ya está en uso',

            'state.required' => 'El estado es requerido',
            'state.regex' => 'El estado no debe de contener números',
            
            'municipality.required' => 'El municipio es requerido',
            'municipality.regex' => 'El municipio no debe de contener números',
            
            'colony.alpha' => 'La colonia/fracc. no debe de contener números',

            'street.required' => 'La calle es requerida',
            'street.string' => 'El nombre de la calle debe de ser alfanumérica',

            'zipcode.required' => 'El código postal es requerido',
            'zipcode.digits' => 'El código postal debe ser de 5 números',
            'zipcode.numeric' => 'El código postal debe ser numérico',

            'external_number.required' => 'El número exterior es requerido',
            'external_number.numeric' => 'El número exterior debe ser númerico',

            'internal_number.alpha_num' => 'El número interior debe ser alfanumérico',

            'shift.alpha' => 'El turno no debe contener números',
            'shift.required' => 'El turno es requerido',

            'level.alpha' => 'El nivel escolar no debe contener números',
            'level.required' => 'El nivel escolar es requerido',

            'user_id.required' => 'El Administrador es requerido',

        ]);

        $campus = new Campus();
        $campus->code = $request->code;
        $campus->cct = $request->cct;
        $campus->name = $request->name;
        $campus->state = $request->state;
        $campus->municipality = $request->municipality;
        $campus->colony = $request->colony;
        $campus->street = $request->street;
        $campus->zipcode = $request->zipcode;
        $campus->external_number = $request->external_number;
        $campus->internal_number = $request->internal_number;
        $campus->user_id = $request->user_id;
        $campus->shift = $request->shift;
        $campus->level = $request->level;

        $campus->save();

        return redirect()->route('campuses.index')->withStatus('Plantel registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campus = Campus::findOrfail($id);
        return view('Campuses.show', compact('campus'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request){
        if(hash::check($request->password, Auth::user()->password)):
            $campus = Campus::findOrfail($request->id);
            $campus->status = true;

            $campus->save();
            return redirect()->route('campuses.index')->withStatus('Campus activado correctamente');
        else:
            return redirect()->route('campuses.index')->withErrors('Contraseña incorrecta');
        endif;
    }
    public function disable(Request $request)
    {
        if(Hash::check($request->password, Auth::user()->password)):
            $campus = Campus::findOrfail($request->id);
            $campus->status = false;

            $campus->save();
            return redirect()->route('campuses.index')->withStatus('Campus desactivado correctamente');
        else:
            return redirect()->route('campuses.index')->withErrors('Contraseña incorrecta');
        endif;
    }

    public function destroy(Request $request)
    {
       if(Hash::check($request->password, Auth::user()->password)):
            $campus = Campus::findOrfail($request->id);
            $campus->delete();

            return redirect()->route('campuses.index')->withStatus('Campus eliminado correctamente');
       else:
            return redirect()->route('campuses.index')->withErrors('Contraseña incorrecta');
       endif;
    }
}
