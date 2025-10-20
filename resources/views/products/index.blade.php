@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quản lý sản phẩm</h2>

    @if(session('success'))
        <div style="background-color: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 10px;">
        <a href="{{ route('products.create') }}" 
           style="background-color: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px;">
           ➕ Thêm sản phẩm
        </a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" width="100%" 
           style="border-collapse: collapse; text-align:center;">
        <tr style="background-color:#f2f2f2;">
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Danh mục</th>
            <th>Thao tác</th>
        </tr>

        @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ number_format($p->price) }} đ</td>
                <td>{{ $p->stock }}</td>
                <td>{{ $p->category->name }}</td>
                <td>
                    <div style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                        <a href="{{ route('products.edit', $p->id) }}" 
                           style="background-color: #ffc107; color: black; padding: 6px 12px; text-decoration: none; border-radius: 4px; display: inline-block;">
                           ✏️ Sửa
                        </a>

                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" 
                                    style="background-color: #dc3545; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor:pointer;">
                                🗑️ Xóa
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div style="margin-top: 10px;">
        {{ $products->links() }}    
    </div>
</div>
@endsection
