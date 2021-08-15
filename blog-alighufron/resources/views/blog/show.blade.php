@extends('template')
@section('template')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h3 class=" mt-3"><strong>{{ $blog->title }}</strong></h3>

                                <img class="mt-3 mb-5 rounded" src="{{ Storage::url('public/blogs/').$blog->image }}" alt="Gambar" width="250px">
                            </div>
                            <div class="container">
                                <hr>
                                {!! $blog->content !!}
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('blog.index') }}" class="btn btn-dark btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
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