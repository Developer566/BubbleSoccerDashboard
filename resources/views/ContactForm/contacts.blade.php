@extends('layouts.master')

@section('title', 'Contact Form Data')

@section('loader')

@endsection

@section('style')


@endsection

@section('content')
    @php
        $title = 'Bubble Soccer World';

    @endphp


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <section class="content p-3">

                <div class="card mx-2 shadow">

                    <div class="card-header card-outline card-primary rounded">
                        <h3>Contact Form Data</h3>

                    </div>

                    <!-- /.card-header -->

                    <!-- /.card-body -->
                    <div class="card-body">
                        <table id="contactformtable"
                            class="table table-sm table-bordered table-striped table-hover text-center dt-responsive display w-100">
                            <thead class="bg-lightblue">
                                <td>Full Name</td>
                                <td>Email</td>
                                <td>Contact Number</td>
                                <td>Message</td>

                            </thead>
                            <tbody>

                                @foreach ($data as $value)
                                    <tr>
                                        <td>{{ $value['full_name'] }}</td>
                                        <td>{{ $value['email'] }}</td>
                                        <td>{{ $value['contact_number'] }}</td>
                                        <td>{{ $value['message'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.card -->

            </section>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#contactformtable').DataTable({

            })
        });
    </script>
@endsection
