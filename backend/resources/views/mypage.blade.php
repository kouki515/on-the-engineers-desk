@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class=".bg-light">
        <div class="card">
          <div class="card-header h2">
            マイデバイス
          </div>

          <div class="card-body">
            <h5 class="card-title">
              @if($user['self_introduction'] === null)
                <form id="newSi" action="{{ route('mypage.newSi') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <textarea class="form-control" name="si" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">自己紹介を追加</button>
                </form>
              @else
                <div class="d-flex justify-content-between">
                  <div>
                    {{ $user->self_introduction }}
                  </div>

                  <div>
                    <a href="{{ route('si.show') }}" class="btn btn-primary">編集</a>
                  </div>
                </div>
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