@extends('admin.layouts.admin');

@section("title")
Index Tags
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4 d-flex justify-content-between">
            <h4 class="font-weight-bold">All Tags ({{ $tags->total() }})</h4>
            <a class="btn btn-outline-success" href="{{ route('admin.tags.create')}}">
                <i class="fa fa-plus mt-1"></i>
                Tag Create
            </a>
        </div>
        <hr>

        <table class="table table-bordered table-dark table-hover table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Operator</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($tags as $key => $tag)
                <tr>
                    <th> {{ $tags->firstItem() + $key }}</th>
                    <th>{{ $tag->name}}</th>

                    <th>
                        <a class="btn btn-outline-success btn-sm" href="{{ route('admin.tags.show' , ['tag' => $tag->id] ) }}">Show</a>
                        <a class="btn btn-outline-warning btn-sm mr-3" href="{{ route('admin.tags.edit' , ['tag' => $tag->id] ) }}">edit</a>
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

@endsection
