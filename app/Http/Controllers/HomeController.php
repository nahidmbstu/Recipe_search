<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }


    public function index2()
    {
        return view('home');
    }

    
     public function ajaxRequest()
    {
        return view('welcome');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        $name = $request->input('name');
        
        $url = "https://api.edamam.com/search?q=".$name."&app_id=2adad5a5&app_key=a3ccffac74bf59ec1f1cadb32b6dfb61";

        $data = file_get_contents($url);

        $json = json_decode($data);

      
        return response()->json(['success'=> $json ]);

    }


        public function add(Request $request,  $name)
    {
         $user = Auth::user()->name;
         $id = Auth::id();
         echo $name."<br/>".$user ."<br/>".$id;

    }


}
