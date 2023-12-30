<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return '<h1>Hello from UserController</h1>';
    }

    public function show($id){
        
        $data = array(
            'id' => $id,
            'name' => 'Windill Salleva',
            'age' => 22,
            'email' => 'salleva.windill@gmail.com'
        );

        //ma return as json
        //return view('home', ['data' => $data]);

        /*alternative sa pag pasa sng data pakadto sa frontend 
        return view('home')
                            ->with('id', $id)
                            ->with('name', 'Windill Salleva')
                            ->with('age', 22)
                            ->with('email', 'salleva.windill@gmail.com'); */

        return view('home', $data);
    }
}
