<x-app-layout>
  <x-slot name="header">
    <div class="d-flex">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('VIDEOS') }}
      </h2>
      <a class="btn btn-primary mx-4" href="{{ route('videos.create') }}" role="button">{{ __('Nuevo') }}</a>
    </div>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="table-responsive">
        @if(Session::has('success'))
        <div class="alert alert-success">
          <h3>{{ Session::get('success') }}</h3>
        </div>
        @endif
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Plataforma</th>
              <th colspan="2">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($videos as $video)
            <tr>
              <td><a href="{{ route('videos.show', $video->id) }}">{{ $video->video }}</a></td>
              <td>{{ $video->plataforma }}</td>
              <td class="d-flex">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                  data-bs-target="#exampleModal" data-bs-video='@json($video)'>Editar , <!-- usamos el modal -->
                </button>
                <a href="{{ route('videos.otraFunction', $video->id) }}" class="btn btn-secondary">otraFunction</a>
                <form method="POST" action="{{ route('videos.destroy', $video->id) }}">
                  @method('DELETE')
                  @csrf
                  <input type="submit" value="ELIMINAR" class="btn btn-danger" />
                </form>
              </td>
              @empty
              <td>No hay datos</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

<!-- Forma de inyectar codigo en este ej. es un modal -->
  @section('modalesBootstrap')
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Video</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="" id="edit-form">
            @method('PUT')
            @csrf
            <div class="mb-3">
              <label for="e-video" class="col-form-label">Video:</label>
              <input type="text" class="form-control" id="e-video" name="video">
            </div>
            <div class="mb-3">
              <label for="e-plataforma" class="col-form-label">Plataforma:</label>
              <input type="text" class="form-control" id="e-plataforma" name="plataforma">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('miJS')
  <script>
    const exampleModal = document.getElementById('exampleModal');

    if (exampleModal) {
      exampleModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;

        // Obtener los datos desde el atributo data-bs-video (viene como JSON string)
        const videoData = JSON.parse(button.getAttribute('data-bs-video'));

        // Actualizar campos del modal
        exampleModal.querySelector('#e-video').value = videoData.video;
        exampleModal.querySelector('#e-plataforma').value = videoData.plataforma;

        // Cambiar la acción del formulario para que use el ID correcto
        const form = exampleModal.querySelector('form');
        form.action = `/videos/${videoData.id}`;
      });
    }
  </script>
  @endsection
</x-app-layout>