@extends('layout')

@section('content')
    <h1>Create new job</h1>

    <form action="/jobs" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" value="{{old('title')}}">
            @error('title')
                <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
            @enderror
        <input type="text" name="description" placeholder="Description" value="{{old('description')}}">
            @error('description')
                <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
            @enderror
        <button type="submit">Submit</button>
    </form>
@endsection