<?php

class ModulosController extends BaseController {

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

		return View::make('modulos.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function getModulos()
	{
		$modulos = DB::table('modulos as m')
					->join('modulos as mp','m.idpadre','=','mp.id')
					->select('m.id','m.descripcion','m.url','m.icono','mp.descripcion as padre')
					->where('m.estado','1')
					->orderBy('m.id','DESC')
					->get();
		/*$modulos = Modulo::select('id','descripcion','url','icono','idpadre')
					->where('estado','1')
					->orderBy('id','DESC')
					->get();*/
		return $modulos;
	}	

    public function getEditar()
    {
        $id = Input::get('id');
        $modulos = Modulo::select('id','descripcion','url','icono','idpadre')
                    ->where('id', $id)
                    ->get();
        return $modulos;
    }

	public function getPadre()
	{
		$modulos = Modulo::select('id','descripcion')
					->where('idpadre','1')
					->get();
		return $modulos;
	}

    public function action() {

        $modulo = new Modulo;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $modulo->descripcion = Input::get('descripcion');
                $modulo->idpadre = Input::get('padre');
                $modulo->url = Input::get('url');
                $modulo->icono = Input::get('icono');
                $modulo->save();
                $modulo = DB::table('modulos as m')
							->join('modulos as mp','m.idpadre','=','mp.id')
							->select('m.id','m.descripcion','m.url','m.icono','mp.descripcion as padre')
                			->orderBy('id','desc')->take(1)->get();
                return $modulo;
                break;

            case 'edit':
                $id = Input::get('id');
                $modulo = Modulo::find($id);
                $modulo->descripcion = Input::get('descripcion');
                $modulo->idpadre = Input::get('padre');
                $modulo->url = Input::get('url');
                $modulo->icono = Input::get('icono');
                $modulo->save();
                $modulo = DB::table('modulos as m')
							->join('modulos as mp','m.idpadre','=','mp.id')
							->select('m.id','m.descripcion','m.url','m.icono','mp.descripcion as padre')
							->where('m.id',$id)
							->get();
                return $modulo;
                break;

            case 'del':
                $id = Input::get('id');
                $modulo = Modulo::find($id);
                $modulo->estado = 0;
                $modulo->save();
                break;
        }
    }

	public function modulos()
	{		
	    if(Request::ajax()){
	        $menupadre = DB::select('SELECT m.id,m.descripcion,m.icono
	 							from modulos m where m.estado=1 and m.idpadre=1
	 							order by m.descripcion asc');
	        $cont = 0;
	        $menu[] = '';
	        $idperfil = Auth::user()->idperfil;
	        foreach ($menupadre as $valor) {
	        	$idpadre = $valor->id;
	        	$submenu = DB::select("SELECT m.descripcion,m.url
	 							from modulos m inner join permisos p on m.id=p.idmodulo 
								where m.estado=1 and p.idperfil='$idperfil' and m.idpadre='$idpadre' and p.estado=1
								order by m.descripcion asc
								");
	        	//print_r($submenu);
	        	if(!empty($submenu)){
		        	$menu[$cont] = array(
			            'descripcion' => $valor->descripcion,
			            'icono' => $valor->icono,
		    			'orden' => $idpadre,
			            'enlaces' => array()
			    	);
			    	$cont2 = 0;
			    	foreach ($submenu as $key) {
			    		$menu[$cont]['enlaces'][$cont2] = array(
			    			'descripcion' => $key->descripcion,
			    			'url' => $key->url,
			    			'orden' => $idpadre
			    			);
	              		$cont2 ++;
			    	}
			    	$cont++;
		    	}
	        }
	        return $menu;
	    }
	}

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