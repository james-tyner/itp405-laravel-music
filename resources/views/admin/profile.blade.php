@extends('layout')

@section('title', 'Profile')

@section('main')
  {{-- <h1>Welcome back, {{$user->name}}</h1> --}} {{-- Removed because we didn't store the user's name --}}
  <h3 class="text-secondary mb-0">Your email is</h3>
  <h1>{{$user->email}}</h1>
@endsection
