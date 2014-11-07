<?php

class RazasController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {        
        $this->beforeFilter(function(){
            if(!Auth::check()) {
                return View::make('error');
            }
        });
    }

    public function getIndex() {
        return View::make('razas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getRazas() {
        $par = Raza::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $par;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $razas = Raza::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $razas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $Raza = new Raza;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $Raza->descripcion = Input::get('descripcion');
                $Raza->estado = 1;
                $Raza->save();
                $Raza = Raza::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $Raza;
                break;

            case 'edit':
                $id = Input::get('id');
                $Raza = Raza::find($id);
                $Raza->descripcion = Input::get('descripcion');
                $Raza->save();
                $Raza = Raza::select('id','descripcion')->where('id',$id)->get();
                return $Raza;
                break;

            case 'del':
                $id = Input::get('id');
                $Raza = Raza::find($id);
                $Raza->estado = 0;
                $Raza->save();
                break;
        }
    }

    public function store() {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}