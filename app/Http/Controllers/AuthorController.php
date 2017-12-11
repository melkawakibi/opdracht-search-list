<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Model\Author;

class AuthorController extends Controller
{
    
    /**
     * Get all Authors
     * 
     * @return Authors | response
     */
    public function all(){
    	$authors = ['authors' => [Author::all()]];

    	if(!empty($authors['authors'])){
    		return response()->json($authors);
    	}else{
    		return Response::make('No result', 200);
    	}
    }

    /**
     * Get one Author by id 
     * 
     * @param  integer id
     * @return Author | response
     */
    public function getById($id){

    	$author = ['author' => [Author::where('id', '=', $id)->get()]];
        
    	if(!empty($author['author'])){
    		return response()->json($author);
    	}else{
    		return Response::make('No result', 200);
    	}
    }

}
