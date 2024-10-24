@extends('layout.home')

@section('title', 'Edit Data Penerbit')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header shadow">
        <h1>Penerbit</h1>
      </div>

      <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Penerbit</h4>
            </div>

            <div class="card-body">
                <form action="/penerbit/{{$penerbit ->id}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="{{$penerbit->kode}}" placeholder="Masukkan kode">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$penerbit->nama}}" placeholder="Masukkan nama">
                    </div>
    
                    <button class="btn btn-sm btn-warning" type="submit">Update</button>
                </form>
            </div>
        </div>
      </div>
    </section>
</div>
    
@endsection