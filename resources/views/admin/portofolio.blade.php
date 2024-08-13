@extends('template.app-admin')
@section('content')
@section('title', 'Portofolio')
<h1 style="font-family: 'Times New Roman', Times, serif">Portofolio</h1>
<br>
<div class="col-md-12">
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="card-body">
            <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#tambahModal">
                Tambah
            </button>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portofolio as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kategori}}</td>
                        <td><img src="{{asset('storage/portofolio/'.$item->foto)}}" alt="Portofolio" width="100"></td>
                        <td>
                            <form action="portofolio-delete/{{$item->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
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
        <form action="portofolio" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
        <div class="row">
            <div class="col mb-3">
            <label for="nameBasic" class="form-label">Kategori</label>
            <select name="kategori" id="" class="form-control">
                <option value="">...</option>
                <option value="web">Web</option>
                <option value="tulisan">Tulisan</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
            <label for="nameBasic" class="form-label">Portofolio</label>
            <input type="file" name="foto_portofolio" id="nameBasic" class="form-control"/>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Batal
        </button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
    </div>
</div>
</div>


@endsection
