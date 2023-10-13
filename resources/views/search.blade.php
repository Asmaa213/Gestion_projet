@extends('layouts.user_type.auth')

@section('content')
    <div class="container">
        <h2>Search Results for: "{{ $query }}"</h2>

        <ul>
            @foreach ($posts as $post)
                <li>{{ $post->title }}</li>
            @endforeach
        </ul>
    </div>
@endsection
