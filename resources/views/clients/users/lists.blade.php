@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif

    <h1>{{$title}}</h1>
    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
    <hr />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width = '5%'>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th width='15%'>Thời gian</th>
                <th width='5%'>Sửa</th>
                <th width='5%'>Xoá</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->fullname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->create_at}}</td>
                        <td>
                            <a href="{{route('users.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xoá?')" href="{{route('users.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection