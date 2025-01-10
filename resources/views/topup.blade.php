@extends('layout.main')

@section('title', 'Top Up Coins')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Top Up Coins</h3>
    <div class="row mb-3">
        <div class="col-12 text-center">
            <h4>Your Current Balance: <span id="currentBalance">{{ $user->coin_balance }}</span> Coins</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <form action="{{ route('topupCoins') }}" method="POST">
                @csrf
                    <button type="submit" class="btn btn-primary btn-lg">Top Up 100 Coins</button>
            </form>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success mt-4 text-center">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection