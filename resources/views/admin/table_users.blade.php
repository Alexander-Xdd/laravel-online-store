@extends('templates.base')

@section('page.name')

    IEMI | Админка

@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="">

            <a href="http://185.91.178.198:7777/store.com/admin/table/users/o"> Версия для печати</a>
            <br><br>
            <form action="{{ route('admin.table_users_search') }}" method="GET">

                <div class="mb-3">
                    <input type="text" placeholder="Поиск пользователя по почте" name="search_admin" id = "search_admin" class="form-control" autofocus>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Найти
                    </button>

                </div>
            </form>
<br>
            @foreach ($users as $user)

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="http://185.91.178.198:7777/store.com/admin/table/users/{{$user->id}}">{{$user->email}}</a></h5>
                                <h6 class="card-title">{{$user->first_name}} {{$user->last_name}} ({{$user->name}}) </h6>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>


@endsection
