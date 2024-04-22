@extends('layouts.app')

@section('content')

<div class="about">
    <h1 class="name_page">О нас</h1>
    <div class="row w-100">
        <div class="col-lg-6 my-4">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Adc5ba26e90a0aeaf31ce430716f9bfe47d052215315b094090038e1921aa45a3&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
        </div>
        <div class="col-lg-6 my-4 d-flex align-items-center">
            <div>
                <h4>Контактная информация:</h4>
                <p>Г. Ижевск ул. Ворошилова, 68</p>
                <p>+7 (3412) 45-23-12</p>
                <p>boxclub@gmail.com</p>
            </div>
        </div>
    </div>
</div>
@endsection
