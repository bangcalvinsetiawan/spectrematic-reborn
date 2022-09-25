@extends('dashboard.layouts.main')

@section('container')

    <h1>Welcome, {{ auth()->user()->name }}</h1>

    <div>
        <button type="button" href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="btn btn-danger">Logout</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
