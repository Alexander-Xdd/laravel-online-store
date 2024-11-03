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
                                Название
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

                            <form action="{{ route('admin.table_categories_category.store', $category_id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="mb-3">
                                    <input type="name" value = '{{$category}}' name="name" class="form-control" autofocus>
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
