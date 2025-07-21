@extends('app')
@section('content')

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>{{__('messages.Product')}}</th>
                                <th>{{__('messages.Quantity')}}</th>
                                <th>{{__('messages.Total')}}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $item)
                            <tr data-id="{{ $item->id }}" data-unit-price="{{ $item->product->is_featured ? $item->product->price->discount_price : $item->product->price->sale_price }}">
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="{{ asset("storage/".$item->featuredImage?->path) }}"
                                        style="width:150px; heigh:150px;"    
                                        alt="Product Image">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$item->product->name}}</h6>
                                        @if ($item->product->is_featured)
                                        <h5>{{$item->product->price->discount_price}}</h5>
                                        @else
                                        <h5>{{$item->product->price->sale_price}}</h5>
                                        @endif
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input class="qty" data-id="{{$item->id}}" type="text" value="{{$item->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">
                                    {{ $item->qty * ($item->product->is_featured ? $item->product->price->discount_price : $item->product->price->sale_price) }}
                                </td>                                
                                <td class="cart__close">
                                    <a href="javascript:void(0)" class="remove-item" data-id="{{$item->id}}">
                                        <i class="fa fa-close"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="{{ route('shop') }}"> {{__('messages.Continue Shopping')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__total">
                    <h6>{{__('messages.Total')}}</h6>
                    <ul>
                        <li>{{__('messages.SubTotal')}}  <span id="cart-page-subtotal">{{$cartSubTotal}}</span></li>
                        <li>{{__('messages.shipping_costs')}}  <span id="cart-page-subtotal">{{$shippingCosts}}</span></li>
                        <li>{{__('messages.FinalTotal')}}  <span id="cart-page-total">{{$cartTotal}}</span></li>
                    </ul>
                    <a href="{{ route('checkout') }}" class="primary-btn">{{__('messages.Checkout')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection

