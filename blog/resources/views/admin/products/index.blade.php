@extends('layouts.base-app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th width="100px"><a href="">Add Product</a></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td><a href="{{ route('product.edit', ['id' => $product->product_id]) }}">Edit</a><br> <a href="">Delete</a></td>
                </tr>
                @endforeach
            </table>

            {{ $products->links() }}
        </div>
    </div>
@endsection
