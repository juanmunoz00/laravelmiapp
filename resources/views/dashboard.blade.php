<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="container">
                @if ( isset($errors) && $errors->any() )
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li style="color: crimson">{{ $error  }}</li>
                            @endforeach
                        </ul>
                        {{ session('status') }}
                    </div>
                @endif

                @if ( session()->has('success') )
                    <div class="alert alert-success" role="alert">
                        <ul>
                            @foreach ( session()->get('success') as $message )
                                <li style="color: forestgreen">{{ $message  }}</li>
                            @endforeach
                        </ul>
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bienvenido
                </div>
                
                <div>

                    @foreach ( $todosLosUsuarios as $usuario )
                        {{ $todosLosUsuarios[0] }}
                    @endforeach                    
                </div>
                

            </div>
        </div>
    </div>
</x-app-layout>
