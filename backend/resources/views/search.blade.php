@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header">検索</div>
        <div class="card-body">
          <form method="POST" action="{{ route('search.show') }}">
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
    </div>

    <div class="col-md-12">

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
                @auth
                  <a href="javascript:document.getElementById('item-store').submit()" class="btn btn-primary my-btn pb-2">マイデバイスに追加</a>
                  <form id="item-store" action="{{ route('search.store') }}" method="post" style="display: none">
                    @csrf
                    <input name="itemName" type="hidden" value="{{ $item ['itemName'] }}">
                    <input name="itemPrice" type="hidden" value="{{ $item ['itemPrice'] }}">
                    <input name="itemUrl" type="hidden" value="{{ $item ['itemUrl'] }}">
                    <input name="mediumImageUrls" type="hidden" value="{{ $item ['mediumImageUrls'] }}">
                  </form>
                @endauth
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