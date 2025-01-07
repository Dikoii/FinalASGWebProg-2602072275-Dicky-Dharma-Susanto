@extends('layout.main')
@section('title', 'Home Page')
@section('content')
<div class="">
    <h3>Welcome, {{ Auth::user()->name }}!</h3>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
</div>
@endsection
