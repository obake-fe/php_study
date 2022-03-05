@extends('layouts.base')

@section('title', '6. laravel導入')

@section('subTitle', '9. controllerからmodelを呼び出し、画面で入力したnameをdbに保存するような機能を作ってください。この際、FormRequestを利用し、nameが5文字以下でアルファベットのみであることのバリデーションをおこなってください')

@section('content')
    @error('name')
    <p style="color: red">ERROR : {{$message}}</p>
    @enderror
    <form action="add" method="post">
        @csrf
        <label for="name">input name : </label>
        <input type="text" name="name" id="name" value="{{old('name')}}">
        <input type="submit" value="send">
    </form>
    <hr>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Created_at</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
