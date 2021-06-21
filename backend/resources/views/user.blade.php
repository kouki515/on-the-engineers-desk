@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class=".bg-light">
        <div class="card">
          <div class="card-header h2">
            {{ $user['name'] }}さんのデバイス
          </div>

          <div class="card-body">
            <h5 class="card-title">
              {{ $user['self_introduction'] }}
            </h5>

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
                      <form id="item-store" action="{{ route('users.store') }}" method="post" style="display: none">
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

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection