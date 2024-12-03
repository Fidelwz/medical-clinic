@extends('dashboard')

@section('content-wrapper')
<div class="container">
    @can('haveaccess', 'office.create')
    <a href="{{ route('office.create') }}" class="mt-4 btn btn-gray btn-block">
        <i class="fas fa-plus-circle"></i> Crear un nuevo consultorio
    </a>
    @endcan
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($offices as $office)
                <tr>
                    <td>{{ $office->id }}</td>
                    <td>{{ $office->name }}</td>
                    <td>{{ $office->created_at->translatedFormat('d \d\e F \d\e Y \a \l\a\s h:i a') }}</td>
                    <td class="d-flex justify-content-center align-items-center ">
                        @can('haveaccess', 'patients.create')
                            <a title="Modificar consultorio" href="{{ route('office.edit', $office->id) }}" class="btn btn-warning mx-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form class="form-delete" action="{{ route('office.delete', $office->id) }}" method="POST">
                                @csrf
                                <button type="submit" title="Eliminar consultorio" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-danger text-center">No se encuentra ningún consultorio</td>
                </tr>
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
    $(document).ready(function() {
    $('.form-delete').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: 'Quieres eliminar?',
    text: "Se eliminara de forma permanente",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'si deseo eliminar',
    cancelButtonText: 'cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
    this.submit();
    
    
    }
    })
    }) });
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
