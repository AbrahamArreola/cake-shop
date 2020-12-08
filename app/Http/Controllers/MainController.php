<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;

class MainController extends Controller{
  public function home(){
    return view('main.home',[]);
  }

  public function index(){
    return view('main.home',[]);
  }

  public function about(){
    return view('main.about',[]);
  }

  public function contact(){
    return view ('main.contact',[]);
  }
}
