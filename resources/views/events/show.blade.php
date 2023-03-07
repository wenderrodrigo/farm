@extends('layouts.main')

@section('title', $event->title)

@section('content')


<p>{{ $event->title }} -- {{ $event->description }} <a href="/events/ {{ $event->id }}">Detalhar</a></p>

@endsection