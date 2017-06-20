@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/categories">Back to categories</a> | <a href="/products/new/{{ $category->id }}">Create Product</a></div>

                <div class="panel-body">
                    Products
                    <table class="table table-hover">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                 <tr>
                                    <td><img src="{{ $product->image }}" style="width:50px; height:50px;"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><a href="/product/edit/{{ $product->id }}">Edit</a></td>
                                    <td>
                                        <form class="delete-form" role="form" method="POST" action="">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button class="btn btn-warning button-delete-product" type="button">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(sizeof($products) > 0 && $products->previousPageUrl())
                        <a href="{{ $products->previousPageUrl() }}">Previous Page <</a>
                    @endif
                    @if(sizeof($products) > 0 && $products->nextPageUrl())
                        <a href="{{ $products->nextPageUrl() }}">> Next Page</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection