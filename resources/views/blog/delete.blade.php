@extends('layout')
@section('title', 'ブログ削除')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ブログ削除フォーム</h2>
        <form method="post" action="{{ route('delete') }}" onSubmit="return deleteSubmit()">
        @csrf
        <input type="hidden" name="id" value="{{ $blog->id}}">
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $blog->title }}"
                    type="text"
                 readonly>
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                    本文
                </label>
                <textarea readonly
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4"
                >{{ $blog->content }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('blogs') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary" >
                    削除する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function deleteSubmit(){
if(window.confirm('削除してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
