@extends('template.app-admin')
@section('content')
@section('title', 'About Me')
<h1 style="font-family: 'Times New Roman', Times, serif">About Me</h1>
<br>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <br>
            @foreach ($aboutMe as $item)
            <form action="/about-me-update/{{$item->id}}" method="post">
                @method('PUT')
                @csrf
                <input type="text" name="header" class="form-control" value="{{$item->header}}" placeholder="Header">
                <br>
                <input type="text" name="isi" class="form-control" value="{{$item->isi}}" placeholder="Isi">
                <br>
                <input type="text" name="alamat" class="form-control" value="{{$item->alamat}}" placeholder="alamat">
                <br>
                <input type="tel" name="no" class="form-control" value="{{$item->no}}" placeholder="no">
                <br>
                <input type="email" name="email" class="form-control" value="{{$item->email}}" placeholder="email">
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection

