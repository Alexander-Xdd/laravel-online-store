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
                                Карточка продукта
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

                            <form action="{{ route('admin.table_products_prod.store', $prod_id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mb-3">
                                    <label class=" required">Название</label>
                                    <input type="name" value = '{{$name}}' name="name" class="form-control" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Адрес картинки</label>
                                    <input type="name" name="imglink" value = '{{$imglink}}' class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Описание</label>
                                    <input type="text" value = '{{$desc}}' name="description" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Цена</label>
                                    <input type="name" value = '{{$price}}' name="price" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Категория -> {{$category}}</label>
                                    <input type="name" value = '{{$category_id}}' name="category_id" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class=" required">Дата добавления: {{$data}}</label>
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

@endsection
