<?php

class ParcelasController extends \BaseController {

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
        return View::make('parcelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getParcelas() {
        $par = Parcela::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $par;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $parcelas = Parcela::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $parcelas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $parcela = new Parcela;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $parcela->descripcion = Input::get('descripcion');
                $parcela->estado = 1;
                $parcela->save();
                $parcela = Parcela::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $parcela;
                break;

            case 'edit':
                $id = Input::get('id');
                $parcela = Parcela::find($id);
                $parcela->descripcion = Input::get('descripcion');
                $parcela->save();
                $parcela = Parcela::select('id','descripcion')->where('id',$id)->get();
                return $parcela;
                break;

            case 'del':
                $id = Input::get('id');
                $parcela = Parcela::find($id);
                $parcela->estado = 0;
                $parcela->save();
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