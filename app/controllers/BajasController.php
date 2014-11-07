<?php

class BajasController extends \BaseController {

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
        return View::make('bajas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getBajas() {
        $bajas = DB::table('bajas as b')
                    ->join('nacimientos as n','b.idanimal','=','n.id')
                    ->select('b.id','b.descripcion','n.nombre as animal', 'b.fecha')
        			->where('b.estado', '1')
        			->orderBy('b.id', 'DESC')
        			->get();
        return $bajas;
    }

    public function getAnimal()
    {
        $bajas = DB::table('nacimientos as n')
                    ->select('n.id','n.nombre as descripcion')
                    //->whereNotIn('n.id', DB::table('bajas as b')->where('b.estado',1)->lists('b.idanimal')->get('b.idanimal'))
                    ->where('n.estado', 1)
                    ->get();
        return $bajas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $baja = new Baja;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $baja->descripcion = Input::get('descripcion');
                $baja->idanimal = Input::get('animal');
                $baja->fecha = Input::get('fecha');
                $baja->estado = 1;
                $baja->save();
                $baja = DB::table('bajas as b')
                            ->join('nacimientos as n','b.idanimal','=','n.id')
                            ->select('b.id','b.descripcion','n.nombre as animal','b.fecha')
                            ->orderBy('b.id','desc')->take(1)->get();
                return $baja;
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