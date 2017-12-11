<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model{


	protected $fillable = [
		'name',
	];

	/**
	 * 
	 * @return void
	 */
	public function books(){
		$this->hasMany('App\Model\Books');
	}

}