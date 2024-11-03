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
                                Профиль
                                <br><br>
                                <p class="card-text"><small class="text-muted">Для возможности совершить заказ нужно заполнить</small></p>
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

                            <form action="{{ route('profile.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mb-3">
                                    <label class=" required">Укажите Имя</label>
                                    <input type="name" value = '{{$first_name}}' name="first_name" class="form-control" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Укажите Фамилию</label>
                                    <input type="name" value = '{{$last_name}}' name="last_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Укажите адрес</label>
                                    <input type="name" value = '{{$adress}}' name="adress" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Укажите номер телефона</label>
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
    </section>

@endsection
