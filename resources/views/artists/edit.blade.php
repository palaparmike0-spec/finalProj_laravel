@extends('layouts.app')
@section('content')
<h2>Edit Artist</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('artists.update', $artist) }}" method="POST">
    @csrf @method('PUT')
    @include('artists._form')
  </form>
</div></div>
@endsection