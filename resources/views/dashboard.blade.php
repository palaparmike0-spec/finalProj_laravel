@extends('layouts.app')
@section('content')
<h2 class="mb-4">Dashboard</h2>
<div class="row g-3 mb-4">
  @foreach($counts as $label => $n)
  <div class="col-6 col-md-4 col-lg">
    <div class="card text-center shadow-sm"><div class="card-body">
      <h3>{{ $n }}</h3><div class="text-muted">{{ $label }}</div>
    </div></div>
  </div>
  @endforeach
</div>
<div class="card shadow-sm">
  <div class="card-header">Latest Exhibits</div>
  <ul class="list-group list-group-flush">
    @foreach($latestExhibits as $e)
      <li class="list-group-item">
        <a href="{{ route('exhibits.show', $e) }}">{{ $e->title }}</a> — {{ $e->artist->name }} ({{ $e->category->name }})
      </li>
    @endforeach
  </ul>
</div>
@endsection