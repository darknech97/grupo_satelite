<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Grado;
use DB;

class AlumnoController extends Controller
{
    
    public $timestamps = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Requests list of data from data base
        $alumnos = Alumno::with('grado','grado.materias', 'grado.materias.materia')->get();
        $grados = Grado::all();

        return view('alumnos', compact('alumnos','grados'));
        

        //Encodes in json format all the data found
        $json = json_decode($alumnos    , true);
        

        //Returns json 
        return $json;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Create Alumno";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'alm_codigo' => 'required',
                'alm_nombre' => 'required',
                'alm_edad' => 'required',
            ]);
      
            Alumno::create($request->all());

            return redirect()->route('alumnos.index')
                         ->with('success','Product created successfully.');

        } catch (Throwable $e) {
            report($e);
    
            return false;
        }
   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        echo $request['alm_id'];

        try{
            DB::update('update alm_alumno set alm_codigo = ?,alm_nombre=?,alm_edad=?,alm_sexo=?,alm_id_grd=?,alm_observacion=? where alm_id = ?',
            [$request['alm_codigo'],$request['alm_nombre'],$request['alm_edad'],$request['alm_sexo'],$request['alm_id_grd'],$request['alm_observacion'],$request['alm_id']]);

            return redirect()->route('alumnos.index')
                            ->with('success','Product created successfully.');
        }
        catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    Public function edit($id)
    {
        echo "Edit Alumno";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        echo "Update Alumno";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::delete('delete from alm_alumno where alm_id = ?',[$id]);

            return redirect()->route('alumnos.index')
                            ->with('success','Product created successfully.');
        }
        catch (Throwable $e) {
            report($e);

            return false;
        }
    }
}

