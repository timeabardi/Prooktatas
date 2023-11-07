@extends('layout.app')

@section('content')
<div class="row"> 
    <div class="col-12">
        <div class="content-wapper">
            <section class="section-products">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="header">
                                <h2>Kívánságlista</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        @if($wishlist_products->count())
                        @foreach($wishlist_products as $wishlist_product)
                        <div class="row">
                            <div class="col-12">
                                <div class="wishlist-product-wrapper">
                                    <div class="row mb-2">
                                        <div class="col-12 col-lg-3 mb-2">
                                            <div class="wishlist-product-image">
                                             
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start mb-2 mb-lg-0">
                                            <div class="wishlist-product-details">
                                                <h3 class="wishlist-product-name">{{ $wishlist_product->product->name }}</h3>
                                                <div class="wishlist-product-price">{{ $wishlist_product->unit_price }} Ft</div>
                                               
                                               
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-row justify-content-center align-items-center mb-2 mb-lg-0">
                                            <button class="add-product-to-cart" data-product-id="{{$wishlist_product->product_id}}">Hozzáadás a kosárhoz</button>
                                        </div>
                                        <div class="col-12 col-lg-1 d-flex flex-row justify-content-center align-items-center mb-2 mb-lg-0">
                                            <div class="wishlist-product-actions">
                                                <a href="javascript:;" class="remove-product-from-wishlist" data-product-id="{{ $wishlist_product->product_id }}">
                                                    <i class="fas fa-trash-alt" data-product-id="{{ $wishlist_product->product_id }}"></i>
                                                </a>
                                            </div>
                                        </div>                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        @else
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    A kívánságlista üres
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
         function addProductToCart(productId, quantity)
        {
            const request1 =  window.axios.post('{{route('cart.add')}}', {
                product_id: productId,
                quantity: quantity
            });
            const request2 =  window.axios.delete('{{route('wishlist.remove', [$wishlist_product->wishlist_id])}}');
            Promise.all([request1, request2])
            .then((responses) => {
                if(
                    (typeof responses[0].data.status !== 'undefined' && response.data.status) &&
                    (typeof responses[0].data.message !== 'undefined' && response.data.message) &&
                    (typeof responses[1].data.status !== 'undefined' && response.data.status) &&
                    (typeof responses[1].data.message !== 'undefined' && response.data.message)
                ){
                    window.swal.fire({
                        position: 'top-end',
                        icon: response.data.status,
                        title: response.data.message,
                        showConfirmButton: false,
                        toast: true,
                        timer: 2500
                    });
                }else{
                    window.swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Hiba történt',
                        showConfirmButton: false,
                        toast: true,
                        timer: 2500
                    });
                }
                window.refreshCartCount();
            }).catch((error) => {
                window.swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Hiba történt',
                    showConfirmButton: false,
                    toast: true,
                    timer: 2500
                });
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const addToCartButtons = document.querySelectorAll('.add-product-to-cart');
            addToCartButtons.forEach((button) => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    addProductToCart(event.target.dataset.productId, 1);
                });
            });
        });
    </script>
@endpush

@push('style')
    <style>
    </style>
@endpush