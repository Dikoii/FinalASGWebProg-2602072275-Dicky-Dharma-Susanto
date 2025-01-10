@extends('layout.main')
@section('title', 'Chat Rooms')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Your Friends</h3>
    <div class="row">
        @foreach($chatrooms as $chatroom)
            @php
                $friend = $chatroom->user_id_1 === Auth::id() ? $chatroom->user2 : $chatroom->user1;
            @endphp
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ $friend->profile_picture ?: asset('assets/default-profile.jpg') }}" class="card-img-top" alt="Profile Picture">
                    <div class="card-body">
                        <h5 class="card-title">{{ $friend->name }}</h5>
                        <p class="card-text">Field of Work: {{ $friend->field_of_work }}</p>
                        <a href="{{ route('showChat', ['id' => $chatroom->id]) }}" class="btn btn-primary">Chat</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
