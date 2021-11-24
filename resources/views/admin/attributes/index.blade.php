@extends('admin.layouts.admin');

@section("title")
Index Attributes
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4 d-flex justify-content-between">
            <h4 class="font-weight-bold">All Attributes ({{ $attributes->total() }})</h4>
            <a class="btn btn-outline-success" href="{{ route('admin.attributes.create')}}">
                <i class="fa fa-plus mt-1"></i>
                Attributes Create
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

                @foreach ($attributes as $key => $attribute)
                <tr>
                    <th> {{ $attributes->firstItem() + $key }}</th>
                    <th>{{ $attribute->name}}</th>

                    <th>
                        <a class="btn btn-outline-success btn-sm" href="{{ route('admin.attributes.show' , ['attribute' => $attribute->id] ) }}">Show</a>
                        <a class="btn btn-outline-warning btn-sm mr-3" href="{{ route('admin.attributes.edit' , ['attribute' => $attribute->id] ) }}">edit</a>
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

@endsection
