@extends('dashboard')

@section('content-wrapper')
<div class="container">
    <h1 class="title">lista de Usuarios</h1>
    @can('haveaccess', 'patients.create')
    <a href="{{ route('profile.create') }}" class="mt-4 btn btn-gray btn-block"><i class="fas fa-plus-circle"></i> Crear un nuevo usuario</a>
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
            @forelse ($patients as $patient)
                <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->email }}</td>
                <td>
                    @if (isset($patient->roles[0]->name))
                        @foreach($patient->roles as $i=>$role)
                            {{ $role->name }}
                            @if($i != count($patient->roles) - 1)
                                , <br/>
                            @endif
                        @endforeach
                    @else
                        No posee ningun rol
                    @endif
                </td>
                <td>
                    @can('patients.create')
                   
                    <h1>usuario con permiso para editar</h1>
                    {{-- <a title="Modificar rol" href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning"><i class="fas fa-key"></i> Modificar roles</a> --}}
                    @endcan
                </td>
                </tr>
            @empty
                <h2 class="text-danger"> No se encuentra ningun usuario</h2>
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