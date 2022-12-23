<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Providers\RouteServiceProvider;

class TaskController extends Controller
{
    //
    public function __construct()
    {
            $this->middleware('auth')->except(['index']);
            // OR
            $this->middleware('auth')->only(['store','update','edit','create']);
    }

    public function create(){

        return view('pages.create');
    }

    function store(Request $request){

    $task = new Task();
    $task->Task = $request->Task;
    $task->save();
    if( $task->save()){
    return redirect(RouteServiceProvider::HOME);
    }
    }


}
