@extends('layouts.app')

@section('content')
<div class="feedback">
    <h1 class="name_page">Отзывы</h1>

    <div class="feedback_user">

        @if(auth()->check())
        <div class="card card_feedback" style="width: 100%;">
            <div class="card-body">

                @if(!$form)
                        <form action="{{ route('add_feedback') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="feedback" class="form-control rounded" placeholder="Напишите ваш отзыв.." required aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Отправить</button>
                            </div>
                        </form>
                @else
                        <form action="{{ route('del_feedback') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить свой отзыв</button>
                            </div>
                        </form>
                @endif

            </div>
        </div>
        @endif

        @foreach($feedbacks as $feedback)
            <div class="card card_feedback" style="width: 100%;">
                <div class="card-body">
                    <h6>{{$feedback->surname}} {{$feedback->name}}</h6>
                    <p class="card-text">{{$feedback->text}}</p>
                    <p class="date_news date_feedback">{{ date('H:i d.m.y', strtotime($feedback->date)) }}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
