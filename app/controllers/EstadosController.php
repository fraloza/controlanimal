<?php

class EstadosController extends \BaseController {

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
        return View::make('estados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getEstados() {
        $estados = Estado::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $estados;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $estados = Estado::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $estados;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $estado = new Estado;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $estado->descripcion = Input::get('descripcion');
                $estado->estado = 1;
                $estado->save();
                $estado = Estado::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $estado;
                break;

            case 'edit':
                $id = Input::get('id');
                $estado = Estado::find($id);
                $estado->descripcion = Input::get('descripcion');
                $estado->save();
                $estado = Estado::select('id','descripcion')->where('id',$id)->get();
                return $estado;
                break;

            case 'del':
                $id = Input::get('id');
                $estado = Estado::find($id);
                $estado->estado = 0;
                $estado->save();
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