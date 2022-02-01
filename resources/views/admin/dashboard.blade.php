@extends('admin.layout.master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box " style="background-color:#cd7398!important;color:white!important;">
                        <div class="inner">
                            <h3>{{ $books->count()}}</h3>

                            <p>مجموعه کتاب ها</p>
                        </div>
                        <div class="icon">
                            .
                        </div>
                        @php
                            $today =  date('Y-m-d');
                              $start_date = $today.' 00:00:00';
                              $end_date = $today.' 23:59:59';

                        @endphp


                        <a href="" class="small-box-footer"> کتاب های امروز اضافه شده
                            : {{$books->whereBetween('created_at', [$start_date, $end_date])->count()}} </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box " style="background-color:#626bdb!important;color:white!important;">
                        <div class="inner">
                            <h3>{{ $author->count() }}</h3>

                            <p>تمام نویسندها </p>
                        </div>
                        <div class="icon">
                           ..
                        </div>
                        @php
                            $today =  date('Y-m-d');
                              $start_date = $today.' 00:00:00';
                              $end_date = $today.' 23:59:59';

                        @endphp
                        <a href="" class="small-box-footer"> نویسنده های امروز اضافه شده : {{$author->whereBetween('created_at', [$start_date, $end_date])->count()}} </a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box " style="background-color:#8d8a91!important;color:white!important;">
                        <div class="inner">
                            <h3>{{ $category->count() }}</h3>

                            <p>تعداد دسته بندی ها</p>
                        </div>
                        <div class="icon">
                            ....
                        </div>
                        <a href="" class="small-box-footer">..</a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->

                <!-- ./col -->
            </div>
        </div>
    </div>

@endsection
