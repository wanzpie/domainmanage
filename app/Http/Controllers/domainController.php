<?php

namespace App\Http\Controllers;
use App\Domain;
use DB;
use Illuminate\Http\Request;

class domainController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function index(){

        $domains = Domain::orderBy('created_at','asc')->get();
        $Arr_Menu   = array(
            'title'         => 'Domain list',
            'domains'     => $domains
        );

        return view('domain.index', with($Arr_Menu));


    }
    public function variation(){

        $domains = Domain::orderBy('updated_at','desc')->get();
        $Arr_Menu   = array(
            'title'         => 'Domain list',
            'domains'     => $domains
        );

        return view('domain.list', with($Arr_Menu));

    }
}
