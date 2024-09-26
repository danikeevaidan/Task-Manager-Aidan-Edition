@extends('layouts.app')

@section('content')
    <div class="page-container">
        <h1>Create an Account</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required autofocus>
            </div>

            <div>
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
@endsection
