<?php

namespace App\Http\Controllers;

use App\Model\Todo;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class TodoController.
 */
class TodoController
{
    use ValidatesRequests;

    public function index(): View
    {
        $todos = Todo::orderBy('created_at', 'asc')->get();

        return view('todos', [
            'todos' => $todos
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'task' => 'required|max:500'
        ]);

        Todo::create([ 'task' => request('task') ]);

        return redirect(route('todo.index'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $task = Todo::findOrFail($id);
        $task->delete();

        return redirect(route('todo.index'));
    }
}