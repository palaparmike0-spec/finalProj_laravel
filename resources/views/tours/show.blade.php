@extends('layouts.app')
@section('content')
<div class="card shadow-sm"><div class="card-body">
  <h3>{{ $tour->title }}</h3>
  <p class="text-muted">
    Exhibit:
    @if($tour->exhibit)
      <a href="{{ route('exhibits.show', $tour->exhibit) }}">{{ $tour->exhibit->title }}</a>
    @else - @endif
    | Guide: {{ $tour->guide_name }} | Date: {{ $tour->tour_date }}
  </p>
  <p><strong>Price:</strong> {{ number_format($tour->price, 2) }} |
     <strong>Booked:</strong> {{ $tour->visitors->count() }}/{{ $tour->capacity }}</p>
  <p>{{ $tour->description }}</p>
  <h5>Visitors</h5>
  <ul>
    @forelse($tour->visitors as $v)
      <li><a href="{{ route('visitors.show', $v) }}">{{ $v->name }}</a> ({{ $v->email }})</li>
    @empty
      <li>None</li>
    @endforelse
  </ul>
  <a href="{{ route('tours.index') }}" class="btn btn-secondary">Back</a>
</div></div>
@endsection