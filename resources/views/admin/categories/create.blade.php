@extends('admin.layouts.admin')

@section('title')
    Create Category
@endsection

@section('script')
    <script>
        $('#attributeSelect').selectpicker({
            'title': 'انتخاب ویژگی'
        });

        $('#attributeSelect').on('changed.bs.select', function() {
            let attributesSelected = $(this).val();
            let attributes = @json($attributes);

            let attributeForFilter = [];

            attributes.map((attribute) => {
                $.each(attributesSelected , function(i,element){
                    if( attribute.id == element ){
                        attributeForFilter.push(attribute);
                    }
                });
            });

            $("#attributeIsFilterSelect").find("option").remove();
            $("#variationSelect").find("option").remove();
            attributeForFilter.forEach((element)=>{
                let attributeFilterOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                let variationOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                $("#attributeIsFilterSelect").append(attributeFilterOption);
                $("#attributeIsFilterSelect").selectpicker('refresh');

                $("#variationSelect").append(variationOption);
                $("#variationSelect").selectpicker('refresh');
            });


        });

        $("#attributeIsFilterSelect").selectpicker({
            'title': 'انتخاب ویژگی'
        });

        $("#variationSelect").selectpicker({
            'title': 'انتخاب ویژگی'
        });

    </script>
@endsection

@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
            <div class="mb-4">
                <h4 class="font-weight-bold">Create Category</h4>
            </div>
            <hr>

            @include('admin.sections.errors')

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ old("name") }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="slug">Slug</label>
                        <input class="form-control" id="slug" name="slug" type="text" value="{{ old("slug") }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="parent_id">Parent</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="0">none</option>
                            @foreach ($parent_category as $parentCat)
                                <option value="{{ $parentCat->id }}">{{ $parentCat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="is_active">Status</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="attribute_ids">Attributes</label>
                        <select id="attributeSelect" name="attribute_ids[]" class="form-control" multiple
                            data-live-search="true">
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="attribute_is_filter_ids">Filterable Attributes</label>
                        <select id="attributeIsFilterSelect" name="attribute_is_filter_ids[]" class="form-control" multiple
                            data-live-search="true">
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="attribute_is_filter_ids">Variant Attribute</label>
                        <select id="variationSelect" name="variation_id" class="form-control" data-live-search="true">
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="icon">Icon</label>
                        <input class="form-control" id="icon" name="icon" type="text" value="{{ old("icon") }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">description</label>
                        <textarea class="form-control" id="description" name="description">{{ old("description") }}</textarea>
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">Save</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-dark mt-5 mr-3">Back</a>
            </form>
        </div>

    </div>

@endsection
