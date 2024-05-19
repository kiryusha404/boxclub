@extends('layouts.app')

@section('content')

    <div class="schedule">
        <h1 class="name_page">Расписание</h1>
        @if($status[0]->status != 'completed')
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
                    @if($status[0]->status != 'processing')
                    <form action="{{route('del_application')}}" method="post">
                        @csrf
                        <div class="input-group">
                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить заявку</button>
                        </div>
                    </form>
                    @else
                        <p class="name_page" style="margin-bottom: 0px;">Ваша заявка обрабатывается</p>
                    @endif
                @endif
            </div>
        </div>
        @endif

        @if(Auth()->User() && Auth()->User()->role_id > 1)
            <div class=" block_news" style="width: 100%;">
                <div class="row justify-content-center">
                    <div  >
                        <div class="card">
                            <div class="card-header">{{ __('Добавить спортивные занятия') }}</div>

                            <div class="card-body">

                                <form method="POST" action="{{ route('add_schedule') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @csrf
                                    <div class="form-group">
                                        <label for="weekday">Дни недели</label>
                                        <select class="form-select" aria-label="Disabled select example" name="weekday" id="weekday" required>
                                            <option selected disabled>Выберите</option>
                                            @foreach($weekday as $day)
                                                <option value="{{$day->id}}">{{$day->weekday}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Название группы</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="time1">Время занятия</label>
                                        <div class="d-flex justify-content-between">
                                        <p >C </p>
                                        <input type="time" class="form-control w-25" id="time1" name="time1" required>
                                        <p> до </p>
                                        <input type="time" class="form-control w-25" id="time2" name="time2" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Добавить</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @foreach($schedule as $coach)
        <div class="card mb-3 ">
            <div class="card-body">
                <h5 class="card-title">Тренер: {{ $coach->surname }} {{ $coach->name }} {{ $coach->patronymic }}</h5>
                @foreach($coach->position as $schedule)
                    <div class="position-relative">
                        <h6 style="margin: 0;">{{$schedule->schedule_name}}:</h6>
                        <p class="card-text" style="margin-bottom: 10px;">{{$schedule->weekday}} с {{date('H:i', strtotime($schedule->time1))}} до {{date('H:i', strtotime($schedule->time2))}}</p>

                            @if(Auth()->User() && Auth()->User()->id == $schedule->user_id)
                                <div class=" position-absolute top-0 end-0">
                                    <form action="{{ route('del_schedule') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $schedule->schedule_id }}">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-link btn-sm" data-mdb-ripple-init style="padding: 0px;">Удалить</button>
                                        </div>
                                    </form>
                                </div>
                            @elseif(Auth()->User() && Auth()->User()->role_id == 3)
                                <div class=" position-absolute top-0 end-0">
                                    <form action="{{ route('del_schedule_admin') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $schedule->schedule_id }}">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-link btn-sm" data-mdb-ripple-init style="padding: 0px;">Удалить</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                    </div>
                @endforeach



            </div>
        </div>
        @endforeach

@endsection
