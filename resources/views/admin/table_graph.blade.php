@extends('templates.base')

@section('page.name')

    IEMI | Админка

@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="">

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/admin/table/graph/cat">График продуктов по категориям</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/admin/table/graph/usr">График количества заказов по пользователям</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/admin/table/graph/usr_act">График количества актуальных заказов по пользователям</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/admin/table/graph/usr_val">График стоимости заказанных товаров по пользователям</a></h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
