@extends('layouts.backendapp')

@section('content')
<h1 class="text-3xl font-bold underline">
  Hi, Welcome To {{auth()->user()->name}}'s Admin Panel</h1>



@endsection

