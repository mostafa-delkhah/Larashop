@extends('admin.layouts.admin');

@section("title")
Edit Brand
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 bg-white">
            <div class="m-4">
                <h4 class="font-weight-bold">Edit {{ $brand->name }}</h4>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form action="{{ route('admin.brands.update' , ['brand' => $brand->id]) }}" method="post">
                @csrf
                @method("patch")

                <div class="form-row">

                <div class="form-group col-md-3 mr-4 ml-5">
                    <label for="name" class="form-label">Brand Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
                  </div>

                  <div class="form-group col-md-3">
                      <label for="is_active" class="form-label">Status</label>
                      <select type="text" class="form-control" id="is_active" name="is_active">
                          <option value="1" {{ $brand->getRawOriginal("is_active") ? "selected" : "" }}>Active</option>
                          <option value="0" {{ $brand->getRawOriginal("is_active") ? "selected" : "" }}>Inactive</option>
                      </select>
                    </div>

                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-success mt-4">Edit</button>
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-dark mt-4 mr-5">Back</a>
                </div>
              </form>
        </div>

    </div>

@endsection
