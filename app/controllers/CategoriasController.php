<?php

class CategoriasController extends \BaseController {

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
        return View::make('categorias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getCategorias() {
        $categorias = Categoria::select('id','descripcion')
        			->where('estado', '1')
        			->orderBy('id', 'DESC')
        			->get();
        return $categorias;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $categorias = Categoria::select('id','descripcion')
                    ->where('id', $id)
                    ->get();
        return $categorias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $categoria = new Categoria;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $categoria->descripcion = Input::get('descripcion');
                $categoria->estado = 1;
                $categoria->save();
                $categoria = Categoria::select('id','descripcion')->orderBy('id','desc')->take(1)->get();
                return $categoria;
                break;

            case 'edit':
                $id = Input::get('id');
                $categoria = Categoria::find($id);
                $categoria->descripcion = Input::get('descripcion');
                $categoria->save();
                $categoria = Categoria::select('id','descripcion')->where('id',$id)->get();
                return $categoria;
                break;

            case 'del':
                $id = Input::get('id');
                $categoria = Categoria::find($id);
                $categoria->estado = 0;
                $categoria->save();
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