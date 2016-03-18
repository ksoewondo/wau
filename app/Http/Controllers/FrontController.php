<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// return var_dump($this->getTop10Spro());
    	// return view('welcome', array('topSpro' => 10));
        return view('welcome');
    }
}
