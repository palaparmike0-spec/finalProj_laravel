@extends('layouts.app')
@section('content')
<h2>Edit Exhibit</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('exhibits.update', $exhibit) }}" method="POST">
    @csrf @method('PUT')
    @include('exhibits._form')
  </form>
</div></div>
@endsection