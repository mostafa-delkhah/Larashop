@extends('admin.layouts.admin');

@section("title")
Index Categories
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4 d-flex justify-content-between">
            <h4 class="font-weight-bold">All Categories ({{ $categories->total() }})</h4>
            <a class="btn btn-outline-success" href="{{ route('admin.categories.create')}}">
                <i class="fa fa-plus mt-1"></i>
                Categories Create
            </a>
        </div>
        <hr>

        <table class="table table-bordered table-dark table-hover table-striped text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Operator</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($categories as $key => $category)
                <tr>
                    <th> {{ $categories->firstItem() + $key }}</th>
                    <th>
                        @if ($category->parent_id == 0)
                        <span class="text-success">{{ $category->name}}</span>
                    @else
                        {{ $category->name}}
                    @endif                    </th>
                    <th>{{ $category->slug}}</th>
                    <th>
                        @if ($category->parent_id == 0)
                            {{ $category->name}}
                        @else
                            {{ $category->parent->name}}
                        @endif
                    </th>
                    <th>
                        <span class="{{ $category->getRawOriginal("is_active") ? "text-success" : "text-danger" }}">
                            {{ $category->is_active}}
                        </span>
                    </th>

                    <th>
                        <a class="btn btn-outline-success btn-sm" href="{{ route('admin.categories.show' , ['category' => $category->id] ) }}">Show</a>
                        <a class="btn btn-outline-warning btn-sm mr-3" href="{{ route('admin.categories.edit' , ['category' => $category->id] ) }}">edit</a>
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

@endsection
