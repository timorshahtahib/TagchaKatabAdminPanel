@extends('admin.layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Asia Telecom
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box "style="background-color:#cd7398!important;color:white!important;" >
                        <div class="inner">
                            <h3>{{ $books }}</h3>

                            <p>All Bord Money</p>
                        </div>
                        <div class="icon">
                            ؋
                        </div>
                        <a href="" class="small-box-footer">Today Bord Money : {{$books}}</i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box " style="background-color:#626bdb!important;color:white!important;">
                        <div class="inner">
                            <h3>{{ $author }}</h3>

                            <p>All Rasid Money</p>
                        </div>
                        <div class="icon">
                            ؋
                        </div>
                        <a href="" class="small-box-footer">Today Rasid Money : {{$books}}</i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box " style="background-color:#8d8a91!important;color:white!important;">
                        <div class="inner">
                            <h3>{{ $category }}</h3>

                            <p>Payment Balance</p>
                        </div>
                        <div class="icon">
                            ؋
                        </div>
                        <a href="" class="small-box-footer">..</a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->

                <!-- ./col -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
