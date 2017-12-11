<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Model\Publisher;

class PublisherController extends Controller
{
 	
 	/**
 	 * Get all publisher
 	 * 
 	 * @return publishers | response
 	 */
 	public function all(){
 		$publishers = ['publishers' =>  [Publisher::all()]];

 		if(!empty($publishers['publishers'])){
 			return response()->json($publishers);
 		}else{
 			return Response::make('No result', 200);
 		}
 	}

 	/**
 	 * Get one publiser by id
 	 * 
 	 * @param integer id
 	 * @return publisher | response
 	 */
 	public function getById($id){
    	$publisher =  ['publisher' => [Publisher::where('id', '=', $id)->get()]];

    	if(!empty($publisher['publisher'])){
    		return response()->json($publisher);
    	}else{
    		return Response::make('No result', 200);
    	}
    }

}
