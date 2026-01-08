@extends('layout')

@section('content')
    <h1 class="text-2xl">{{$job->title}}</h1>
    <p>{{$job->description}}</p>

    <a href="{{route('jobs.index')}}">Back to Listings</a>
@endsection
