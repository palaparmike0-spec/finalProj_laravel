@extends('layouts.app')
@section('content')
<h2>Add Tour</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('tours.store') }}" method="POST">
    @csrf
    @include('tours._form', ['tour' => new \App\Models\Tour])
  </form>
</div></div>
@endsection