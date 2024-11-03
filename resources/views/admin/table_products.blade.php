@extends('templates.base')

@section('page.name')

    IEMI | Админка

@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="">

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h5 class="m-0" style="float:left">
                                    Создать новый продукт
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

                                <form action="{{ route('admin.table_products.store') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="mb-3">
                                        <label class=" required">Название</label>
                                        <input type="name"  name="name" class="form-control" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label class=" required">Адрес картинки</label>
                                        <input type="name" name="imglink"  class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class=" required">Описание</label>
                                        <input type="text"  name="description" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class=" required">Цена</label>
                                        <input type="name" name="price" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class=" required">Категория
                                        <input type="name" list="category" name="category_id" class="form-control">
                                        <datalist id="category">
                                            @foreach ($categories as $cat)
                                            <option label = "{{$cat->name}}" value="{{$cat->id}}" />
                                            @endforeach
                                         </datalist>
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
            <br><br><br><br>
            <form action="{{ route('admin.table_products_search') }}" method="GET">

                <div class="mb-3">
                    <input type="text" placeholder="Поиск продукта" name="search_admin" id = "search_admin" class="form-control" autofocus>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Найти
                    </button>

                </div>
            </form>
<br>
            @foreach ($products as $product)

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/admin/table/products/{{$product->id}}"> {{$product->name}}</a></h5>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>


@endsection
