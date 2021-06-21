@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class=".bg-light">

        <div class="card mb-4">
          <div class="card-header">自己紹介を編集</div>
          <div class="card-body">
            <form name="siform" method="POST" action="{{ route('mypage.edit_self_introduction') }}">
              @csrf
              <div class="form-group">
                <textarea class="form-control" name="si" rows="3"></textarea>
              </div>

              <div class="d-flex justify-content-end">
                <a href="javascript:siform.submit()" class="btn btn-primary mr-2" type="submit">完了</a>
                <a href="{{ route('mypage.show') }}" class="btn btn-secondary">キャンセル</a>
              </div>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
</div>
</div>
</div>
@endsection