<?php

class LotesController extends BaseController {

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

		return View::make('lotes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function getLotes()
	{
		$lotes = DB::table('lotes as l')
					->join('parcelas as p','l.idparcela','=','p.id')
					->select('l.id','l.descripcion','p.descripcion as parcela')
					->where('l.estado','1')
					->orderBy('l.id','DESC')
					->get();
		return $lotes;
	}	

    public function getEditar()
    {
        $id = Input::get('id');
        $lotes = Lote::select('id','descripcion','idparcela')
                    ->where('id', $id)
                    ->get();
        return $lotes;
    }

	public function getParcela()
	{
		$lotes = Parcela::select('id','descripcion')
					->where('estado','1')
					->get();
		return $lotes;
	}

    public function action() {

        $lote = new Lote;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $lote->descripcion = Input::get('descripcion');
                $lote->idparcela = Input::get('parcela');
                $lote->estado = 1;
                $lote->save();
                $lote = DB::table('lotes as l')
							->join('parcelas as p','l.idparcela','=','p.id')
							->select('l.id','l.descripcion','p.descripcion as parcela')
							->orderBy('id','desc')->take(1)->get();
                return $lote;
                break;

            case 'edit':
                $id = Input::get('id');
                $lote = Lote::find($id);
                $lote->descripcion = Input::get('descripcion');
                $lote->idparcela = Input::get('parcela');
                $lote->save();
                $lote = DB::table('lotes as l')
							->join('parcelas as p','l.idparcela','=','p.id')
							->select('l.id','l.descripcion','p.descripcion as parcela')
							->where('l.id',$id)
							->get();
                return $lote;
                break;

            case 'del':
                $id = Input::get('id');
                $lote = Lote::find($id);
                $lote->estado = 0;
                $lote->save();
                break;
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