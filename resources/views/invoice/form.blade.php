@extends('layout')
@section('title', 'Nueva Factura')
@section('encabezado', 'Nueva Factura')

@section('content')

<form action="" method="post" id="invoiceForm">
    @csrf
    <div class="row">
        <div class="col-sm-3"><b>Producto</b></div>
        <div class="col-sm-3"><b>Cantidad</b></div>
        <div class="col-sm-3"><b>Precio</b></div>
        <div class="col-sm-3"><b>Total Producto</b></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <select name="product[]" id="product1" class="form-select product" data-row='1'>
                <option value="">Seleccione un producto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" id="quantity1">
        </div>
        <div class="col-sm-3 col-price">
            <input type="number" name="price[]" class="form-control price" id="price1">
        </div>
        <div class="col-sm-3">
            <input type="text" readonly class="form-control-plaintext totalProduct" id="totalProduct1">
        </div>

    </div>


</form>

<button type="button" class="btn btn-primary" id="add">Añadir</button>

@endsection

@section('scripts')
<script>
    const products = @json($products); //json_encode , json_decode
    let productList = document.querySelector('.product')
    let priceElement = document.querySelector('.price')
    const quantityElement = document.querySelector('.quantity')
    var contador = 1

    function init(){
        contador = 1
        arrProductList = document.querySelectorAll('.product')

        arrProductList.forEach(productList => {
            priceElement = document.querySelector('#price'+contador)
            console.log(priceElement)
            productList.addEventListener('change', (event) => {
                productId = event.target.value
                productSelected = products.filter( product => product.id == productId)
                console.log(productSelected[0].price)
                priceElement.value = productSelected[0].price
                //totalProduct()
            })
            contador++
        });
    }
    init()
    
    function totalProduct(){
        totalElement = document.querySelector('.totalProduct')
        totalElement.value = priceElement.value * quantityElement.value
    }

    priceElement.addEventListener('input', (event) => {
        totalProduct()
    })

    quantityElement.addEventListener('input', (event) => {
        totalProduct()
    })

    const addButton = document.querySelector('#add')
    addButton.addEventListener('click', (event) => {
        fila = document.createElement('div')
        fila.className =  'row'

        fila.innerHTML = `
                    <div class="col-sm-3">
                        <select name="product[]" id="product${contador}" class="form-select product">
                            <option value="">Seleccione un producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" name="quantity[]" class="form-control quantity" min="1" value="1" id="quantity${contador}">
                    </div>
                    <div class="col-sm-3 col-price">
                        <input type="number" name="price[]" class="form-control price" id="price${contador}">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" readonly class="form-control-plaintext totalProduct" id="totalProduct${contador}">
                    </div>`;
        form = document.querySelector('#invoiceForm')
        form.appendChild(fila)
        init()
    })    


</script>
@endsection