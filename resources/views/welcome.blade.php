@extends('main')

@section('child')

    <div class="wrapper">

        <form action="/logout" method="POST">
            @csrf
            <button class="button" type="submit">Logout</button>
        </form>

        <h1 class="heading">Home Page - {{ auth()->user()->role }}</h1>

        <h2 class="heading">Welcome, {{ auth()->user()->name }}!</h2>

        @if(auth()->user()->role === 'admin')
            <h3>You Are Admin</h3>
        @else
            <form action="/blog" method="POST" class="form">
                @csrf
                <input class="input-field" type="text" name="title" id="title" placeholder="Title" required>
                <input class="input-field" type="text" name="content" id="content" placeholder="Content" required>
                <button class="button primary" type="submit">Post Blog</button>
            </form>

            <div>

                @include('post',['blogs'=>$blogs])

            </div>

        @endif 

    </div>

@endsection