@extends('layouts.app')
@section('content')
<h2>Add Category</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('categories.store') }}" method="POST">
    @csrf
    @include('categories._form', ['category' => new \App\Models\Category])
  </form>
</div></div>
@endsection