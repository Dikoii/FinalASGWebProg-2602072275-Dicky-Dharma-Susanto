@extends('layout.main')
@section('title', 'Friends Page')
@section('content')
<div class="container mt-5">
    <h3 class="text-center">Friends</h3>

    <h4>Accepted Friends</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($acceptedFriends as $friendship)
            <div class="col">
                <div class="card h-100">
                    <img 
                        src="{{ $friendship->sender_id == Auth::id() ? ($friendship->receiver->profile_picture ?: asset('assets/default-profile.jpg')) : ($friendship->sender->profile_picture ?: asset('assets/default-profile.jpg')) }}" 
                        class="card-img-top mx-auto" style="width: 8rem; height: 8rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $friendship->sender_id == Auth::id() ? $friendship->receiver->name : $friendship->sender->name }}</h5>
                    </div>
                </div>
            </div>
        @empty
            <p>No accepted friends yet.</p>
        @endforelse
    </div>

    <h4 class="mt-4">Pending Friend Requests</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($pendingRequests as $request)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ $request->sender->profile_picture ?: asset('assets/default-profile.jpg') }}" class="card-img-top mx-auto" style="width: 8rem; height: 8rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $request->sender->name }}</h5>
                        <p class="card-text">Pending Request</p>
                        <form method="POST" action="{{ route('acceptFriend', $request->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form method="POST" action="{{ route('declineFriend', $request->id) }}" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No pending friend requests.</p>
        @endforelse
    </div>
</div>
@endsection
