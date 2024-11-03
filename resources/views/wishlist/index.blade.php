@extends('templates.base')

@section('page.name')

    IEMI | Список заказов

@endsection


@section('content')
<br>
        @if (empty($product))
            Нет текущих заказов
        @else
        <div class="container">
        <div class="row">
        <div class="">
        @foreach ($product as $key => $value)
        <br><br><br><br>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        Заказ номер {{$num[$key]}} на сумму {{$val[$key]}}₽ :
                        <p class="card-text"><small class="text-muted"><a href="wishlist/{{$num[$key]}}/del"> Подтвердить получение </a></small></p>
                    </div>
                </div>
            </div>
        </div>



            @foreach ($value as $key1 => $value1)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4" >
                    @if(!empty($product[$key][$key1]->imglink))
                    <img src="{{ asset($product[$key][$key1]->imglink) }}" class="img-fluid rounded-start" alt="...">
                    @else
                    <img src="{{ asset('img/err.jpg') }}" class="img-fluid rounded-start" alt="...">
                    @endif
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><a href="products/{{$product[$key][$key1]->id}}"> {{$product[$key][$key1]->name}}</a></h5>
                      <p class="card-text">{{$product[$key][$key1]->description}}</p>
                      <p class="card-text"><small class="text-muted">{{$product[$key][$key1]->price}}₽ x{{$kol[$key][$key1]}}</small></p>

                      <p class="card-text"><small class="text-muted">Итого: {{$product[$key][$key1]->price * $kol[$key][$key1]}}₽</small></p>
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

@endsection
