<?php

class Lote extends Eloquent {
	protected $fillable = ['id','descripcion','idparcela','estado'];
        
        protected $hidden = array('created_at','updated_at');
}