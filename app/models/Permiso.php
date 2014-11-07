<?php

class Permiso extends \Eloquent {
	protected $fillable = ['idperfil','idmodulo','estado'];
    protected $hidden = array('created_at','updated_at');
}