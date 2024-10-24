@extends('layout.home')

@section('title', 'Edit Data Kategori')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header shadow">
        <h1>Kategori</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Kategori</h4>
            </div>

            <div class="card-body">
                <form action="/kategori/{{$kategori->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="{{$kategori->kode}}" placeholder="Masukkan kode">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$kategori->nama}}" placeholder="Masukkan nama">
                    </div>
    
                    <button class="btn btn-sm btn-warning" type="submit">Update</button>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>
    
@endsection