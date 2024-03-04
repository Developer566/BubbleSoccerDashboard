@extends('layouts.master')

@section('title', 'Games List')

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
                        <h3>Games List</h3>
                        <a href="{{ route('games.add') }}" class="btn btn-info">Add New Game</a>
                    </div>

                    <!-- /.card-header -->

                    <!-- /.card-body -->
                    <div class="card-body" style="overflow-y:scroll;">
                        <table id="gamestable"
                            class="table table-sm table-bordered table-striped table-hover text-center dt-responsive display w-100">
                            <thead class="bg-lightblue">
                                <td>Game Name</td>
                                <td>Event Description</td>
                                <td>What's Included</td>
                                <td>Additional Info</td>
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
            var table = $('#gamestable').DataTable({
                "serverSide": true,
                "processing": true,

                "ajax": {

                    "url": "{{ route('games.show.data') }}",

                    "type": "POST",

                    'data': function(data) {

                        data._token = "{{ csrf_token() }}";

                    }

                },

                "columns": [

                    {

                        "data": "game_title",

                        "name": "game_title"

                    },

                    {

                        "data": "event_description",

                        "name": "event_description"

                    },
                    {
                        "data": "whats_included",
                        "name": "whats_included"
                    },
                    {
                        "data": "additional_info",
                        "name": "additional_info"
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
