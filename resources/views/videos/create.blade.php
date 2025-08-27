<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Nuevo VIDEO') }}
            </h2>
            <a class="btn btn-primary mx-4" href="{{ route('videos.index') }}" role="button">{{ __('Volver') }}</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <h3>{{ Session::get('success') }}</h3>
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mb-3 row" method="POST" action="{{ route('videos.store') }}">
                @csrf
                <div class="mb-3 row">
                    <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-6">
                        <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-6">
                        <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="publicado" class="col-sm-2 col-form-label">Publicado</label>
                    <div class="col-sm-6">
                        <input type="text" name="publicado" value="{{ old('publicado') }}" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <a href="{{ route('videos.index') }}" class="btn btn-secondary mb-3 col-sm-2 me-3">Cancelar</a>
                    <button type="submit" class="btn btn-primary mb-3 col-sm-2">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>