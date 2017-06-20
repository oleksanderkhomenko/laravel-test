@extends('welcome')

@section('content')
<div class="container">
    <a href="/">Main</a>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Products
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Created</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                 <tr>
                                    <td><a href="/product/{{ $product->id }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->created_at }}</td>
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