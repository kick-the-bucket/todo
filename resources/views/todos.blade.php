@extends('layout')

@section('content')
    <div class="card bg-secondary text-light mb-3">
        <div class="card-header bg-dark text-uppercase">ToDo</div>
        <div class="card-body">
            @include('errors')

            <form id="add" action="{{ url(route('todo.store')) }}" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="todo" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <input type="text" name="task" id="todo" class="form-control" placeholder="Task">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <div class="card bg-secondary text-light">
        <div class="card-header bg-dark text-uppercase">Current Tasks</div>
        <div class="card-body">
            <table id="list" class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Created at</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($todos as $todo)
                    <tr>
                        <td>{{ $todo->task }}</td>
                        <td>{{ $todo->created_at }}</td>
                        <td class="text-right">
                            <form action="{{ route('todo.destroy', [$todo->id]) }}" method="POST">
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection