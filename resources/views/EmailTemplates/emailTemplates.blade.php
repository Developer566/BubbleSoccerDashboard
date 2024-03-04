@extends('layouts.master')

@section('title', 'Email Tmplates')

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
                        <h3>Email Templates</h3>

                    </div>

                    <!-- /.card-header -->

                    <!-- /.card-body -->
                    <div class="card-body">
                        <table id="emailtemplatestable"
                            class="table table-sm table-bordered table-striped table-hover text-center dt-responsive display w-100">
                            <thead class="bg-lightblue">
                                <td>Purpose </td>
                                <td>Mail Subject</td>
                                <td>Status</td>
                                <td>Action</td>

                            </thead>
                            <tbody>

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
            var table = $('#emailtemplatestable').DataTable({
                "serverSide": true,
                "processing": true,

                "ajax": {

                    "url": "{{ route('email.show.templates') }}",

                    "type": "POST",

                    'data': function(data) {

                        data._token = "{{ csrf_token() }}";

                    }

                },

                "columns": [

                    {

                        "data": "purpose",

                        "name": "purpose"

                    },

                    {

                        "data": "mail_subject",

                        "name": "mail_subject"

                    },
                    {
                        "data": "is_active",
                        "name": "is_active"
                    },

                    {

                        "data": "action",

                        "name": "action",

                        searchable: false,

                        orderable: false,

                    }

                ],

                "columnDefs": [{

                    searchable: false,

                    orderable: false,

                    // targets: [0],

                    // title: "#",

                    render: function(data, type, row, meta) {

                        return meta.row + meta.settings._iDisplayStart + 1;

                    }

                }]

            })
        })
    </script>
@endsection
