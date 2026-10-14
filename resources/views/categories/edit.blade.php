@extends('layouts.app')
@section('content')
<h2>Edit Category</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf @method('PUT')
    @include('categories._form')
  </form>
</div></div>
@endsection