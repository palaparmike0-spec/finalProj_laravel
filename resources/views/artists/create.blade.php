@extends('layouts.app')
@section('content')
<h2>Add Artist</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('artists.store') }}" method="POST">
    @csrf
    @include('artists._form', ['artist' => new \App\Models\Artist])
  </form>
</div></div>
@endsection