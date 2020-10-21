<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;
use App\Models\persona;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        return view('calculadora.index',compact('personas'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calculadora.create');
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
            'nombre' => 'required|string|max:250|not_in:0',
            'apellido' => 'required|string|max:250|not_in:0',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required',
            'peso' => 'required|numeric',
            'estatura' => 'required|numeric',
            'nivel_actividad' => 'required',
        ]);

        DB::beginTransaction();
        try{
            $person = NEW Persona();
            $person->nombre = $request->input('nombre');
            $person->apellido = $request->input('apellido');
            $person->fecha_nacimiento = $request->input('fecha_nacimiento');
            $person->genero = strtoupper($request->input('genero'));
            $person->peso = (int)$request->input('peso');
            $person->estatura = (int)$request->input('estatura');
            $person->nivel_actividad = strtoupper($request->input('nivel_actividad'));
            $person->bmi= round(($person->peso /(pow($person->estatura,2))*10000),5);

            if(strcmp($person->genero,'MASCULINO') == 0){
                $person->bmr =  66 + (13.7 * $person->peso ) + (5 * $person->estatura ) - (6.8 * (date("Y") - date('Y', strtotime($person->fecha_nacimiento)))) ;
            }elseif (strcmp($person->genero,'FEMENINO') == 0){
                $person->bmr =  655 + (9.6 * $person->peso ) + (1.8 * $person->estatura ) - (4.7 * (date("Y") - date('Y', strtotime($person->fecha_nacimiento)))) ;
            }

            if(strcmp($person->nivel_actividad,'SEDENTARIO') == 0){
                $person->calorias_diarias = $person->bmr * 1.2;
                }elseif (strcmp($person->nivel_actividad,'LIGERAMENTE ACTIVO') == 0) {
                        $person->calorias_diarias = $person->bmr * 1.375;                    
                    }elseif (strcmp($person->nivel_actividad,'MODERADAMENTE ACTIVO') == 0) {
                            $person->calorias_diarias = $person->bmr * 1.55;                    
                        }elseif (strcmp($person->nivel_actividad,'MUY ACTIVO') == 0) {
                                $person->calorias_diarias = $person->bmr * 1.725;                    
                            }elseif (strcmp($person->nivel_actividad,'EXTREMADAMENTE ACTIVO') == 0) {
                                $person->calorias_diarias = $person->bmr * 1.9;                    
            }

            if($person->bmi <= 18.5){
                $person->bmi_categoria = strtoupper('peso bajo');
                }elseif($person->bmi<=24.9){
                    $person->bmi_categoria = strtoupper('Saludable');
                    }elseif($person->bmi<=29.9){
                        $person->bmi_categoria = strtoupper('Sobrepeso');
                        }else{
                            $person->bmi_categoria = strtoupper('Obeso');
                        }


            // dd($person);

            $person->save();
            $success = true;
        } catch (\exception $e){
            $success = false;
            $error_save = $e->getMessage();
            dd($e);
            DB::rollback();
        }
        if ($success){
            // dd("if");
            DB::commit();
            session()->flash('create', $person->nombre." ".$person->apellido);
            return redirect(route('calculadora.index'))->with('success');
        }else{
            session()->flash('error', 'error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('calculadora.show', compact('persona'));
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
