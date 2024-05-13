@extends('layouts.app')

@section('content')

    @foreach($news as $new)
        <div class="card block_news" style="width: 90%;">
            <img class="card-img-top" src="{{Storage::url($new->img) }}" alt="Card image cap">
            <div class="card-body pb-0">
                <h5 class="card-title">{{ $new->name }}</h5>
                <p class="card-text">{{ $new->text }}</p>
                <p class="card-text date_news">{{ date('H:i d.m.y', strtotime($new->date)) }}</p>
            </div>
            @if(auth()->check())
            <div class="comment_feedback">
                <form action="{{ route('add_comment') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="comment" class="form-control rounded" placeholder="Ваш комментарий.." required aria-label="Search" aria-describedby="search-addon" />
                        <input type="hidden" name="new_id" value="{{ $new->id }}">
                        <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Отправить</button>
                    </div>
                </form>
            </div>
            @endif
            @if(count($new->comments) > 0)
                <div class="news_comment">
                    @foreach($new->comments as $comment)
                        <div class="{{!$loop->last ? 'date_comment' : ''}}">
                            <h6>{{ $comment->surname }} {{$comment->name}}</h6>
                            <p>{{ $comment->text }}</p>
                            <p class="date_news">{{ date('H:i d.m.y', strtotime($comment->date)) }}</p>
                        </div>

                    @endforeach
                </div>
            @endif

        </div>
    @endforeach

@endsection
