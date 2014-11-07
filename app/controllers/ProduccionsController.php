<?php

class ProduccionsController extends \BaseController {

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
        return View::make('produccions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getProduccions() {
        $prods = DB::table('produccions as p')
                    ->join('nacimientos as n','p.idanimal','=','n.id')
                    ->select('p.id','p.descripcion','p.cantidad','n.nombre as animal')
        			->where('p.estado', '1')
        			->orderBy('p.id', 'DESC')
        			->get();
        return $prods;
    }

    public function getParcela() {
        $prods = Parcela::select('id','descripcion')
                    ->where('estado', '1')
                    ->orderBy('id', 'DESC')
                    ->get();
        return $prods;
    }

    public function getLote()
    {
        $id = Input::get('id');
        $prod = Lote::select('id','descripcion')
                    ->where('idparcela', $id)
                    ->get();
        return $prod;
    }

    public function getAnimal()
    {
        $id = Input::get('id');
        $prod = DB::table('nacimientos as n')
                    ->join('categorias as c','n.idcategoria','=','c.id')
                    ->select('n.id','n.nombre as descripcion','c.descripcion as etapa')
                    ->where('n.idlote', $id)
                    ->get();
        return $prod;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $prod = Produccion::select('id','descripcion','cantidad')
                    ->where('id', $id)
                    ->get();
        return $prod;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $prod = new Produccion;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $prod->descripcion = Input::get('descripcion');
                $prod->cantidad = Input::get('cantidad');
                $prod->idanimal = Input::get('animal');
                $prod->estado = 1;
                $prod->save();
                $prod = DB::table('produccions as p')
                            ->join('nacimientos as n','p.idanimal','=','n.id')
                            ->select('p.id','p.descripcion','p.cantidad','n.nombre as animal')
                            ->orderBy('p.id','desc')->take(1)->get();
                return $prod;
                break;

            case 'edit':
                $id = Input::get('id');
                $prod = Produccion::find($id);
                $prod->descripcion = Input::get('descripcion');
                $prod->cantidad = Input::get('cantidad');
                $prod->idanimal = Input::get('animal');
                $prod->save();
                $prod = DB::table('produccions as p')
                            ->join('nacimientos as n','p.idanimal','=','n.id')
                            ->select('p.id','p.descripcion','p.cantidad','n.nombre as animal')
                            ->where('p.id',$id)->get();
                return $prod;
                break;

            case 'del':
                $id = Input::get('id');
                $prod = Produccion::find($id);
                $prod->estado = 0;
                $prod->save();
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