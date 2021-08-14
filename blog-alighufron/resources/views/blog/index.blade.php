@extends('template')

@if(Auth::check())
@section('template')
@if(Auth::user()->role == 'admin')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel</h1>
<p class="mb-4">Tabel merupakan susunan data dalam baris dan kolom, atau mungkin dalam struktur yang lebih kompleks.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('blog.create') }}" class="btn btn-primary btn-icon-split mb-4">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th style="width: 500px;">Content</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th style="width: 500px;">Content</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($blog as $blogs)

                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td class="text-center">
                                                <img src="{{ Storage::url('public/blogs/').$blogs->image }}" class="rounded" style="width: 150px;">
                                            </td>
                                            <td class="text-center">{{ $blogs->title }}</td>
                                            <td style="width: 500px;">{!! $blogs->content !!}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda yakin ingin menghapusnya?');" action="{{ route('blog.destroy',$blogs->id) }}" method="POST">
                                                    <a class="btn btn-warning btn-circle btn-sm" href="{{ route('blog.edit',$blogs->id) }}"><i class="far fa-edit"></i></a>
                                                    <a class="btn btn-success btn-circle btn-sm" href="{{ route('blog.show',$blogs->id) }}"><i class="far fa-eye"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty

                                            <div class="alert alert-danger">
                                                Data blog belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{ $blog->links() }}
                                
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
@endif
@if(Auth::user()->role == 'pengguna')

            <div class="row">

            @foreach ($blog as $blogs)
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a style="text-decoration: none;" href="{{ route('blog.show',$blogs->id) }}">
                                <div class="card border-left-primary shadow h-100 py-2 card-pengguna">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center ">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                    {{ $blogs->title }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <img src="{{ Storage::url('public/blogs/').$blogs->image }}" class="rounded" style="width: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
            @endforeach
                        
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
@endif
@endsection
@endif