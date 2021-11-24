@extends('admin.layouts.admin');

@section("title")
Show Tag
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4">
                <h4 class="font-weight-bold">Tag {{ $tag->name }}</h4>
            </div>
            <hr>


                <div class="form-row">

                <div class="form-group col-md-3 mr-4 ml-5">
                    <label for="name" class="form-label">Tag Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $tag->name }} " disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" id="date" value="{{ verta($tag->created_at)->format('Y-m-d H:i') }} " disabled>
                </div>

                </div>

                    <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-dark my-4 mr-5">Back</a>

        </div>

    </div>

@endsection
