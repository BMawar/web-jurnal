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

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf


                            <div class="form-group">
                                <label class="font-weight-bold">NAMA GURU</label>
                                <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru" value="{{ old('nama_guru') }}" placeholder="Masukkan Nama Guru">
                            
                                <!-- error message untuk title -->
                                @error('nama_guru')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
