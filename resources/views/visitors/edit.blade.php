@extends('layouts.app')
@section('content')
<h2>Edit Visitor</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('visitors.update', $visitor) }}" method="POST">
    @csrf @method('PUT')
    @include('visitors._form')
  </form>
</div></div>
@endsection