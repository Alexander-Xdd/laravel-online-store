@extends('templates.base_pre')

@section('page.name')

    IEMI | Вход

@endsection


@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="m-0" style="float:left">
                                Вход
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

                            <form action="{{ route('login.store') }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="mb-3">
                                    <label class=" required">Email</label>
                                    <input type="email" name="email" class="form-control" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Пароль</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Войти
                                </button>
                            </form>

                            <h6 class="">
                                <a style="float:left">
                                    <br>
                                    Нет аккаунта?
                                    &nbsp;
                                <a href="{{ route('register') }}" >
                                    <br>
                                    Регистрация
                                </a>
                            </h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
