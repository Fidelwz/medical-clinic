@extends('dashboard')

@section('content-wrapper')
<div class="container">
    <h1 class="title">lista de Usuarios</h1>
    @can('haveaccess', 'offices.create')
    <a href="{{ route('profile.create') }}" class="mt-4 btn btn-gray btn-block"><i class="fas fa-plus-circle"></i> Crear un nuevo consultorio</a>
    @endcan
    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo electronico</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($offices as $office)
                <tr>
                <td>{{ $office->name }}</td>
                <td>{{ $office->description }}</td>
                <td>
                    @can('offices.create')
                   
                    <h1>usuario con permiso para editar</h1>
                    {{-- <a title="Modificar rol" href="{{ route('offices.edit', $office->id) }}" class="btn btn-warning"><i class="fas fa-key"></i> Modificar roles</a> --}}
                    @endcan
                </td>
                </tr>
            @empty
                <h2 class="text-danger"> No se encuentra ningun consultorio</h2>
            @endforelse
        </tbody>
    </table>
</div>
@endsection


@section('scripts')
<script>
    
  $(document).ready(function() {
        $('#example').DataTable({
           
            language: {
        url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json',
    },
        });
    });

</script>

@if(session('status_success'))
<script>
    Swal.fire(
    'correcto',
    '{{ session('status_success') }}',
    'success'
)
   </script>

@endif


@endsection