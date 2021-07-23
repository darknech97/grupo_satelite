<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Materia;
use DB;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Requests list of data from data base
        $grados = Grado::with('materias', 'materias.materia')->get();
        $materias = Materia::all();

        return view('grados', compact('grados','materias'));

        //Encodes in json format all the data found
        $json = json_decode($grados    , true);
        

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
        echo "create";
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
                'grd_nombre' => 'required',
            ]);
      
            Grado::create($request->all());

            return redirect()->route('grados.index')
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
    public function show($id)
    {
        //
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
        try{
            DB::update('update grd_grado set grd_nombre = ? where grd_id = ?',
            [$request['grd_nombre'],$id]);

            return redirect()->route('grados.index')
                            ->with('success','Product created successfully.');
        }
        catch (Throwable $e) {
            report($e);

            return false;
        }
        echo "update";
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
            DB::delete('delete from grd_grado where grd_id = ?',[$id]);

            return redirect()->route('grados.index')
                            ->with('success','Product created successfully.');
        }
        catch (Throwable $e) {
            report($e);

            return false;
        }
    }
}
