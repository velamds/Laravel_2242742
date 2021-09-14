@extends('layout')
@section('title','Productos')
@section('encabezado','Lista de Productos')
@section('content')
    <a href="{{ route('product.form')}}" class="btn btn-primary">Nuevo Producto</a>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Brand</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lista as $product)
                <tr>
                    <td>{{ $product->name}}</td>
                    <td>{{ $product->cost}}</td>
                    <td>{{ $product->price}}</td>
                    <td>{{ $product->quantity}}</td>
                    <td>{{ $product->brand->name}}</td>
                    <td>
                        <a href="{{ route('product.form',['id'=>$product->id])}}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('prodDelete',['id' => $product->id]) }}" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection