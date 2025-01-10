@extends('layout.main')

@section('title', 'Notifications')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Notifications</h3>
    <div class="card mb-3">
        <div class="card-header">Friend Requests</div>
        <ul class="list-group list-group-flush">
            @forelse($friendRequests as $request)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <span>{{ $request->sender->name }} has sent you a friend request.</span>
                        <span class="text-muted">{{ $request->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('acceptFriend', ['id' => $request->id]) }}" method="POST" class="me-2">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                        </form>
                        <form action="{{ route('declineFriend', ['id' => $request->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="list-group-item text-center">No friend requests right now.</li>
            @endforelse
        </ul>
    </div>
    <div class="card">
        <div class="card-header">Unread Messages</div>
        <ul class="list-group list-group-flush">
            @forelse($chatNotifications as $chat)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <span>{{ $chat->chatroom->user1->id === Auth::id() ? $chat->chatroom->user2->name : $chat->chatroom->user1->name }}: {{ $chat->message }}</span>
                        <span class="text-muted">{{ $chat->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('showChat', ['id' => $chat->chatroom_id]) }}" class="btn btn-primary btn-sm">View Chat</a>
                    </div>
                </li>
            @empty
                <li class="list-group-item text-center">No unread messages right now.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection