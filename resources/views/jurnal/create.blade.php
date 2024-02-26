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
                        <form action="{{ route('jurnal.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('POST')


                        <div class="form-group">
                        <label class="font-weight-bold">MAPEL</label>
                        <select class="form-control @error('id_mapel') is-invalid @enderror" name="id_mapel" size="1">
                            <option value="" selected disabled> Pilih Nama Mapel</option>
                            {{-- Looping untuk menampilkan nama-nama mapel --}}
                            @foreach($mapel as $mapelItem)
                                <option value="{{ $mapelItem->id }}">{{ $mapelItem->nama_mapel }}</option>
                            @endforeach
                        </select>

                                <!-- error message untuk id_siswa -->
                                @error('id_mapel')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KEHADIRAN</label>
                                <select class="form-control @error('kehadiran') is-invalid @enderror" name="kehadiran" size="1">
                                    <option value="" selected disabled> Pilih </option>
                                    <option value="HADIR">hadir</option>
                                    <option value="TIDAK HADIR">Tidak Hadir</option>
                                    <option value="TIDAK HADIR DENGAN TUGAS">Tidak Hadir Dengan Tugas</option>
                                </select>
                            
                                <!-- error message untuk kondisi -->
                                @error('kehadiran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                           
                            <div class="form-group">
                                <label class="font-weight-bold">Materi</label>
                                <input type="text" class="form-control @error('materi') is-invalid @enderror" name="materi" value="{{ old('materi') }}" placeholder="Masukkan Nama Mapel">
                            
                                <!-- error message untuk title -->
                                @error('materi')
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    <!-- Add this at the end of your create.blade.php file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
const updateImage = () => {
            const selectedOption = document.getElementById('id_barang').options[document.getElementById('id_barang').selectedIndex];
            document.getElementById('selected_image').src = selectedOption.getAttribute('data-gambar');
        };
</script>

</script>
@endsection

