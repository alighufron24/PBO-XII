@extends('template')
@section('template')
@if(Auth::check())
@if(Auth::user()->role == 'admin')







                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        
                                            @csrf

                                    <div class="form-group">
                                        <label class="font-weight-bold">Gambar</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                        
                                        
                                    
                                        <!-- error message untuk title -->
                                        @error('image')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Judul</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Blog">
                                    
                                        <!-- error message untuk title -->
                                        @error('title')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Konten</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="kontent" rows="5" placeholder="Masukkan Konten Blog">{{ old('content') }}</textarea>
                                    
                                        <!-- error message untuk content -->
                                        @error('content')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Simpan Data</span>
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Reset</span>
                                    </button>
                                    <a href="{{ route('blog.index') }}" class="btn btn-dark btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>

                                </form> 
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->    
    
    
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'kontent' );
    </script>

@endsection
@endif
@endif