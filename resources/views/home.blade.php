@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $quoterequest }}</h3>

                                <p>Total Quote Requests</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $multiactivity }}</h3>

                                <p>Multi-activity Quote Requests</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $singleactivity }}</h3>

                                <p>Single-activity Quote Requests</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $contactcount }}</h3>

                                <p>Contact Form Submissions</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $multisentquote }}</h3>

                                <p>Multi-activity Quotes Sent</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $singlesentquote }}</h3>

                                <p>Single-activity Quotes Sent</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-outline card-primary">
                                <h3 class="card-title">Single Activity Games</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="overflow-y: scroll; height:550px;">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Game Title</th>

                                            <th style="width: 40px">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item['title'] }}</td>
                                                <td>{{ $item['count'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header card-outline card-primary">
                                <h3 class="card-title">Multi Activity Games</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="overflow-y: scroll; height:550px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Game Title</th>

                                            <th style="width: 40px">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($countByCombination) --}}
                                        @foreach ($countByCombination as $index => $count)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $count['activities'][0] }}</td>
                                                <td><span>{{ $count['count'] }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>

    </div>
@endsection
