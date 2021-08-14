<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                @if(Auth::check())
                @if(Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('admin')}}">Halaman Admin</a>
                </li>
                @endif
                
                <li class="nav-item">
                    <a class="nav-link" href="{{url('pengguna')}}">Halaman Pengguna</a>
                </li>

                @endif
            </div>
            
        </div>
    </div>
    
</x-app-layout>
