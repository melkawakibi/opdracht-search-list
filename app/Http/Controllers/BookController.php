<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Model\Book;
use DB;

class BookController extends Controller
{
    
    /**
     * Get all books
     * 
     * @return Books | response
     */
    public function all(){
    	$books = ['books' => [Book::all()]];

    	if(!empty($books['books'])){
    		return response()->json($books);
    	}else{
            return Response::make('No result', 200);
        }
    }

    /**
     * Get one Book by id
     * 
     * @param  integer id
     * @return Book | response
     */
    public function getById($id){

    		$book = ['book' => [Book::where('id', '=', $id)->get()]];

            if(!empty($book['book'])){
                return response()->json($book);
            }else{
                return Response::make('No result', 200);
            }
    }

    /**
     * Search for books by keyword
     * 
     * @param  string keyword
     * @return Books | response
     */
    public function searchByKeyWord($keyword){

    	if(!empty($keyword)){
    		$books = ['books' => [Book::where('title', 'like', '%'.$keyword.'%')->get()]];

	    		if(!empty($books['books'])){
	    			return response()->json($books);
	    		}else{
	    			return Response::make('No result', 200);
	    		}
    	}else{
    		return Response::make('Not found', 404);
    	}
    }

    /**
     * Search for books by keyword
     * User can set offset and limit of records
     * 
     * @param  string keyword
     * @param  integer offset
     * @param  interger limit
     * @return Books | response
     */
    public function searchByKeyWordWithOffSetAndLimit($keyword, $offset, $limit){

    	if(!empty($keyword)){
    		$books = ['books' => [Book::where('title', 'like', '%'.$keyword.'%')->skip($offset)->take($limit)->get()]];

	    		if(!empty($books['books'])){
	    			return response()->json($books);
	    		}else{
	    			return Response::make('No result', 200);
	    		}
    	}else{
    		return Response::make('Not found', 404);
    	}
    }
}
