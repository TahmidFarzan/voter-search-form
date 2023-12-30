<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $voterInfo = null;

        if( count($request->input())  > 0){
            $voterInfo = Voter::orderBy('name','asc');
            if($request->has("search") && !($request->search == null)){
                $voterInfo =  $voterInfo->where("no", $request->search)->first();
            }
        }
        return view('pages.index',compact('voterInfo'));
    }
}
