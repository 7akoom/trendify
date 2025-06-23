@extends('app')
@section('content')

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d360773.24090909754!2d55.55716500596229!3d25.076280444425517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2z2K_YqNmKIC0g2KfZhNil2YXYp9ix2KfYqiDYp9mE2LnYsdio2YrYqSDYp9mE2YXYqtit2K_YqQ!5e1!3m2!1sar!2siq!4v1750691732357!5m2!1sar!2siq" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span>{{__('contact.Info')}}</span>
                        <h2>{{__('contact.Contact')}}</h2>
                        <p>{{__('contact.P')}}</p>
                    </div>
                    <ul>
                        <li>
                            <h4>{{__('contact.Address')}}</h4>
                            {{-- <p>195 E Parker Square Dr, Parker, CO 801 <br />+43 982-314-0958</p> --}}
                            <p>info@trendify.com</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="{{ __('contact.Name') }}" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="phone" placeholder="{{ __('contact.Phone') }}" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="email" name="email" placeholder="{{ __('contact.Email') }}" required>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="{{ __('contact.Message') }}" required></textarea>
                                <button type="submit" class="site-btn">{{ __('contact.Send') }}</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection