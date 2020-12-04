<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;
//use App\Http\Request;

class MainController extends Controller{
  public function home(){
    return view('main.home',[]);
  }

  public function index(){
    //$mailer = new OrderCreated();

    //return view('main.home',[]);
  }

  public function about(){
    return view('main.about',[]);
  }

  public function contact(){
    return view ('main.contact',[]);
  }
}
