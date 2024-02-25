@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $viewData["plant"]->imageUrl }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $viewData["plant"]->name }}</h5>
        <p class="card-text">ID: {{ $viewData["plant"]->id }}</p>
        <p class="card-text">Description: {{ $viewData["plant"]->description }}</p>
        <p class="card-text">Price: ${{ $viewData["plant"]->price }}</p>
        <p class="card-text">Remaining Stock: {{ $viewData["plant"]->stock }} units</p>
        <form method="POST" action="{{ route('plant.delete', ['id' => $viewData["plant"]->id]) }}" onsubmit="return confirm('Are you sure you want to delete this plant?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete Plant</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
