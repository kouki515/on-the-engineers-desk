@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
          <form method="POST" action="{{ route('search') }}">
            @csrf
            <div class="form-group row">
              <label for="keyword" class="col-md-4 col-form-label text-md-right">キーワード</label>
              <div class="col-md-6">
                <input id="keyword" type="keyword" class="form-control" name="keyword" value="{{ old('keyword') }}" required autofocus>

                @error('keyword')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  検索
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      @if(isset($items))
        <div class="grid my-grid">

          @foreach($items as $item)
            <div class="card mt-2">
              <a href="{{ $item['itemUrl'] }}" target=”_blank”>
                <img src="{{ $item['mediumImageUrls'] }}" class="card-img-top" alt="...">
              </a>
              <div class="card-body my-card-body">
                <a href="{{ $item['itemUrl'] }}" target=”_blank”>
                  <p class="card-text mb-3">{{ $item['itemName'] }}</p>
                </a>
                <a href="#" class="btn btn-primary my-btn pb-2">add to my device</a>
              </div>
            </div>
          @endforeach

          {{-- end grid --}}
        </div>
      @endif

    </div>
  </div>
</div>
@endsection