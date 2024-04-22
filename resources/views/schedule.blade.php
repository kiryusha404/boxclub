@extends('layouts.app')

@section('content')

    <div class="schedule">
        <h1 class="name_page">Расписание</h1>
        <div class="card mb-3">
            <div class="card-body">
                @if($form == 0)
                <form action="{{route('add_application')}}" method="post">
                    @csrf
                    <div class="input-group">
                        <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Записаться на первое занятие</button>
                    </div>
                </form>
                @else
                    <form action="{{route('del_application')}}" method="post">
                        @csrf
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить заявку</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        @foreach($schedule as $coach)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Тренер: {{ $coach->surname }} {{ $coach->name }} {{ $coach->patronymic }}</h5>
                @foreach($coach->position as $schedule)
                <h6 style="margin: 0;">{{$schedule->schedule_name}}:</h6>
                <p class="card-text">{{$schedule->weekday}} с {{date('H:i', strtotime($schedule->time1))}} до {{date('H:i', strtotime($schedule->time2))}}</p>
                @endforeach
            </div>
        </div>
        @endforeach

@endsection
