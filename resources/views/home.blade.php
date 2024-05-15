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

                    <ul class="list-group">
                        @foreach ($tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" {{ $task->is_active ? 'checked' : '' }} onclick="event.preventDefault(); document.getElementById('update-form-{{ $task->id }}').submit();">
                                <span class="{{ $task->is_active ? '' : 'text-decoration-line-through' }}">{{ $task->description }}</span>
                            </div>
                            <div>
                                <form action="{{ route('tasks.update', $task) }}" method="POST" style="display: none;" id="update-form-{{ $task->id }}">
                                    @csrf
                                    @method('PUT')
                                </form>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item {{ $tasks->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $tasks->previousPageUrl() }}" tabindex="-1">&lt;</a>
                            </li>
                            @foreach ($tasks->links()->elements as $element)
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        <li class="page-item {{ $tasks->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach

                            <li class="page-item {{ $tasks->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $tasks->nextPageUrl() }}">&gt;</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
