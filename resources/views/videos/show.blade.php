<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mostrar VIDEO') }}
            </h2>
            <a class="btn btn-primary mx-4" href="{{ route('videos.index') }}" >{{ __('Volver') }}</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="video" class="col-sm-2 col-form-label">Video</label>
                    <div class="col-sm-6">
                        <input type="text" name="video" class="form-control" value="{{ $video->video }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="plataforma" class="col-sm-2 col-form-label">Plataforma</label>
                    <div class="col-sm-6">
                        <input type="text" name="plataforma" class="form-control" value="{{ $video->plataforma }}" disabled>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>