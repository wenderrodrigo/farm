@extends('layouts.main')

@section('title', 'Home - Farms')

@section('content')

@foreach($events as $event)
    <p>{{ $event->title }} -- {{ $event->description }} <a href="/events/ {{ $event->id }}">Detalhar</a></p>
@endforeach

@endsection