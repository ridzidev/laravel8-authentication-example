@extends('layouts.app-master')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT') <!-- Use PUT method to update the profile -->

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="student" @if($user->role === 'student') selected @endif>Student</option>
                    <option value="teacher" @if($user->role === 'teacher') selected @endif>Teacher</option>
                    <option value="other" @if($user->role === 'other') selected @endif>Other</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Profile</button>
        </form>
    </div>
@endsection
