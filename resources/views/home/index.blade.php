@extends('templates.base')

@section('page.name')

    IEMI | Главная

@endsection


@section('content')
<br>
    @if(empty($product))

        БД пуста

    @else
        <div class="container">
        <div class="row">
        <div class="">

        <form action="{{ route('products.search') }}" method="GET">

            <div class="mb-3">
                <input type="text" placeholder="Поиск" name="search" id = "search" class="form-control" autofocus>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">
                    Найти
                </button>
            </div>
        </form>
<br><br>

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title">Поиск по категориям</h6>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($categories as $cat)

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="card-title"><a href="/products/filter?filter={{$cat->id}}"> {{$cat->name}}</a></h6>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

<br><br><br>
        @foreach($product as $key => $value)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if(!empty($value->imglink))
                <img src="{{ asset($value->imglink) }}" class="img-fluid rounded-start" alt="...">
                @else
                <img src="{{ asset('img/err.jpg') }}" class="img-fluid rounded-start" alt="...">
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/products/{{$value->id}}"> {{$value->name}}</a></h5>
                  <p class="card-text"><small class="text-muted">{{$category[$key]->name}}</small></p>
                  <p class="card-text">{{$value->description}}</p>
                  <p class="card-text"><small class="text-muted">{{$value->price}}₽</small></p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
        </div>
        </div>
    @endif

@endsection
