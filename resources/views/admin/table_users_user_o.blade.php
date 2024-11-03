@extends('templates.base')

@section('page.name')

    IEMI | Профиль

@endsection


@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h5 class="m-0" style="float:left">
                                Отчет по пользователю {{$email}}
                            </h5>
                            <br>
                            <br>
                            <p class="m-0" style="float:left">
                                Email: {{$email}}
                            </p>
                            <br>
                            <p class="m-0" style="float:left">
                                Отображаемое имя: {{$name}}
                            </p>
                            <br>
                            <p class="m-0" style="float:left">
                                Дата регистрации: {{$data}}
                            </p>
                            <br>
                            <p class="m-0" style="float:left">
                                Имя: {{$first_name}}
                            </p>
                            <br>
                            <p class="m-0" style="float:left">
                                Фамилия: {{$last_name}}
                            </p>
                            <br>
                            <p class="m-0" style="float:left">
                                Адрес: {{$adress}}
                            </p>
                            <br>
                            <p class="m-0" style="float:left">
                                Номер телефона: {{$phone}}
                            </p>


                        </div>


                        <div class="card-body">




                        </div>
                    </div>
                </div>
            </div>
        </div>






        @if (empty($product))
            Нет текущих заказов
        @else
        <div class="container">
        <div class="row">
        <div class="">
        @foreach ($product as $key => $value)
        <br>
        <div class="col-12 col-md-6 offset-md-3 card mb-3" style="max-width: 665px;">
            Заказ №{{$num[$key]}} на сумму {{$val[$key]}}₽ :

            @if ($orders[$key]->actual == 0)
            Завершен
            @else
            Актуален

            @endif
        </div>
            @foreach ($value as $key1 => $value1)
            <div class="col-12 col-md-6 offset-md-3 card mb-3" style="max-width: 665px;">
                <div class="row g-0">

                  <div class="col-md-8">
                    <div class="card-body">
                      <h6 href="http://185.91.178.198:7777/store.com/products/{{$product[$key][$key1]->id}}"> {{$product[$key][$key1]->name}}</h6>
                      <p class="card-text">id товара: {{$product[$key][$key1]->id}}</p>
                      <h6 class="card-text"><small class="text-muted">{{$product[$key][$key1]->price}}₽ x{{$kol[$key][$key1]}}</small></h6>

                      <h6 class="card-text"><small class="text-muted">Итого: {{$product[$key][$key1]->price * $kol[$key][$key1]}}₽</small></h6>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        @endforeach
        </div>
        </div>
        </div>
        @endif
    </section>

@endsection
