<?php

class PerfilsController extends \BaseController {

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
        return View::make('perfils.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getPerfils() {
        $perfils = Perfil::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $perfils;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $perfils = Perfil::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $perfils;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $perfil = new Perfil;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $perfil->descripcion = Input::get('descripcion');
                $perfil->save();
                $perfil = Perfil::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $perfil;
                break;

            case 'edit':
                $id = Input::get('id');
                $perfil = Perfil::find($id);
                $perfil->descripcion = Input::get('descripcion');
                $perfil->save();
                $perfil = Perfil::select('id','descripcion')->where('id',$id)->get();
                return $perfil;
                break;

            case 'del':
                $id = Input::get('id');
                $perfil = Perfil::find($id);
                $perfil->estado = 0;
                $perfil->save();
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