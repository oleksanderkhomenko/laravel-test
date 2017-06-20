@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/categories/new">Create Category</a></div>

                <div class="panel-body">
                    Categories
                    <table class="table table-hover tablesorter">
                        <thead>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                 <tr>
                                    <td><a href="/products/{{ $category->id }}">{{ $category->name }}</a></td>
                                    <td>{{ $category->created_at }}</td>
                                    <td><a href="/category/edit/{{ $category->id }}">Edit</a></td>
                                    <td>
                                        <form class="delete-form" role="form" method="POST" action="">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <button class="btn btn-warning button-delete-category" type="button">Delete</button>
                                        </form>
                                    </td>
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
</div>
@endsection