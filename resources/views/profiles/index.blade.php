@extends('layouts.app')
@section('content')
<div class="container">
<h2>Danh sách người dùng và hồ sơ</h2>
<table class="table table-bordered">
    <tr><th>Tên</th><th>Email</th><th>Địa chỉ</th><th>Điện thoại</th></tr>
    @foreach($users as $u)
    <tr>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->profile->address ?? 'N/A' }}</td>
        <td>{{ $u->profile->phone ?? 'N/A' }}</td>
    </tr>
    @endforeach
</table>
</div>
@endsection
