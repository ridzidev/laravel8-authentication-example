@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h1>User Profile</h1>

        <div>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
        </div>

        <!-- <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a> -->
        <a href="{{ route('profile.edit', ['edit' => 1]) }}">Edit Profile</a>

    </div>
@endsection
