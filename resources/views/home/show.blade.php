@extends('templates.base')

@section('page.name')

    IEMI | {{$product->name}}

@endsection


@section('content')
<br>
    @if(empty($product))

        Такого товара не существует

    @else
        <div class="container">
        <div class="row">
        <div class="">
        <div class="product-card">
            <div class="product-thumb" style="text-align: center; height: 500px">
                @if(!empty($product->imglink))
                <a href="{{ asset($product->imglink) }}"> <img style="max-height: 100%" src="{{ asset($product->imglink) }}" alt="image.png"></a>
                @else
                <a href="{{ asset('img/err.jpg') }}"> <img style="max-height: 100%" src="{{ asset('img/err.jpg') }}" alt="image.png"></a>
                @endif
            </div>

            <div class="product-details ">
                <br><h4>{{$product->name}}</h4>
                <p>{{$category->name}}</p>
                <h5><p>Цена: {{$product->price}}₽</p></h5><br>

                <a href="{{$product->id}}/add">Добавить в корзину</a>

                <br><br><br>
                <p>{{$product->description}}<p>
            </div>

            @for ($i = 0, $j = 0; $i < count($value); $i++, $j++)

                {{$st[$i]}} –
                {{$value[$i]->string_value}};

            @endfor

        </div>
        </div>
        </div>
        </div>
    @endif

@endsection
