@extends('layouts.app')

@section('content')
    <div class="coach">
        <h1 class="name_page">Тренеры</h1>

        @foreach($coachs as $coach)
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/asset/images/coach/{{$coach->img}}" class="img-fluid rounded-start" alt="coach">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $coach->surname }} {{ $coach->name }} {{ $coach->patronymic }}</h5>
                        <p class="card-text">{{$coach->text}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
