@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $product->description }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                            </div>
                        </div>

                        <div class="form-group image-url">
                            <label for="image" class="col-md-4 control-label">Image URL</label>

                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control" name="image" value="{{ $product->image }}" required>
                            </div>
                        </div>

                        @foreach($additional as $key => $value)
	                        <div class="form-group additional-properties">
	                            <label for="additional" class="col-md-4 control-label">Additional Properties <span style="cursor: pointer;" onclick="removeAdditionalField(this);">X</span></label>

	                            <div class="col-md-3">
	                                name
	                                <input type="text" class="form-control" name="additional_name[]" value="{{ $key }}">
	                            </div>
	                            <div class="col-md-3">
	                                description
	                                <input type="text" class="form-control" name="additional_description[]" value="{{ $value }}">
	                            </div>
	                        </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-5">
                                <button class="btn btn-info" type="button" onclick="addAdditionalFields();">Add Field</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection