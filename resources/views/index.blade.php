@extends('layouts.app')

@section('title','CHECK TASK LIST')
@section('content')
<nav class="mb-4">
    <a href="{{ route('task.create') }}" class="font-medium text-gray-700 underline decoration-pink">
        Add Task
    </a>
</nav>
@foreach ($tasks as $task)
<div>

    <a href="{{ route('task.show',['id' => $task->id]) }}"
        @class(['font-bold','line-through'=> $task->completed])>
        {{ $task->title }}
    </a>
</div>
    @endforeach
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
@endsection
