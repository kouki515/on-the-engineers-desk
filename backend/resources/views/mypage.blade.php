@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class=".bg-light">
        <div class="card">
          <div class="card-header">{{ $user->name }}</div>

          <div class="card-body">
            {{ $user->self_introduction }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection