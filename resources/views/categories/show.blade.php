@extends('layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body">
  <h3>{{ $category->name }}</h3>
  <p>{{ $category->description }}</p>
  <h5>Exhibits in this category</h5>
  <ul>
    @forelse($category->exhibits as $e)
      <li><a href="{{ route('exhibits.show', $e) }}">{{ $e->title }}</a></li>
    @empty
      <li>None</li>
    @endforelse
  </ul>
  <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
</div></div>
@endsection