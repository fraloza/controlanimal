<?php

class TiposerviciosController extends \BaseController {

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
        return View::make('tiposervicios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getTiposervicios() {
        $tiposervicios = Tiposervicio::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $tiposervicios;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $tiposervicios = Tiposervicio::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $tiposervicios;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $tiposervicio = new Tiposervicio;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $tiposervicio->descripcion = Input::get('descripcion');
                $tiposervicio->estado = 1;
                $tiposervicio->save();
                $tiposervicio = Tiposervicio::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $tiposervicio;
                break;

            case 'edit':
                $id = Input::get('id');
                $tiposervicio = Tiposervicio::find($id);
                $tiposervicio->descripcion = Input::get('descripcion');
                $tiposervicio->save();
                $tiposervicio = Tiposervicio::select('id','descripcion')->where('id',$id)->get();
                return $tiposervicio;
                break;

            case 'del':
                $id = Input::get('id');
                $tiposervicio = Tiposervicio::find($id);
                $tiposervicio->estado = 0;
                $tiposervicio->save();
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