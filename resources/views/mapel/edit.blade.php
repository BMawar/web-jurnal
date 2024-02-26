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
                        <form action="{{ route('mapel.update', $mapel->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
    <label class="font-weight-bold">GURU</label>
    <select class="form-control @error('id_guru') is-invalid @enderror" name="id_guru" size="1">
        <option value="" selected disabled> Pilih Nama Guru</option>
        {{-- Looping untuk menampilkan nama-nama guru --}}
        @foreach($guru as $guruItem)
            <option value="{{ $guruItem->id }}">{{ $guruItem->nama_guru }}</option>
        @endforeach
    </select>

    <!-- error message untuk id_guru -->
    @error('id_guru')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

                           
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA MAPEL</label>
                                <select class="form-control @error('nama_mapel') is-invalid @enderror" name="nama_mapel" size="1">
                                    <option value="" selected disabled> Pilih Nama Mapel </option>
                                    <option value="MATEMATIKA">matematika</option>
                                    <option value="BAHASA INGGRIS">Bahasa Inggris</option>
                                    <option value="BAHASA INDONESIA">Bahasa Indonesia</option>
                                    <option value="AGAMA">Agama</option>
                                    <option value="PPKN">Ppkn</option>
                                </select>
                            
                                <!-- error message untuk kondisi -->
                                @error('nama_mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                        
                            <button type="submit" class="btn btn-md btn-primary mt-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning mt-3">RESET</button>

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
    
</script>
@endsection
