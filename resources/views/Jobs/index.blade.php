@extends('layout')

@section('content')
    <h1 class="text-bold text-2xl">All jobs section</h1>

    <ul>
        @forelse ($jobs as $job)
            <li><a href="{{route('jobs.show', $job->id)}}">{{$job->title}}</a> - {{$job->description}}</li>
        @empty
            <li>No Jobs available</li>
        @endforelse
    </ul>
@endsection