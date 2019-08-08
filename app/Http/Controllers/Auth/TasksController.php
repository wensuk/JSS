<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller as Controller;

use DB;
use Hash;
use Log;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TasksController extends Controller
{
    //
    // public function index()
    // {
    //     $user = Auth::user();
    //     return view('welcome', compact('user'));
    // }

    // public function add()
    // {
    //     return view('add');
    // }

    public function new(Request $request)
    {
        $task = new Task();
        $task->description = $request->description;
        $task->customer = $request->customer;
        $task->status = $request->status;
        $task->category = $request->category;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/');
    }

    public function edit(Task $task)
    {
        if (Auth::check())
        {
           return view('edit', compact('task'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function update(Request $request, Task $task)
    {
        if (Auth::check() && isset($_POST['delete']))
        {
            $task->delete();
            return redirect('/');
        }
        else
        {
          if (Auth::check())
          {
              $task->description = $request->description;
              $task->customer = $request->customer;
              $task->status = $request->status;
              $task->category = $request->category;
              $task->save();
              return redirect('/');
          }
        }

    }

    public function showTaskPage()
    {

        return view('auth.task');
    }
}
