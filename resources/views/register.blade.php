@extends('main')

@section('child')

    <div class="wrapper">

        <h1 class="heading center-text">Register</h1>

        <form action="/register" method="POST" class="form">
            @csrf
            <input class="input-field" type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            <input class="input-field" type="text" name="name" placeholder="Name" required value="{{ old('name') }}">
            <input class="input-field" type="password" name="password" id="password" placeholder="Password" required>
            <div class="input-group">
                <input type="radio" name="role" id="admin" value="admin">
                <label for="admin">Admin</label>
                <input type="radio" name="role" id="user" value="user">
                <label for="user">User</label>
            </div>
            <button class="button primary" type="submit">Register</button>
        </form>
        
        <a href="/login" class="center-text">Login</a>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="flash error-msg">{{$error}}</div>
            @endforeach
        @endif

    </div>

@endsection