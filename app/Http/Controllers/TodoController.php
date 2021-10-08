<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Task::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Task::$rules);
        $items = $request->all();
        Task::create($items);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        Task::find($request->content)->delete();
        return redirect('/');
    }
}
