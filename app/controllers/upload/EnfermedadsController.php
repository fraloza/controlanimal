<?php

class EnfermedadsController extends \BaseController {

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
        return View::make('enfermedads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getEnfermedads() {
        $enfermedads = Enfermedad::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $enfermedads;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $enfermedads = Enfermedad::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $enfermedads;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $enfermedad = new Enfermedad;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $enfermedad->descripcion = Input::get('descripcion');
                $enfermedad->estado = 1;
                $enfermedad->save();
                $enfermedad = Enfermedad::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $enfermedad;
                break;

            case 'edit':
                $id = Input::get('id');
                $enfermedad = Enfermedad::find($id);
                $enfermedad->descripcion = Input::get('descripcion');
                $enfermedad->save();
                $enfermedad = Enfermedad::select('id','descripcion')->where('id',$id)->get();
                return $enfermedad;
                break;

            case 'del':
                $id = Input::get('id');
                $enfermedad = Enfermedad::find($id);
                $enfermedad->estado = 0;
                $enfermedad->save();
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