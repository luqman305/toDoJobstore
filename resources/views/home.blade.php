@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To Do List</div>

                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="description" class="form-control" placeholder="Add new task" required>
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>

                    @if (empty($tasks))
                        <p class="text-center">No tasks available. Add a new task above.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <form action="{{ route('tasks.update', $task['id']) }}" method="POST" id="update-form-{{ $task['id'] }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="checkbox" {{ $task['is_active'] ? 'checked' : '' }} onclick="event.preventDefault(); document.getElementById('update-form-{{ $task['id'] }}').submit();">
                                        <span class="{{ $task['is_active'] ? '' : 'text-decoration-line-through' }}">{{ $task['description'] }}</span>
                                    </form>
                                </div>
                                <div>
                                    <form action="{{ route('tasks.destroy', $task['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
