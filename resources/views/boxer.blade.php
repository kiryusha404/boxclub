@extends('layouts.app')

@section('content')
    <div class="coach">
        <h1 class="name_page">Наша гордость</h1>

        @if(Auth()->User() && Auth()->User()->role_id > 1)
            <div class=" block_news" style="width: 100%;">
                <div class="row justify-content-center">
                    <div  >
                        <div class="card">
                            <div class="card-header">{{ __('Добавить карточку боксёра') }}</div>

                            <div class="card-body">

                                <form method="POST" action="{{route('add_boxer')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Имя спортмена</label>
                                        <select class="form-select" aria-label="Disabled select example" name="id" id="name" required>
                                            <option selected disabled>Выберите</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->surname}} {{$user->name}} {{$user->patronymic}} - {{$user->email}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Описание спортмена</label>
                                        <textarea class="form-control" id="body" rows="3" name="body" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" style="width: 100%;">Фотография спортсмена</label>
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

        @foreach($boxers as $boxer)
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{Storage::url($boxer->img)}}" class="img-fluid rounded-start" alt="boxer">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $boxer->surname }} {{ $boxer->name }} {{ $boxer->patronymic }}</h5>
                            <p class="card-text">{{$boxer->text}}</p>
                            @if(Auth()->User() && Auth()->User()->role_id > 1)

                                <div class="news_comment " style="margin-bottom: 15px; ">
                                    <form action="{{ route('del_boxer') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $boxer->id }}">
                                        <div class="input-group text-danger">
                                            <button type="submit" class="btn btn-outline-primary b_feedback" data-mdb-ripple-init>Удалить карточку спортмена</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
