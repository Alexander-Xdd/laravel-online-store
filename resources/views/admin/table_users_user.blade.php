@extends('templates.base')

@section('page.name')

    IEMI | Профиль

@endsection


@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <a href = "http://185.91.178.198:7777/store.com/admin/table/users/{{$user_id}}/o">Версия для печати</a>
                    <br><br>
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h5 class="m-0" style="float:left">
                                Профиль пользователя
                                <br><br>

                            </h5>


                        </div>


                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger small p-2">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $message)
                                            <li>
                                                {{ $message }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.table_users_user.store', $user_id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mb-3">
                                    <label class=" required">Email</label>
                                    <input type="email" value = '{{$email}}' name="email" class="form-control" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Отображаемое имя</label>
                                    <input type="name" name="name" value = '{{$name}}' class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Дата регистрации: {{$data}}</label>
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Имя</label>
                                    <input type="name" value = '{{$first_name}}' name="first_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Фамилия</label>
                                    <input type="name" value = '{{$last_name}}' name="last_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Адрес</label>
                                    <input type="name" value = '{{$adress}}' name="adress" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Номер телефона</label>
                                    <input type="tel" value = '{{$phone}}' name="phone" class="form-control">
                                </div>


                                <button type="submit" class="btn btn-primary">
                                    Подтвердить
                                </button>
                            </form>

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
        <br><br><br>
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
                      <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/products/{{$product[$key][$key1]->id}}"> {{$product[$key][$key1]->name}}</a></h5>
                      <p class="card-text">id товара: {{$product[$key][$key1]->id}}</p>
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
    </section>

@endsection
