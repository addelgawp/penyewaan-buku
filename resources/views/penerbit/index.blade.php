@extends('layout.home')

@section('title', 'Penerbit')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header shadow">
                <h1>Penerbit</h1>
            </div>
{{-- 
            @if(session('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}

            <div class="section-body">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Penerbit</h4>

                        <div class="card-header-form d-flex justify-content-end">
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
                                @foreach ($penerbit as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <form action="{{ route('penerbit.destroy', $item->id) }}" method="POST" id="delete-form{{$item->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="/penerbit/{{($item->id)}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn ml-3 btn-sm btn-danger" onclick="confirmDelete('delete-form{{$item->id}}')">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
    

    @include('penerbit.form')
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
                    $('#' + formId).submit();
                }
            })
        }

        $(document).ready(function() {
            $('#table').DataTable();
        });
        
    </script>
@endpush