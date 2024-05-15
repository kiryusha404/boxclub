@extends('layouts.app')

@section('content')
<div class="news">
    <h1 class="name_page">Новости</h1>

    @if(Auth()->User() && Auth()->User()->role_id > 1)
        <div class=" block_news" style="width: 70%;">
            <div class="row justify-content-center">
                <div class="" >
                    <div class="card">
                        <div class="card-header">{{ __('Добавить новость') }}</div>

                        <div class="card-body">

                            <form method="POST" action="{{ route('add_news') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @csrf
                                <div class="form-group">
                                    <label for="name">Название новости</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="body">Содержание</label>
                                    <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image" style="width: 100%;">Картинка для новости</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Опубликовать</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach($news as $new)
    <div class="card block_news" style="width: 70%;">
        <img class="card-img-top" src="{{Storage::url($new->img) }}" alt="фото новости">
        <div class="card-body pb-0">
            <h5 class="card-title">{{ $new->name }}</h5>
            <p class="card-text">{{ $new->text }}</p>
            <p class="card-text date_news">{{ date('H:i d.m.y', strtotime($new->date)) }}</p>
        </div>
        @if(Auth()->User() && Auth()->User()->role_id > 1)

            <div class="news_comment" style="margin-bottom: 15px;">
                <form action="{{ route('del_news') }}" method="POST">
                    @csrf
                    <input type="hidden" name="new_id" value="{{ $new->id }}">
                    <div class="input-group text-danger">
                        <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить новость</button>
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

        <a href="{{ route('new', $new->id) }}" class="news_other">
        <div class="news_comment">
            <p>Подробнее ></p>
        </div>
        </a>

    </div>
    @endforeach



</div>
@endsection
