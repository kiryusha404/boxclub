@extends('layouts.app')

@section('content')

    <div class="about">
        <h1 class="name_page">Админ панель</h1>
        <h3 class="name_page">Добавить модератора</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">


                        <div class="card-body">
                            <form method="POST" action="{{route('add_moder')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="moder" class="col-md-4 col-form-label text-md-end">{{ __('Пользователь') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Disabled select example" name="moder">
                                            <option selected disabled>Выберете</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->surname}} {{$user->name}} {{$user->patronymic}} - {{$user->email}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Добавить') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3 class="name_page">Удалить модератора</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">


                        <div class="card-body">
                            <form method="POST" action="{{route('del_moder')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="moder" class="col-md-4 col-form-label text-md-end">{{ __('Пользователь') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Disabled select example" name="moder">
                                            <option selected disabled>Выберете</option>
                                            @foreach($moders as $moder)
                                                <option value="{{$moder->id}}">{{$moder->surname}} {{$moder->name}} {{$moder->patronymic}} - {{$moder->email}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Удалить') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection