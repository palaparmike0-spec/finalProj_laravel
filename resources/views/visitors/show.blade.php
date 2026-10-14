@extends('layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body">
  <h3>{{ $visitor->name }}</h3>
  <p class="text-muted">{{ $visitor->email }} | {{ $visitor->phone ?? 'No phone' }}</p>
  <p><strong>Visit date:</strong> {{ $visitor->visit_date }}</p>
  <p><strong>Tour:</strong>
    @if($visitor->tour)
      <a href="{{ route('tours.show', $visitor->tour) }}">{{ $visitor->tour->title }}</a>
    @else No tour booked @endif
  </p>
  <a href="{{ route('visitors.index') }}" class="btn btn-secondary">Back</a>
</div></div>
@endsection