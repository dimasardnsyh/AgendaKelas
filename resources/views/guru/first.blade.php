@extends('layouts.admin')

@section('content')

<h1 class="text-left">Welcome back, {{ auth()->user()->nama }} !</h1>
<br>
<h3>Kamu login dengan level {{ auth()->user()->level }}</h3>

@endsection