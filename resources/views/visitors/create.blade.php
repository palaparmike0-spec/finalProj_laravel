@extends('layouts.app')
@section('content')
<h2>Add Visitor</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('visitors.store') }}" method="POST">
    @csrf
    @include('visitors._form', ['visitor' => new \App\Models\Visitor])
  </form>
</div></div>
@endsection