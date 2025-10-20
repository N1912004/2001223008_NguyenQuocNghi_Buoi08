@extends('layouts.app')
@section('content')
<div class="container">
<h2>Thêm sản phẩm</h2>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="mb-3">
        <label>Tên sản phẩm</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Giá</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tồn kho</label>
        <input type="number" name="stock" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Danh mục</label>
        <select name="category_id" class="form-select">
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
@endsection
