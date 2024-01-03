<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $voters = null;

        if( count($request->input())  > 0){
            $voters = Voter::orderBy('name','asc');
            if($request->has("name") && !($request->name == null)){
                $voters =  $voters->where("name", 'like' , '%'.$request->name.'%');
            }

            if($request->has("father_name") && !($request->father_name == null)){
                $voters =  $voters->where("father_name", 'like' , '%'.$request->father_name.'%');
            }

            $voters =  $voters->get();
        }

        return view('pages.index',compact('voters'));
    }
}
