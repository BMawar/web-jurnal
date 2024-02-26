@extends('layouts.app')
@section('navbar')
<a class="navbar-brand" href="{{ url('/guru') }}">
                  <h5>Guru</h5>
                </a>    <a class="navbar-brand" href="{{ url('/mapel') }}">
                   <h5>Mapel</h5>
                </a>    <a class="navbar-brand" href="{{ url('/jurnal') }}">
                    <h5>Jurnal</h5>
                </a>
                @endsection
                @section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
           
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('jurnal.create') }}" class="btn btn-md btn-success mb-3">TAMBAH JURNAL</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">MAPEL</th>
                                <th scope="col">KEHADIRAN</th>
                                <th scope="col">MATERI</th>
                                <th scope="col">AKSI</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            @forelse ($jurnal as $index => $item)
    <tr class="text-center">
    <td>{{ optional($item->mapel)->nama_mapel }}</td>
        <td>{!! $item->kehadiran !!}</td>
        <td>{!! $item->materi !!}</td>
        <td class="text-center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jurnal.destroy', $item->id) }}" method="POST">
                <a href="{{ route('jurnal.edit', $item->id) }}" class="btn btn-sm btn-primary"> <i data-feather="edit-3"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i data-feather="trash-2"></i></button>
            </form>
        </td>
    </tr>
@empty
    <div class="alert alert-danger">
        Data Post belum Tersedia.
    </div>
@endforelse
                            </tbody>
                          </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
<script>
    feather.replace();
  </script>
@endsection