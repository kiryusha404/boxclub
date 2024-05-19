@extends('layouts.app')

@section('content')

    <div class="about">
        <h1 class="name_page">Заявки</h1>
        <h3 class="name_page">Необработанные заявки</h3>
        @if(isset($expectation[0]->name))
        @foreach($expectation as $application)
            <div class="card card_feedback position-relative" style="width: 100%;">
                <div class="card-body">
                    <h6>{{ $application->surname }} {{ $application->name }} {{ $application->patronymic }}</h6>
                    <p class="card-text" style="margin-bottom: 0px;">Почта: {{ $application->email }}</p>
                    <p class="card-text">Номер телефона: {{ $application->tel }}</p>
                    <p class="date_news date_feedback">{{ date('H:i d.m.y', strtotime($application->date)) }}</p>
                </div>

                <div class=" position-absolute top-0 end-0">
                    <form action="{{ route('processing_application') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $application->application }}">
                        <div class="input-group text-danger">
                            <button type="submit" class="btn btn-link " data-mdb-ripple-init style="padding: 20px; padding-top: 15px;">Обработать</button>
                        </div>
                    </form>
                </div>

            </div>
        @endforeach
        @else
            <p class="name_page">Пока пусто.</p>
        @endif
        <h3 class="name_page">Заявки в обработке</h3>
        @if(isset($processing[0]->name))
        @foreach($processing as $application)
                <div class="card card_feedback position-relative" style="width: 100%;">
                    <div class="card-body">
                        <h6>{{ $application->surname }} {{ $application->name }} {{ $application->patronymic }}</h6>
                        <p class="card-text" style="margin-bottom: 0px;">Почта: {{ $application->email }}</p>
                        <p class="card-text">Номер телефона: {{ $application->tel }}</p>
                        <p class="date_news date_feedback">{{ date('H:i d.m.y', strtotime($application->date)) }}</p>
                    </div>

                    <div class=" position-absolute top-0 end-0">
                        <form action="{{route('completed_application')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $application->application }}">
                            <div class="input-group text-danger">
                                <button type="submit" class="btn btn-link " data-mdb-ripple-init style="padding: 20px; padding-top: 15px;">Завершить</button>
                            </div>
                        </form>
                    </div>

                </div>
            @endforeach
        @else
            <p class="name_page">Пока пусто.</p>
        @endif
        <h3 class="name_page">Завершенные заявки</h3>

        @if(isset($completed[0]->name))
        @foreach($completed as $application)
            <div class="card card_feedback " style="width: 100%;">
                <div class="card-body">
                    <h6>{{ $application->surname }} {{ $application->name }} {{ $application->patronymic }}</h6>
                    <p class="card-text" style="margin-bottom: 0px;">Почта: {{ $application->email }}</p>
                    <p class="card-text">Номер телефона: {{ $application->tel }}</p>
                    <p class="date_news date_feedback">{{ date('H:i d.m.y', strtotime($application->date)) }}</p>
                </div>


            </div>
        @endforeach
        @else
            <p class="name_page">Пока пусто.</p>
        @endif
    </div>
@endsection
