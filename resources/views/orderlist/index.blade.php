@extends('templates.base')

@section('page.name')

    IEMI | Корзина

@endsection


@section('content')
<br>
    @if(empty($product))

    Корзина пуста

    @else
        <div class="container">
        <div class="row">
        <div class="">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                           <h6><a href="orderlist/order"> Оформить заказ на {{$parr}}₽</a></h6>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @for ($m = 0; $m < $i; $m++)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if(!empty($product[$m]->imglink))
                <img src="{{ asset($product[$m]->imglink) }}" class="img-fluid rounded-start" alt="...">
                @else
                <img src="{{ asset('img/err.jpg') }}" class="img-fluid rounded-start" alt="...">
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><a href="products/{{$product[$m]->id}}"> {{$product[$m]->name}}</a></h5>
                  <p class="card-text">{{$product[$m]->description}}</p>
                  <p class="card-text"><small class="text-muted">{{$product[$m]->price}}₽ x{{$col[$m]}}</small></p>

                  <p class="card-text"><small class="text-muted">Итого: {{$product[$m]->price * $col[$m]}}₽</small></p>

                  <p class="card-text"><small class="text-muted"><a href="orderlist/{{$product[$m]->id}}/del"> Удалить </a></small></p>
                </div>
              </div>
            </div>
          </div>
        @endfor
        </div>
        </div>
        </div>
    @endif

@endsection
