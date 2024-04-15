@extends('layouts.app')

@section('content')
<div class="news">
    <h1 class="name_page">Новости</h1>
    @foreach($news as $new)
    <div class="card block_news" style="width: 70%;">
        <img class="card-img-top" src="/asset/images/news/{{ $new->img }}" alt="Card image cap">
        <div class="card-body pb-0">
            <h5 class="card-title">{{ $new->name }}</h5>
            <p class="card-text">{{ $new->text }}</p>
            <p class="card-text date_news">{{ date('H:i d.m.y', strtotime($new->date)) }}</p>
        </div>

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
        <a href="{{ route('new', $new->id) }}" class="news_other">
        <div class="news_comment">
            <p>Подробнее ></p>
        </div>
        </a>
    </div>
    @endforeach


</div>
@endsection
