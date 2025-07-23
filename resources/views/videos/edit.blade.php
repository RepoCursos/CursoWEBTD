<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar VIDEO') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mb-3 row" method="POST" action="{{ route('videos.update', $video->id ) }}">
                @method('PUT')
                @csrf
                <div class="mb-3 row">
                    <label for="video" class="col-sm-2 col-form-label">Video</label>
                    <div class="col-sm-6">
                        <input type="text" name="video" value="{{ $video->video }}" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="plataforma" class="col-sm-2 col-form-label">Plataforma</label>
                    <div class="col-sm-6">
                        <input type="text" name="plataforma" value="{{ $video->plataforma }}" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row d-flex">
                    <button type="submit" class="btn btn-primary mb-3 col-sm-2">Guardar</button>
                    <a class="btn btn-danger mx-4 mb-3 col-sm-2" href="{{ route('videos.index') }}" role="button">{{ __('Cancelar') }}</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>