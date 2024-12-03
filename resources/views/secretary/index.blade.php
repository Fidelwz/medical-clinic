@extends('dashboard')

@section('content-wrapper')
<div class="container">
    <h1 class="title">Lista de Secretarias</h1>
    @can('haveaccess', 'secretary.create')
    <a href="{{ route('secretary.create') }}" class="mt-4 btn btn-gray btn-block">
        <i class="fas fa-plus-circle"></i> Crear una nueva secretaria
    </a>
    @endcan
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electrónico</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($secretaries as $secretary)
                <tr>
                    <td>{{ $secretary->name }}</td>
                    <td>{{ $secretary->lastName }}</td>
                    <td>{{ $secretary->email }}</td>
                    <td>{{ $secretary->created_at->translatedFormat('d \d\e F \d\e Y \a \l\a\s h:i a') }}</td>
                    <td class="d-flex justify-content-center align-items-center ">
                        @can('haveaccess', 'patients.create')
                            <a title="Modificar rol" href="{{ route('secretary.edit', $secretary->id) }}" class="btn btn-warning mx-2">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form class="form-delete" action="{{ route('secretary.delete', $secretary->id) }}" method="POST">
                                @csrf
                                <button type="submit" title="Eliminar secretaria" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-danger text-center">No se encuentra ninguna secretaria</td>
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
    // Extraer el mensaje completo
    const successMessage = `{!! session('status_success') !!}`;

    // Extraer correo y contraseña del mensaje usando expresiones regulares
    const emailMatch = successMessage.match(/<strong>Correo:<\/strong> ([^<]+)/);
    const passwordMatch = successMessage.match(/<strong>Contraseña:<\/strong> (\w+)/);
    const email = emailMatch ? emailMatch[1] : null;
    const password = passwordMatch ? passwordMatch[1] : null;

    // Configurar SweetAlert
    Swal.fire({
        title: 'Secretaria creada con éxito!',
        html: successMessage + 
            (email && password ? `<br><br><button id="copy-credentials" class="btn btn-sm btn-primary">Copiar credenciales</button>` : ''),
        icon: 'success',
        showConfirmButton: false,
        didRender: () => {
            if (email && password) {
                // Agregar funcionalidad para copiar correo y contraseña
                document.getElementById('copy-credentials').addEventListener('click', () => {
                    const credentials = `Correo: ${email}\nContraseña: ${password}`;
                    navigator.clipboard.writeText(credentials).then(() => {
                        Swal.fire('¡Copiado!', 'Correo y contraseña han sido copiados al portapapeles.', 'success');
                    }).catch(() => {
                        Swal.fire('Error', 'No se pudieron copiar las credenciales.', 'error');
                    });
                });
            }
        },
        timer: 15000 // Cierra automáticamente después de 15 segundos
    });
</script>
@endif


@endsection
