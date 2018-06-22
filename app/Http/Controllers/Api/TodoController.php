<?php

namespace App\Http\Controllers\Api;

use App\Model\Todo;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

/**
 * Class TodoController.
 */
class TodoController
{
    use ValidatesRequests;

    public function index()
    {
        return Todo::orderBy('created_at', 'asc')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|max:500'
        ]);

        return Todo::create([ 'task' => request('task') ]);
    }

    public function destroy(int $id)
    {
        $task = Todo::findOrFail($id);
        $task->delete();

        return response('', 204);
    }
}