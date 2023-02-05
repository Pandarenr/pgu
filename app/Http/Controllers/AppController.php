<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class AppController extends Controller
{
    private $reviews=null;

    public function __construct(){
        $this->reviews = new Review;
    }

    public function home(){
        return view('app.home',['data'=>$this->reviews->getRelative()]);
    }

    public function about(){
        return view('app.about.about');
    }
}