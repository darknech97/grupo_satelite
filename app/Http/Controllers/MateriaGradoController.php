<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaGrado;
use DB;

class MateriaGradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "store mxg";

        try {
      
            MateriaGrado::create($request->all());

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
        try{
            DB::delete('delete from mxg_materiasxgrado where mxg_id = ?',[$id]);

            return redirect()->route('grados.index')
                            ->with('success','Product created successfully.');
        }
        catch (Throwable $e) {
            report($e);

            return false;
        }
    }
}
