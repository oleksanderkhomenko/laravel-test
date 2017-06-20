@extends('welcome')

@section('content')
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".tablesorter").tablesorter({headers : { 0 : { sorter: false }, 2 : { sorter: false }, 3 : { sorter: false } }});
    }
);
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/">Back to main</a></div>

                <div class="panel-body">
                    Products
                    <table class="table table-hover tablesorter">
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Category</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                 <tr>
                                    <td><img src="{{ $product->image }}" style="width:50px; height:50px;"></td>
                                    <td><a href="/product/{{ $product->id }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $product->price }}</td>
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