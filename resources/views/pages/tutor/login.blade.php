@extends('layout.layout')

@section('title', 'Login')

@section('content')
    <div class="login-container">
        <h2 class="login-heading">Login</h2>

        <form method="POST" action="{{ route('tutor.login.submit') }}">
            @csrf

            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>

        </form>
    </div>
@endsection
