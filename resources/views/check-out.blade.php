@extends('app')
@section('content')

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('checkout')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name</p>
                                    <input name="addr[billing][first_name]" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name</p>
                                    <input name="addr[billing][last_name]" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address</p>
                            <input name="addr[billing][street_address]" type="text" placeholder="Street Address" class="checkout__input__add">
                            <input name="addr[billing][city]" type="text" placeholder="City">
                            <input name="addr[billing][state]" type="text" placeholder="State">
                            <input name="addr[billing][country]" type="text" placeholder="Country">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP</p>
                            <input name="addr[billing][postal_code]" type="text">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone</p>
                                    <input name="addr[billing][phone]" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email</p>
                                    <input name="addr[billing][email]" type="email">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @foreach ($cart as $item)
                                        <li>{{ sprintf('%02d', $loop->iteration) }}. {{$item->product->name}}
                                            <span>
                                                @if ($item->product->is_featured)
                                                    <h5>{{$item->product->price->discount_price}}</h5>
                                                    <input name="sale_price" type="hidden" value="{{$item->product->price->discount_price}}">
                                                @else
                                                    <h5>{{$item->product->price->sale_price}}</h5>
                                                    <input name="sale_price" type="hidden" value="{{$item->product->price->sale_price}}">
                                                @endif
                                            </span>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Total <span>{{$total}}</span></li>
                                    <input name="total" type="hidden" value="{{$total}}">
                                </ul>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    <div class="col-lg-8 col-md-6">
                        <hr>
                        <br>
                        <br>
                        <h6 class="checkout__title">Shipping Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>First Name</p>
                                    <input name="addr[shipping][first_name]" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name</p>
                                    <input name="addr[shipping][last_name]" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address</p>
                            <input name="addr[shipping][street_address]" type="text" placeholder="Street Address" class="checkout__input__add">
                            <input name="addr[shipping][city]" type="text" placeholder="City">
                            <input name="addr[shipping][state]" type="text" placeholder="State">
                            <input name="addr[shipping][country]" type="text" placeholder="Country">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP</p>
                            <input name="addr[shipping][postal_code]" type="text">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone</p>
                                    <input name="addr[shipping][phone]" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email</p>
                                    <input name="addr[shipping][email]" type="email">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes  <span class="checkout__input__checkbox text-secondary">(Note about your order, e.g, special noe for delivery)</span></p>
                            <input name="notes" type="text"
                            placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection