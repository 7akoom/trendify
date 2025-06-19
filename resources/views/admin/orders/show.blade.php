@extends('admin.layout')
@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0"> الطلب رقم: {{ $order->order_number }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="user_name">العميل</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    value="{{ old('user_name', $order->user->name ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="user_email">{{__('messages.Email')}}</label>
                                <input type="email" class="form-control" id="user_email" name="user_email"
                                    value="{{ old('user_email', $order->user->email ?? '') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="user_phone">{{__('messages.Phone')}}</label>
                                <input type="text" class="form-control" id="user_phone" name="user_phone"
                                    value="{{ old('user_phone', $order->user->phone ?? '') }}">
                            </div>
                        </div>
                    </div>
                        <div class="text-end">
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">رجوع</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
