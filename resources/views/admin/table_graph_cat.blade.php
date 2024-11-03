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
                            <h5 class="card-title">График продуктов по категориям:</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div>
                @for ($k = 0; $k <= $str; $k++)
                    ||
                @endfor
                {{$m}} <- max
            </div>
            <p hidden>{{$s = -1}}</p>
            @for ($k = 0; $k <= $col; $k++)
                @if($k % 2 == 0)

                    ||
                    <br>
                    <p hidden>{{$s++}}</p>

                @else

                    @for ($f = 0; $f <= ($str_for * ($prod[$s] / $m)); $f++)
                    ||
                    @endfor
                    {{$prod[$s]}} <- {{$names[$s]}}
                    <br>

                @endif
            @endfor

        </div>
    </div>
</div>


@endsection
