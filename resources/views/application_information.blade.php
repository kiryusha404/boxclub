@extends('layouts.app')

@section('content')

    <div class="schedule">
        <div class="card mb-3">
            <div class="card-body" style="text-align: center;">
                <p>Ваша заявка отправлена. С вами свяжутся по контактам указаным при регистрации.</p>
                    <form action="{{route('schedule')}}" method="get" >
                        @csrf
                        <div class="input-group" style="display: inline; text-align: center;">
                            <button type="submit" class="btn btn-outline-primary " data-mdb-ripple-init>Ок</button>
                        </div>
                    </form>
            </div>
        </div>
    <div>
@endsection
