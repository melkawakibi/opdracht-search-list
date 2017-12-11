<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

	protected $fillable = [
		'ISBN', 'title', 'date',
	];

	/**
	 * @return void
	 */
	public function author(){
		$this->hasOne('App\Model\Author');
	}

	/**
	 * @return void
	 */
	public function publisher(){
		$this->hasOne('App\Model\Publisher');
	}


}