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
                        <form action="{{ route('jurnal.update', $jurnal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
    <label class="font-weight-bold">MAPEL</label>
    <select class="form-control @error('id_mapel') is-invalid @enderror" name="id_mapel" size="1">
        <option value="" selected disabled> Pilih Mapel</option>
        {{-- Looping untuk menampilkan nama-nama guru --}}
        @foreach($mapel as $mapelItem)
            <option value="{{ $mapelItem->id }}">{{ $mapelItem->nama_mapel }}</option>
        @endforeach
    </select>

    <!-- error message untuk id_guru -->
    @error('id_mapel')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

                           
                            <div class="form-group">
                                <label class="font-weight-bold">KEHADIRAN</label>
                                <select class="form-control @error('kehadiran') is-invalid @enderror" name="kehadiran" size="1">
                                    <option value="" selected disabled> Pilih Kehadiran </option>
                                    <option value="MATEMATIKA">Hadir</option>
                                    <option value="BAHASA INGGRIS">Tidak Hadir</option>
                                    <option value="BAHASA INDONESIA">Tidak Hadir Dengan Tugas</option>
                                </select>
                            
                                <!-- error message untuk kondisi -->
                                @error('kehadiran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">MATERI</label>
                                <input type="text" class="form-control @error('kehadiran') is-invalid @enderror" name="materi" value="{{ old('materi', $jurnal->materi) }}" placeholder="Masukkan Kehadiran">
                            
                                <!-- error message untuk title -->
                                @error('materi')
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
