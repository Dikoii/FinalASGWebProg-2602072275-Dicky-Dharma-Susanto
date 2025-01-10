@extends('layout.main')
@section('title', 'Home Page')
@section('content')
<div class="container mt-5">
    <form class="d-flex flex-row gap-2" method="GET" action="{{ route('home') }}" role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Search by name" value="{{ request('search') }}" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <div class="dropdown d-flex align-items-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filter 
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z"/>
              </svg>
            </button>
            <ul class="dropdown-menu">
                @foreach($genders as $gender)
                    <li><a class="dropdown-item" href="{{ route('home', ['gender' => $gender]) }}">{{ ucfirst($gender) }}</a></li>
                @endforeach
                <li><a class="dropdown-item" href="{{ route('home') }}">Clear Filter</a></li>
            </ul>
        </div>
    </form>
    <h3 class="text-center my-4">Find and Add Friends</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($users as $user)
            @if($user->id !== Auth::id())
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $user->profile_picture ?: asset('assets/default-profile.jpg') }}" class="card-img-top mx-auto" style="width: 8rem; height: 8rem;">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $user->name }}</h5>
                        <p class="card-text">Field of Work: {{ $user->field_of_work }}</p>
                        <p class="card-text">Gender: {{ $user->gender }}</p>
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
