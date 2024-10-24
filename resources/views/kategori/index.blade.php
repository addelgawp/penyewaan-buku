@extends('layout.home')

@section('title', 'Kategori')

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header shadow">
        <h1>Kategori</h1>
      </div>

      <div class="section-body">
        <div class="card shadow">
            <div class="card-header">
                <h4>Kategori</h4>

                <div class="card-header-form">
                    <button class="btn btn-sm btn-success" type="button" data-target="#modal-tambah" data-toggle="modal">Tambah</button>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-stripped" id="table">
                    <thead>
                        <tr>
                            <th style="width: 10%">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <form action="/kategori/{{$item->id}}" id="delete-form{{$item->id}}">
                                    @method('delete')
                                    <a href="/kategori/{{($item->id)}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
                                    <button class="btn ml-3 btn-sm btn-danger" onclick="confirmDelete('delete-form{{$item->id}}')"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
  </div>

  @include('kategori.form')
@endsection


@push('script')
    <script>
        function confirmDelete(formId){
            event.preventDefault()
            swal({
                title:"Apakah anda yakin?",
                text:"Ketika anda klik OK maka data anda akan terhapus secara permanen!",
                icon: 'warning',
                buttons: true,
                dangerMode: true
            })
            .then((willDelete)=>{
                if (willDelete){
                    document.getElementById(formId).submit();
                }
            })
        }

        $(document).ready(function() {
            $('#table').DataTable();
        });

    </script>
@endpush