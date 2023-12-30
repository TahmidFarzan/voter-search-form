<?php

namespace App\Http\Controllers\AuthUser;

use App\Models\Voter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $voterInfo = collect();

        if( count($request->input())  > 0){
            $voterInfo = Voter::orderBy('name','asc');
            if($request->has("search") && !($request->search == null)){
                $voterInfo =  $voterInfo->where("no", $request->search)->first();
            }
        }

        return view('pages.index',compact('voterInfo'));
    }
}
