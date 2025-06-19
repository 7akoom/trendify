@extends('admin.layout')
@section('content')

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0 ms-6">عدد الطلبيات: {{ $orders->count() }}</h5>
    </div>

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>قائمة الطلبيات</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                        رقم الطلبية
                      </th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        اسم الزبون
                      </th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        الحالة
                      </th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        حالة الدفع
                      </th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                         الإجمالي
                      </th>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                         تاريخ الإنشاء
                      </th>
                      <th class="text-secondary text-center opacity-7">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $ord)
                        <tr id="row-{{ $ord->id }}">
                            <td class="align-middle text-center">{{ $ord->order_number }}</td>
                            <td class="align-middle text-center">{{ $ord->user->name }}</td>
                            <td class="align-middle text-center">{{ $ord->status }}</td>
                            <td class="align-middle text-center">{{ $ord->payment_status }}</td>
                            <td class="align-middle text-center">{{ $ord->total }}</td>
                            <td class="align-middle text-center">{{ $ord->created_at->format('Y-m-d') }}</td>
                            <td class="align-middle text-center">
                               
                              <a href="{{ route('admin.orders.show', $ord->id) }}">
                                تفاصيل
                              </a>

                              <a href="{{ route('admin.orders.edit', $ord->id) }}">
                                    تعديل
                              </a>

                              <a href="#"
                                  class="delete-btn text-danger font-weight-bold m-3"
                                  data-id="{{ $ord->id }}">
                                  حذف
                              </a>

                                <form id="delete-form-{{ $ord->id }}"
                                      action="{{ route('admin.orders.destroy', $ord->id) }}"
                                      method="POST"
                                      style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
