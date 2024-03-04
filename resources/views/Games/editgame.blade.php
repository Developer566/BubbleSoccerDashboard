@extends('layouts.master')

@section('title', 'Games List')

@section('loader')

@endsection

@section('style')

    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css') }}">
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
                        <h3>Games Section</h3>

                    </div>

                    <!-- /.card-header -->

                    <!-- /.card-body -->
                    <div class="card-body">
                        <form action="{{ route('game.update') }}" method="post" class="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                            <div class="row">
                                <div class="col">
                                    <label>Game Title:<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="game_title"
                                        value="{{ $data['game_title'] }}" placeholder="Game Title">
                                    @error('game_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div><br>
                            <div class="col">
                                <label>Event Description:<span class="text-danger">*</span></label>
                                <textarea name="content" id="htmlEditor" class="form-control">{{ $data['event_description'] }}</textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label>What's Included:<span class="text-danger">*</span></label>
                                <textarea name="content1" id="htmlEditor1" class="form-control">{{ $data['whats_included'] }}</textarea>
                                @error('content1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label>Additional Info:<span class="text-danger">*</span></label>
                                <textarea name="content2" id="htmlEditor2" class="form-control">{{ $data['additional_info'] }}</textarea>
                                @error('content2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.card -->

            </section>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#htmlEditor').summernote();
            $('#htmlEditor1').summernote();
            $('#htmlEditor2').summernote();
        });
    </script>
@endsection
