<?php

class PermisosController extends \BaseController {

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
    
	public function getIndex()
	{		
        $perfils = Perfil::select('id','descripcion')
        			->where('estado', '1')
        			->get();

		$modulos = Modulo::select('id','idpadre','descripcion')
        			->where('estado', '1')
        			->get();

		return View::make('permisos.index')->with('perfils',$perfils)->with('modulos',$modulos);
	}

	public function getPermisos()
	{
		$idperfil = Input::get('idperfil');
		$permisos = Permiso::select('idmodulo')
					->where('estado','1')
					->where('idperfil',$idperfil)
					->get();
		return $permisos;
	}

	public function IPermiso()
	{
		$idperfil = Input::get('idperfil');
		$idmodulo = Input::get('idmodulo');

		$permisos = Permiso::select('idperfil','idmodulo')
					->where('idmodulo',$idmodulo)
					->where('idperfil',$idperfil)
					->get();
					
		if(empty($permisos)){
			DB::table('permisos')->insert(
			    array('idperfil' => $idperfil, 'idmodulo' => $idmodulo, 'estado' => 1)
			);
		}else{
			DB::table('permisos')
				->where('idperfil',$idperfil)
				->where('idmodulo',$idmodulo)
				->update(array('estado'=>1));
		}
	}

	public function EPermiso()
	{
		$idperfil = Input::get('idperfil');
		$idmodulo = Input::get('idmodulo');
		DB::table('permisos')
				->where('idperfil',$idperfil)
				->where('idmodulo',$idmodulo)
				->update(array('estado'=>0));
	}

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}