<?php

class Modulo extends Eloquent {
	protected $fillable = ['id','idpadre','descripcion','url','estado'];
        
        protected $hidden = array('created_at','updated_at');
}