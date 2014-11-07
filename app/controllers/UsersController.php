<?php

class UsersController extends \BaseController {

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
        return View::make('users.index');
    }

    public function getUsers() 
    {
        $users = DB::table('users as u')
                    ->join('perfils as p','u.idperfil','=','p.id')
                    ->select('u.id','u.name','u.username','p.descripcion')
                    ->where('u.estado', '1')
                    ->orderBy('u.id', 'DESC')
                    ->get();
        return $users;
    }

    public function getPerfils() 
    {
        $users = Perfil::select('id','descripcion')
                    ->where('estado', '1')
                    ->get();
        return $users;
    }

    public function getDatos()
    {
        $id = Input::get('id');
        $user = User::select('id','name','username','email','direccion','telefono','idperfil')
                    ->where('id', $id)
                    ->where('estado',1)
                    ->get();
        return $user;
    }

    public function action() {

        $user = new User;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $user->name = Input::get('nombre');
                $user->username = Input::get('usuario');
                $user->password = Hash::make(Input::get('clave'));
                $user->email = Input::get('email');
                $user->direccion = Input::get('direccion');
                $user->telefono = Input::get('telefono');
                $user->idperfil = Input::get('perfil');
                $user->remember_token = '';
                $user->estado = 1;
                $user->save();
                $user = DB::table('users as u')
                            ->join('perfils as p','u.idperfil','=','p.id')
                            ->select('u.id','u.name','u.username','p.descripcion')
                            ->orderBy('u.id','desc')->take(1)->get();
                return $user;
                break;

            case 'edit':
                $id = Input::get('id');
                $user = User::find($id);
                $user->name = Input::get('nombre');
                $user->username = Input::get('usuario');
                $user->email = Input::get('email');
                $user->direccion = Input::get('direccion');
                $user->telefono = Input::get('telefono');
                $user->idperfil = Input::get('perfil');
                $user->save();
                $user = DB::table('users as u')
                            ->join('perfils as p','u.idperfil','=','p.id')
                            ->select('u.id','u.name','u.username','p.descripcion')
                            ->where('u.id',$id)->get();
                return $user;
                break;

            case 'del':
                $id = Input::get('id');
                $user = User::find($id);
                $user->estado = 0;
                $user->save();
                break;
        }
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