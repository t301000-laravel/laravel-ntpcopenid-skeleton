@extends('layouts.app')

@section('title', '帳號資訊')

@section('content')
    <div class="container">
        <h1>帳號資訊</h1>

        <div class="card">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $user->name }}</li>
                    <li class="list-group-item">{{ $user->email }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
