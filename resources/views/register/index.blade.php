@extends('templates.base_pre')

@section('page.name')

    IEMI | Регистрация

@endsection


@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="m-0" style="float:left">
                                Регистрация
                            </h4>


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

                            <form action="{{ route('register.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mb-3">
                                    <label class=" required">Укажите email</label>
                                    <input type="email" name="email" class="form-control" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Укажите пароль</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Повторите пароль</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Отображаемое имя</label>
                                    <input type="name" name="name" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Зарегистрироваться
                                </button>
                            </form>

                            <h5 class="">
                                <a style="float:left">
                                    <br>
                                    Уже есть аккаунт?
                                    &nbsp;
                                <a href="{{ route('login') }}" >
                                    <br>
                                    Войти
                                </a>
                            </h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
