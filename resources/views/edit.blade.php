@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="container">

    <form action="{{ route('task.update',['id'=> $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title',$task->title) }}" placeholder="Enter Task Title" />
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" value="{{ old('description') }}">{{ $task->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">long_description</label>
            <textarea name="long_description" id="" cols="30" rows="10" value="{{ old('long_description') }}">{{ $task->long_description }}</textarea>
        </div>
        <button type="submit">Submit</button>
    </form>

</div>
@endsection
