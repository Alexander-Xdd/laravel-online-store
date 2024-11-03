@extends('templates.base')

@section('page.name')

    IEMI | Админка

@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="">
            @foreach ($categories as $category)

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="categories/{{$category->id}}"> {{$category->name}} </a></h5>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</div>


@endsection
