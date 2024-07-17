@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="container">

    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Task Title" />
            <span class="text-red-600">
                @error('title')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Enter Task Description" />
            <span class="text-red-600">
            @error('description')
            {{ $message }}
            @enderror
            </span>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">long_description</label>
            <input type="text" class="form-control" name="long_description" placeholder="Enter Task Long Description" />
            <span class="text-red-600">
            @error('long_description')
            {{ $message }}
            @enderror
            </span>
        </div>
        <button type="submit" class="btn">Submit</button>
        <a href="{{ route('task.index') }}" class="btn">Cancel</a>
    </form>

</div>
@endsection
