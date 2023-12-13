<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function main(){
        // dd(App::currentLocale());

        // session(['key' => 'default']);

        // dd(session()->all());

        return view('main');
    }

    public function about(){
        return view('about');
    }

    public function service(){
        return view('service');
    }

    public function project(){

        
        // dd('error');
        return view('project');


    }
  

    public function pages(){
        return view('pages');
    }

    public function contact(){
        return view('contact');
    }

    public function single(){
        return view('single');
    }
    
}
