@extends('layout.main')
@section('title', 'Home Page')
@section('content')
<div class="container mt-5">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-3">Logout</button>
    </form>
    <h3 class="text-center my-4">Find and Add Friends</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($users as $user)
            @if($user->id !== Auth::id())
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $user->profile_picture ?: asset('assets/default-profile.jpg') }}" class="card-img-top mx-auto" style="width: 8rem; height: 8rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Field of Work: {{ $user->field_of_work }}</p>
                    </div>
                    <form method="POST" action="{{ route('addFriend', $user->id) }}">
                        @csrf
                        <button type="submit" class="m-3 btn btn-primary">Add Friend</button>
                    </form>
                </div>
            </div>
            @endif
        @empty
            <p>No users found.</p>
        @endforelse
    </div>
</div>
@endsection
