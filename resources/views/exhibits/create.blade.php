@extends('layouts.app')
@section('content')
<h2>Add Exhibit</h2>
<div class="card shadow-sm"><div class="card-body">
  <form action="{{ route('exhibits.store') }}" method="POST">
    @csrf
    @include('exhibits._form', ['exhibit' => new \App\Models\Exhibit])
  </form>
</div></div>
@endsection