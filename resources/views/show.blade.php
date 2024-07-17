@extends('layouts.app')

@section('title', $task->title)



@section('content')
<nav class="mb-4">
    <a href="{{ route('task.index') }}" class="font-medium text-gray-700 underline decoration-pink">
        <- Go back to the task list!
    </a>
</nav>

    <p class="mb-4 text-slate-700">
        {{ $task->description }}
    </p>

    @if ($task->long_description)
    <p class="mb-4 text-slate-700">

            {{ $task->long_description }}
        </p>
    @endif
    <p class="mb-4 text-sm text-slate-500">Created at {{ $task->created_at->diffForHumans() }} Updated at  {{ $task->updated_at->diffForHumans() }}</p>
<p class="mb-4">
        @if ($task->completed)
    <span class="font-medium text-green-500">Completed</span>
        @else
        <span class="font-medium text-red-500">Not Completed</span>

        @endif
</p>
<div class="d-flex gap-2">
    <a href="{{ route('task.edit',['id'=> $task->id]) }}"
        class="btn">Edit</a>

        <form action="{{ route('toggle.completed',['task' => $task]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <button class="btn" type="submit">
                Mart as {{ $task->completed ? 'not completed' : 'Completed' }}</div>
                </button>
        </form>

        <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn">Delete</button>
        </form>
    </div>
@endsection
