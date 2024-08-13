@extends('template.app-admin')
@section('content')
@section('title', 'Konfigurasi')
<h1 style="font-family: 'Times New Roman', Times, serif">Konfigurasi</h1>
<br>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Background</th>
                        <th>profil</th>
                        <th>facebook</th>
                        <th>instagram</th>
                        <th>linkedln</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konfigurasi as $item)
                    <tr>
                        <td><img src="{{asset('storage/foto/'.$item->background)}}" alt="" width="100"></td>
                        <td><img src="{{asset('storage/foto/'.$item->profil)}}" alt="" width="100"></td>
                        <td>{{$item->facebook}}</td>
                        <td>{{$item->instagram}}</td>
                        <td>{{$item->linkedln}}</td>
                        <td>
                            <button
                            type="button"
                            class="btn btn-success"
                            data-bs-toggle="modal"
                            data-bs-target="#basicModal">
                            Update
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                    </div>
                                    <form action="konfigurasi-update/{{$item->id}}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                    <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Background</label>
                                        <input type="file" name="background_photo" value="{{$item->background}}" id="nameBasic" class="form-control" placeholder="Enter Name" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Profil</label>
                                        <input type="file" name="profil_photo" value="{{$item->profil}}" id="nameBasic" class="form-control" placeholder="Enter Name" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Facebook</label>
                                        <input type="text" name="facebook" value="{{$item->facebook}}" id="nameBasic" class="form-control" placeholder="Enter Link" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Instagram</label>
                                        <input type="text" name="instagram" value="{{$item->instagram}}" id="nameBasic" class="form-control" placeholder="Enter Link" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Linkedln</label>
                                        <input type="text" name="linkedln" value="{{$item->linkedln}}" id="nameBasic" class="form-control" placeholder="Enter Link" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection
