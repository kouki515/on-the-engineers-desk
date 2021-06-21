@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      <div class="grid my-grid">

        @foreach($users as $user)
          <div class="card">
            <div class="card-header">
              <a href="{{ Route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
            </div>

            <div class="card-body">
              {{ $user->self_introduction }}
            </div>
          </div>
        @endforeach()

      </div>

    </div>
  </div>
</div>
@endsection