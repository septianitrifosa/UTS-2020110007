@extends('layouts.template')

@section('title', $transaction->title)

@section('content')
    <transaction class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->title }}</h1>
        <p class="blog-post-meta">{{ $transaction->updated_at }}</p>
        @if ($transaction->image_url)
            <img src="{{ $transaction->image_url }}" class="rounded mx-auto d-block my-3">
        @endif
        <p>{{ $transaction->body }}</p>
    </transaction>
@endsection
