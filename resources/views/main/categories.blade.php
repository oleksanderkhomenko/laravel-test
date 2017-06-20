@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}
                        Search for product :
                        <input type="text" name="search" placeholder="enter product name">
                        <button class="btn" type="submit">Seach</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Categories
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Created</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                 <tr>
                                    <td><a href="/category/{{ $category->id }}">{{ $category->name }}</a></td>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(sizeof($categories) > 0 && $categories->previousPageUrl())
                        <a href="{{ $categories->previousPageUrl() }}">Previous Page <</a>
                    @endif
                    @if(sizeof($categories) > 0 && $categories->nextPageUrl())
                        <a href="{{ $categories->nextPageUrl() }}">> Next Page</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Popular Products</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                 <tr>
                                    <td><a href="/product/{{ $product->id }}">{{ $product->name }}</a></td>
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