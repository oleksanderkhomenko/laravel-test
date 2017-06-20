@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/category/{{ $category->id }}">Back to Category</a></div>

                <div class="panel-body">
                    Product
                    <table class="table table-hover">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Category</th>
                            <th>Price</th>
                            @foreach($additional as $key => $value)
                                <th>{{ $key }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="{{ $product->image }}" style="width:50px; height:50px;"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $product->price }}</td>
                                @foreach($additional as $key => $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products from same category</div>

                <div class="panel-body">
                    Product
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                        </thead>
                        <tbody>
                            @foreach($same as $key => $value)
                                <tr>
                                    <td><a href="/product/{{ $value->id }}">{{ $value->name }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection