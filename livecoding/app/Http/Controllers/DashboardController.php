<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    //
    function index(){
        $task=Task::All();
        return view("dashboard",compact('task'));
    }

}
