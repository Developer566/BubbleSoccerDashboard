@extends('layouts.master')

@section('title', 'Email Tmplates')

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
                        <h3>Email Templates</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('email.save.templates') }}" method="post">
                            @csrf <!-- Add CSRF token -->

                            <div class="form-group">
                                <label>Purpose Title <span class="text-danger">*</span></label>
                                <input type="text" name="purpose" id="purpose" class="form-control">
                                @error('purpose')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email_title">Email Subject <span class="text-danger">*</span></label>
                                <input type="text" name="email_title" class="form-control" id="email_title"
                                    placeholder="Enter Email Subject">
                                @error('email_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="htmlEditor" class="col-form-label text-l">Email Body <span
                                        class="text-danger">*</span></label>
                                <br>
                                <textarea name="content" id="htmlEditor" class="form-control"></textarea>
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-form-label text-l">Status <span
                                        class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status" id="status"
                                        value="1">
                                    <label class="form-check-label" for="status">
                                        Active
                                    </label>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.card-header -->


                <!-- /.card-body -->

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
        });
    </script>
@endsection
