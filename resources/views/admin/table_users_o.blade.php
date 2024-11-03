@extends('templates.base')

@section('page.name')

    IEMI | Админка

@endsection


@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="">


            <div class="row">
                <div class="col-sm-3">
                  <div class="card">
                    <div class="card-body">

                      <p class="card-text">Email</p>

                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <div class="card-body">

                      <p class="card-text">Имя</p>

                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">

                        <p class="card-text">Фамилия</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">

                        <p class="card-text">Имя на сайте</p>

                      </div>
                    </div>
                  </div>
            </div>

            <br><br>
            @foreach ($users as $user)
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">

                        <p class="card-text">{{$user->email}}</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">

                        <p class="card-text">{{$user->first_name}}</p>

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">

                          <p class="card-text">{{$user->last_name}}</p>

                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">

                          <p class="card-text">{{$user->name}}</p>

                        </div>
                      </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection

