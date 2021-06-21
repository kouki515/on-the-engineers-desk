@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class=".bg-light">
        <div class="card">
          <div class="card-header h2">
            マイデバイス
          </div>

          <div class="card-body">
            <h5 class="card-title">
              @if($user['self_introduction'] === null)
                自己紹介を追加
              @else
                自己紹介を変更
              @endif
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
                      <a href="javascript:document.getElementById('item-delete').submit()" class="btn btn-primary my-btn pb-2">マイデバイスから削除</a>
                      <form id="item-delete" action="{{ route('mypage.delete') }}" method="post" style="display: none">
                        @csrf
                        <input name="id" type="hidden" value="{{ $item ['id'] }}">
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