@extends('main')

@section('child')
  
    <div class="wrapper">
        
        <h1 class="heading center-text">Login</h1>

        <form action="/login" method="POST" class="form">
            @csrf
            <input class="input-field" type="email" name="email" placeholder="Your Email" required value="{{ old('email') }}">
            <input class="input-field" type="password" name="password" id="password" placeholder="Password" required>
            <button class="button primary" type="submit">Login</button>
        </form>

        <a href="/register" class="center-text">Register Akun</a>

        
        @if(session("status"))
            <div class="flash success-msg">
                {{ session("status")}}
            </div>
        @endif

        @error('email')
            <div class="flash error-msg">{{ $message }}</div>
        @enderror

    </div>
   
@endsection