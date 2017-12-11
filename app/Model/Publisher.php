<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model{

	protected $fillable = [
		'name', 
	];

	/**
	 * @return void
	 */
	public function books(){
		$this->hasMany('App\Model\Books');
	}


}