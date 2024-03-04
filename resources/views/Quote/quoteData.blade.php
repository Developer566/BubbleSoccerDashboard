@extends('layouts.master')

@section('title', 'Quote Request')

@section('loader')

@endsection

@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                        <h3>Quote Requests</h3>
                        <table id="quotedata"
                            class="table table-sm table-bordered table-striped table-hover text-center dt-responsive display w-100">
                            <thead class="bg-lightblue">
                                <td>Id</td>
                                <td>Page Title</td>
                                <td>Ref Number</td>
                                <td>Name</td>
                                <td>Telephone </td>
                                <td>No. of Players</td>
                                <td>Date</td>
                                <td>Day Of Week</td>
                                <td>Location</td>
                                <td>Action</td>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-header -->


                    <!-- /.card-body -->

                </div>

                <!-- /.card -->
                <div class="modal fade" id="viewModal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">View Details</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Page Title:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="page"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Name:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="name"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Telephone:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="tel"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="email"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>No. of Players:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="players"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Date:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="date"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Day of Week:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="week"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Time:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="time"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Age Group:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="age"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Activities:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="activities"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Duration:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="duration"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Location:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="location"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <label>Message:</label>
                                            </div>
                                            <div class="col-9">
                                                <p id="message"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="viewquoteModal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Quote Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('save.sent.quote') }}" id="quoteForm" method="POST">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" id="ref" name="ref">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Reference Number:</label>
                                                </div>
                                                <div class="col-3">
                                                    <p class="mt-2" id="refid"></p><br>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="mt-2">Quote Saved Date/Time:</label>
                                                        </div>
                                                        <div class="col-6 mt-2">
                                                            <p id="created_at">N/A</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Page Title:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="page"
                                                        id="mailsubject" readonly><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Name:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="name"
                                                        id="eventname"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Telephone:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="tel"
                                                        id="tele"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Email:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="email"
                                                        id="useremail"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">No. of Players:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="players"
                                                        id="noofplayers"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Date:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="date"
                                                        id="dates"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Day of Week:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="dayofweek"
                                                        id="dayofweek"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Time:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="time"
                                                        id="times"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Age Group:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="age"
                                                        id="agegroup"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Activities:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="activities"
                                                        id="activity"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Duration:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" name="duration"
                                                        id="durations"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Location:</label>
                                                </div>
                                                <div class="col-9">
                                                    <textarea class="form-control" name="location" id="locations"></textarea>
                                                    {{-- <input type="text" class="form-control" name="location"
                                                        id="locations"> --}}
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Message:</label>
                                                </div>
                                                <div class="col-9">
                                                    <textarea name="message" id="messages" cols="10" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12" style="display: flex;">
                                            <label style="margin-top:17px;">Game Selection:</label>
                                            <div class="form-group col-10 gameselect">
                                                <select class="select2 select2-hidden-accessible" multiple=""
                                                    data-placeholder="Select a Game" style="width: 100%;"
                                                    data-select2-id="7" tabindex="-1" name="gameselection[]"
                                                    aria-hidden="true"style="background-color:blue;" id="gameselection">
                                                    @foreach ($games as $game)
                                                        <option value="{{ $game['id'] }}">{{ $game['game_title'] }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Type of Event:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="eventtype" id="event_type"
                                                        class="form-control"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Total Cost:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="totalcost" class="form-control"
                                                        id="cost"><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Per Person Cost:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="perperson" class="form-control"
                                                        id="personcost"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="remaining">
                                                <div class="customlabel">
                                                    <label>Remaining Balance Options:<span class="text-danger"
                                                            title="Required">*</span></label>
                                                    <select class="form-control customselect" required
                                                        name="remaining_option" id="remaining_option">
                                                        <option value="">Select Remaining Balance Option</option>
                                                        <option value="1">Adults Remaining Balance Before</option>
                                                        <option value="2">Kids Remaining Balance Before</option>
                                                        <option value="3">Adults Remaining Balance on Day</option>
                                                        <option value="4">Kids Remaining Balance on Day</option>
                                                        <option value="5">Full Payment Required Now</option>
                                                    </select><br>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Deposit Fee: [£]</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" name="depositfee" class="form-control"
                                                        id="fee"><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="mt-2">Balance Due Date:</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="date" name="duedate" id="duedate"
                                                        class="form-control"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input type="hidden" name="id" id="id">
                                        <button type="submit" class="btn btn-info">Save</button>
                                </form>
                                <form action="{{ route('send.quote.mail') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qid" id="qid">
                                    <input type="hidden" name="s" id="s">
                                    <button type="submit" id="sendButton" class="btn btn-primary" disabled>Send Quote
                                        Mail</button>
                                </form>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script>
        $(document).on('click', '.send-quote', function(event) {

            event.preventDefault();

            var id = $(this).data('id');
            var sid = $(this).data('sid');

            if (sid) {
                url = '/bubble/get_quote_ref_data/' + sid;
            } else {
                url = '/bubble/get_quote_ref_data/' + id;
            }
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    // console.log(response, sid);
                    // return false;

                    $('#s').val(sid);
                    $('#useremail').val(response[0].email);
                    $('#qid').val(response[0].ref_number);
                    $('#refid').text(response[0].ref_number);
                    $('#ref').val(response[0].ref_number);
                    $('#id').val(response[0].id);
                    $('#mailsubject').val(response[0].mail_subject);
                    $('#eventname').val(response[0].name);
                    $('#tele').val(response[0].telephone);
                    $('#dayofweek').val(response[0].day_of_week);
                    $('#agegroup').val(response[0].age);
                    $('#durations').val(response[0].duration);
                    $('#locations').val(response[0].location);
                    $('#activity').val(response[0].activities);
                    $('#times').val(response[0].time);
                    $('#dates').val(response[0].date);
                    $('#noofplayers').val(response[0].players);

                    if (sid) {
                        var gameSelectionIds = new Set();

                        response.forEach(function(item) {
                            if (item.hasOwnProperty('game_selection') && item.game_selection !==
                                null) {
                                var ids = item.game_selection.split(',');
                                ids.forEach(function(id) {
                                    gameSelectionIds.add(id);
                                });
                            }
                        });
                        $('#gameselection option').each(function() {
                            // Check if the option's value is in the gameSelectionIds set
                            if (gameSelectionIds.has($(this).val())) {
                                // If yes, select the option
                                $(this).prop('selected', true);
                            }
                        });
                        $('#gameselection').select2();
                        var remainingOption = response[0].remaining_option;

                        $('select[name="remaining_option"] option[value="' + remainingOption + '"]')
                            .prop('selected', true);


                        var data = response[0].created_at;
                        var dateAndTime = data.split("T")[0] + " " + data.split("T")[1].split(
                            ".")[0];


                        $('#created_at').text(dateAndTime);
                        // $('#created_at').text(data);
                        $('#cost').val(response[0].total_cost);
                        $('#personcost').val(response[0].per_person_cost);
                        $('#fee').val(response[0].deposit_fee);
                        $('#event_type').val(response[0].event_type);
                        $('#duedate').val(response[0].duedate);
                        $('#messages').val(response[0].message);
                        // $('#useremail').val(response[0]['email']);
                    } else {
                        console.log(response);
                        if (response[1] && response[1][3] && response[1][3]['value'] !== '') {
                            $('#messages').val(response[1][3]['value']);
                        }
                        var email;
                        if (response[1] && response[1][2] && response[1][2]['value']) {
                            email = response[1][2]['value'];
                        } else if (response[0] && response[0].email) {
                            email = response[0].email;
                        }

                        if (email) {
                            $('#useremail').val(email);
                        }
                    }
                    $('#viewquoteModal').modal('show');
                }
            });
        });
        $(document).on('click', '.quote-data', function(event) {
            event.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('get.single.quote.data', ['id' => '__id__']) }}'.replace(
                    '__id__',
                    id),
                type: 'GET',
                success: function(response) {
                    // console.log(response);
                    $('#page').text(response[0].mail_subject);
                    $('#name').text(response[0].name);
                    $('#tel').text(response[0].telephone);
                    $('#week').text(response[0].day_of_week);
                    $('#age').text(response[0].age);
                    $('#duration').text(response[0].duration);
                    $('#location').text(response[0].location);
                    $('#activities').text(response[0].activities);
                    $('#time').text(response[0].time);
                    $('#date').text(response[0].date);
                    $('#players').text(response[0].players);

                    $('#message').text(response[1][3]['value']);
                    $('#email').text(response[1][2]['value']);
                    $('#viewModal').modal('show');
                }
            });
        });

        $(document).ready(function() {

            var table = $('#quotedata').DataTable({

                "serverSide": true,
                "processing": true,

                "ajax": {

                    "url": "{{ route('all.quote.data') }}",

                    "type": "POST",

                    'data': function(data) {

                        data._token = "{{ csrf_token() }}";

                    }

                },

                "columns": [{
                        "data": "id",
                        "name": "id"
                    },
                    {

                        "data": "mail_subject",

                        "name": "mail_subject",


                    },
                    {
                        "data": "ref_number",
                        "name": "ref_number",

                    },
                    {
                        "data": "name",
                        "name": "name"
                    },
                    {

                        "data": "telephone",

                        "name": "telephone"

                    },
                    {

                        "data": "players",

                        "name": "players"

                    },
                    {

                        "data": "date",

                        "name": "date"

                    },
                    {

                        "data": "day_of_week",

                        "name": "day_of_week"

                    },

                    {
                        "data": "location",
                        "name": "location"
                    },
                    {

                        "data": "action",

                        "name": "action",

                        searchable: false,

                        orderable: false,

                    }


                ],

                "columnDefs": [{

                    searchable: true,

                    orderable: true,

                    // targets: [0],

                    // title: "#",

                    render: function(data, type, row, meta) {

                        return meta.row + meta.settings._iDisplayStart + 1;

                    }

                }],


            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#quoteForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        var sendButton = document.getElementById('sendButton');

                        sendButton.disabled = false;

                        var message = "Quote Saved";
                        $("#viewquoteModal .modal-content").append(
                            "<p class='text-right modal-message'>" +
                            message + "</p>");
                        setTimeout(function() {
                            $(".modal-message").remove();
                        }, 5000);
                    },
                    error: function(xhr, status, error) {
                        console.error('There was a problem with the form submission:', error);
                        if (xhr.responseJSON) {
                            console.error('Error message:', xhr.responseJSON.message);
                        } else {
                            console.error('The response is not in JSON format:', xhr
                                .responseText);
                        }
                    }
                });
            });
        });
    </script>
@endsection
