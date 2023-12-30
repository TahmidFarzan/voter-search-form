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
        $pagination = 25;
        $voters = collect();

        if( count($request->input())  > 0){
            $voters = Voter::orderBy('name','asc');
            if($request->has("search") && !($request->search == null)){
                $voters =  $voters->orWhere("name",'like', '%'.$request->search.'%')
                                    ->orWhere("no", $request->search);
            }

            $voters = $voters->paginate($pagination);
        }

        return view('pages.index',compact('voters'));
    }
}
