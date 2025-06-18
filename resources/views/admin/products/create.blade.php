@extends('admin.layout')
@section('content')

<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">إضافة منتج جديد</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name">اسم المنتج</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="category_id">اختر الفئة</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="custom-form-select @error('category_id') is-invalid @enderror">
                                <option value="">اختر الفئة</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                            {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="is_active">الحالة</label>
                            <select name="is_active"
                                    id="is_active"
                                    class="custom-form-select @error('is_active') is-invalid @enderror">
                                <option value="1" {{ old('is_active','1') === '1' ? 'selected' : '' }}>فعالة</option>
                                <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>غير فعالة</option>
                            </select>
                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="is_featured">تخفيضات</label>
                            <select name="is_featured"
                                    id="is_featured"
                                    class="custom-form-select @error('is_featured') is-invalid @enderror">
                                <option value="1" {{ old('is_featured','0') === '1' ? 'selected' : '' }}>نعم</option>
                                <option value="0" {{ old('is_featured','0') === '0' ? 'selected' : '' }}>لا</option>
                            </select>
                            @error('is_featured')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="is_new">منتج جديد</label>
                            <select name="is_new"
                                    id="is_new"
                                    class="custom-form-select @error('is_new') is-invalid @enderror">
                                <option value="1" {{ old('is_new','0') === '1' ? 'selected' : '' }}>نعم</option>
                                <option value="0" {{ old('is_new','0') === '0' ? 'selected' : '' }}>لا</option>
                            </select>
                            @error('is_new')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="qty">الكمية</label>
                            <input type="number"
                                   class="form-control @error('qty') is-invalid @enderror"
                                   id="qty"
                                   name="qty"
                                   value="{{ old('qty') }}">
                            @error('qty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="purchase_price">سعر الشراء</label>
                            <input type="number"
                                   class="form-control @error('purchase_price') is-invalid @enderror"
                                   id="purchase_price"
                                   name="purchase_price"
                                   value="{{ old('purchase_price') }}">
                            @error('purchase_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="sale_price">سعر المبيع</label>
                            <input type="number"
                                   class="form-control @error('sale_price') is-invalid @enderror"
                                   id="sale_price"
                                   name="sale_price"
                                   value="{{ old('sale_price') }}">
                            @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="discount_price">سعر الخصم</label>
                            <input type="number"
                                   class="form-control @error('discount_price') is-invalid @enderror"
                                   id="discount_price"
                                   name="discount_price"
                                   value="{{ old('discount_price') }}">
                            @error('discount_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description">الوصف</label>
                            <textarea id="description"
                                      name="description"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-6">
                            <label for="images">صور المنتج (بحد أقصى 4 صور)</label>
                            <input type="file"
                                   id="images"
                                   name="images[]"
                                   class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror"
                                   multiple
                                   accept="image/*">
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="has_variants">هل للمنتج متغيرات؟</label>
                            <select id="has_variants" name="has_variants" class="form-control">
                                <option value="0" {{ old('has_variants') == '0' ? 'selected' : '' }}>لا</option>
                                <option value="1" {{ old('has_variants') == '1' ? 'selected' : '' }}>نعم</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="variants-container" style="display: none;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">ألوان المنتج</h5>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="addColor()">
                                        <i class="fas fa-plus"></i> إضافة +
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div id="colors-wrapper"></div>
                                    @error('colors')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">مقاسات المنتج</h5>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="addSize()">
                                        <i class="fas fa-plus"></i> إضافة +
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div id="sizes-wrapper"></div>
                                    @error('sizes')
                                        <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">رجوع</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('has_variants').addEventListener('change', function() {
        document.getElementById('variants-container').style.display = this.value == '1' ? 'block' : 'none';
        if(this.value == '1') {
            if(document.getElementById('colors-wrapper').children.length === 0) addColor();
            if(document.getElementById('sizes-wrapper').children.length === 0) addSize();
        }
    });
    
    function addColor() {
        const wrapper = document.getElementById('colors-wrapper');
        const index = wrapper.querySelectorAll('.color-row').length;
        
        const html = `
        <div class="row color-row mb-3 align-items-center">
            <div class="col-md-8">
                <select name="colors[${index}][color_id]" class="form-control">
                    <option value="">اختر اللون</option>
                    @foreach($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.color-row').remove()">
                    <i class="fas fa-trash"></i> حذف
                </button>
            </div>
        </div>`;
        
        wrapper.insertAdjacentHTML('beforeend', html);
    }
    
    function addSize() {
        const wrapper = document.getElementById('sizes-wrapper');
        const index = wrapper.querySelectorAll('.size-row').length;
        
        const html = `
        <div class="row size-row mb-3 align-items-center">
            <div class="col-md-8">
                <select name="sizes[${index}][size_id]" class="form-control">
                    <option value="">اختر المقاس</option>
                    @foreach($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.size-row').remove()">
                    <i class="fas fa-trash"></i> حذف
                </button>
            </div>
        </div>`;
        
        wrapper.insertAdjacentHTML('beforeend', html);
    }
    </script>
@endsection