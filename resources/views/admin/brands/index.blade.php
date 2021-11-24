@extends('admin.layouts.admin');

@section("title")
Index Brand
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4 d-flex justify-content-between">
            <h4 class="font-weight-bold">All Brands ({{ $brands->total() }})</h4>
            <a class="btn btn-outline-success" href="{{ route('admin.brands.create')}}">
                <i class="fa fa-plus mt-1"></i>
                Brand Create
            </a>
        </div>
        <hr>

        <table class="table table-bordered table-dark table-hover table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Operator</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($brands as $key => $brand)
                <tr>
                    <th> {{ $brands->firstItem() + $key }}</th>
                    <th>{{ $brand->name}}</th>
                    <th>
                        <span class="{{ $brand->getRawOriginal("is_active") ? "text-success" : "text-danger" }}">
                            {{ $brand->is_active}}
                        </span>
                    </th>
                    <th>
                        <a class="btn btn-outline-success btn-sm" href="{{ route('admin.brands.show' , ['brand' => $brand->id] ) }}">Show</a>
                        <a class="btn btn-outline-warning btn-sm mr-3" href="{{ route('admin.brands.edit' , ['brand' => $brand->id] ) }}">edit</a>
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

@endsection
