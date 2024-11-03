AASD
@extends('templates.base')

@section('page.name')

    IEMI | Главная

@endsection


@section('content')
<br>
    Заказ на сумму {{$i}}₽ совершен

    <p class="card-text"><small class="text-muted"><a href="http://185.91.178.198:7777/store.com/wishlist"> Перейти в список заказов </a></small></p>

@endsection
