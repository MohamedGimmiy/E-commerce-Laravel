@extends('layouts.master')
@section('name', 'Home page')
@section('content')
    <main class="homepage">
        @include('pages.components.home.header')
        <form action="{{route("logout")}}" method="post">
            @csrf
            <button class="btn btn-primary">logout</button>
        </form>
    </main>
    Home page section
@endsection
