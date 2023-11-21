@guest
@include('layouts.partials.navbar')
@endguest


@extends('layouts.app-master')


@section('content')

@auth
<div class="floating">
    @include('layouts.partials.navbar')
</div>
<!-- <div class="bg-light p-5 rounded"> -->
<div >


        @if (empty(auth()->user()->name) || empty(auth()->user()->email))

            
            <h1>Dashboard</h1>
            <p class="lead">Only authenticated users can access this section.</p>

            <form method="POST" action="{{ route('update_profile') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="student" {{ auth()->user()->role === 'student' ? 'selected' : '' }}>Student</option>
                        <option value="teacher" {{ auth()->user()->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="other" {{ auth()->user()->role === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        @else
            <p>Your name and email are already provided. Your role is: {{ auth()->user()->role }}</p>


            @include('layouts.partials.lorem')

        @endif



    
</div>


@endauth

    

@endsection

@guest
    @include('guess')
@endguest
