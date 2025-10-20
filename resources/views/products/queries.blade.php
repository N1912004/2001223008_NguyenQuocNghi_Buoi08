@extends('layouts.app')
@section('content')


<div class="container">
    <h2> Báo cáo truy vấn nâng cao</h2>

    <h4 style="margin-top:20px;">1 Sản phẩm có giá > 100,000 đ</h4>
    <table border="1" cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; text-align:center;">
        <tr style="background-color:#f2f2f2;">
            <th>Tên sản phẩm</th>
            <th>Giá</th>
        </tr>
        @foreach($expensive as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ number_format($p->price) }} đ</td>
            </tr>
        @endforeach
    </table>
<form method="GET" action="{{ url('/products/queries') }}" style="margin-bottom: 20px;">
    <label>Từ giá:</label>
    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Nhỏ nhất">

    <label>Đến giá:</label>
    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Lớn nhất">

    <button type="submit">Lọc</button>
</form>

    <h4 style="margin-top:25px;">2 Số sản phẩm theo từng danh mục</h4>
    <table border="1" cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; text-align:center;">
        <tr style="background-color:#f2f2f2;">
            <th>Danh mục</th>
            <th>Số lượng sản phẩm</th>
        </tr>
        @foreach($categories as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->products_count }}</td>
            </tr>
        @endforeach
    </table>

    <h4 style="margin-top:25px;">3 Sản phẩm còn hàng (stock > 0)</h4>
    <table border="1" cellpadding="6" cellspacing="0" width="100%" style="border-collapse: collapse; text-align:center;">
        <tr style="background-color:#f2f2f2;">
            <th>Tên sản phẩm</th>
            <th>Tồn kho</th>
        </tr>
        @foreach($inStock as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->stock }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
