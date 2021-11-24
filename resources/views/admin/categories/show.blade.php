@extends('admin.layouts.admin');

@section("title")
Show Categories
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4">
                <h4 class="font-weight-bold">Category {{ $category->name }}</h4>
            </div>
            <hr>


                <div class="form-row">

                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $category->name }} " disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Slug Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $category->slug }} " disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Parent</label>

                    @if ($category->parent_id == 0)
                            <input type="text" class="form-control" id="name" value="{{ $category->name }} " disabled>
                        @else
                        <input type="text" class="form-control" id="name" value="{{ $category->parent->name }} " disabled>
                        @endif
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active" class="form-label">Status</label>
                    <input type="text" class="form-control" id="is_active" value="{{ $category->is_active }} " disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="name" class="form-label">Category Icon</label>
                    <input type="text" class="form-control" id="name" value="{{ $category->icon }} " disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" class="form-control" id="date" value="{{ verta($category->created_at)->format('Y-m-d H:i') }} " disabled>
                </div>

                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" disabled>{{ $category->description }}</textarea>
                </div>

                <div class="col-md-12">
                    <hr>
                    <div class="row">
                        <div class=" col-md-3">
                            <label>Attributes</label>
                            <div class="form-controll">

                                <input type="text" class="form-control" id="name"
                                value="@foreach ($category->attributes as $attribute) {{ $attribute->name }}{{ $loop->last ? '' : '،' }} @endforeach" disabled>

                            </div>
                        </div>

                        <div class=" col-md-3">
                            <label>Filterable Attributes</label>
                            <div class="form-controll">

                                <input type="text" class="form-control" id="name"
                                value="@foreach ($category->attributes()->wherePivot("is_filter" , 1)->get() as $attribute) {{ $attribute->name }}{{ $loop->last ? '' : '،' }} @endforeach" disabled>

                            </div>
                        </div>

                        <div class=" col-md-3">
                            <label>Variant Attribute</label>
                            <div class="form-controll">

                                <input type="text" class="form-control" id="name"
                                value="@foreach ($category->attributes()->wherePivot("is_variation" , 1)->get() as $attribute) {{ $attribute->name }} @endforeach" disabled>

                            </div>
                        </div>

                    </div>
                </div>






                </div>

                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark my-4 mr-5">Back</a>

        </div>

    </div>

@endsection
