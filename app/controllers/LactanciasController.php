<?php

class LactanciasController extends \BaseController {

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
        return View::make('lactancias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getLactancias() {
        $lactancias = DB::select("select e.id,e.descripcion,n.nombre,l.descripcion as lote,e.fecha,
                            TIMESTAMPDIFF(DAY,'".date('Y-m-d')."',e.fecha) as expire_days
                            from lactancias as e inner join nacimientos as n on e.idanimal=n.id
                                inner join lotes as l on l.id=n.idlote
                            where e.estado=1
                            order by e.id DESC
                    ");
        return $lactancias;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $lactancias = lactancia::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $lactancias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $lactancia = new Lactancia;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $lactancia->descripcion = Input::get('descripcion');
                $lactancia->idanimal = Input::get('animal');
                $lactancia->fecha = Input::get('fecha');
                $lactancia->estado = 1;
                $lactancia->save();
                $idmax = DB::table('lactancias')->max('id');
                $lactancia = DB::select("select e.id,e.descripcion,n.nombre,l.descripcion as lote,e.fecha,
                            TIMESTAMPDIFF(DAY,'".date('Y-m-d')."',e.fecha) as expire_days
                            from lactancias as e inner join nacimientos as n on e.idanimal=n.id
                                inner join lotes as l on l.id=n.idlote
                            where e.id = '".$idmax."'
                    ");
                return $lactancia;
                break;

            case 'del':
                $id = Input::get('id');
                $lactancia = Lactancia::find($id);
                $lactancia->estado = 0;
                $lactancia->save();
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