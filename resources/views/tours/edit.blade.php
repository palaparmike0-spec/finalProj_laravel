@extends('layouts.app')
@section('content')
<h2>Edit Tour</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('tours.update', $tour) }}" method="POST">
    @csrf @method('PUT')
    @include('tours._form')
  </form>
</div></div>
@endsection