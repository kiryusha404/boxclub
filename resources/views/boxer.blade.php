@extends('layouts.app')

@section('content')
    <div class="coach">
        <h1 class="name_page">Наша гордость</h1>

        @foreach($boxers as $boxer)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/asset/images/boxer/{{$boxer->img}}" class="img-fluid rounded-start" alt="boxer">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $boxer->surname }} {{ $boxer->name }} {{ $boxer->patronymic }}</h5>
                            <p class="card-text">{{$boxer->text}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
