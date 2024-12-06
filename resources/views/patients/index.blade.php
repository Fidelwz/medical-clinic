@extends('dashboard')

@section('content-wrapper')

<div class="container">
    @can('haveaccess', 'patients.create')
    <a href="{{ route('patients.create') }}" class="mt-4 btn btn-gray btn-block"><i class="fas fa-plus-circle"></i> Crear un nuevo paciente</a>
    @endcan
    <table id="example" class="table table-striped table-bordered " style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apelido</th>
                <th>Expediente</th>
                <th>Correo electronico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->lastName }}</td>
                <td>{{ $patient->file }}</td>
                <td> {{ $patient->email }}</td>
                <td class="d-flex justify-content-center align-items-center ">
                    @can('haveaccess', 'patients.create')
                        <a title="Modificar rol" href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form class="form-delete" action="{{ route('patients.delete', $patient->id) }}" method="POST">
                            @csrf
                            <button type="submit" title="Eliminar paciente" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
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

    // Extraer tipo de operación (registro, eliminación, etc.)
    const operationMatch = successMessage.match(/^(.*?)<br>/);
    const operationMessage = operationMatch ? operationMatch[1] : 'Operación realizada';

    // Extraer correo y contraseña si existen
    const emailMatch = successMessage.match(/<strong>Correo:<\/strong> ([^<]+)/);
    const passwordMatch = successMessage.match(/<strong>Contraseña:<\/strong> (\w+)/);
    const email = emailMatch ? emailMatch[1] : null;
    const password = passwordMatch ? passwordMatch[1] : null;

    // Configurar SweetAlert
    Swal.fire({
        title: operationMessage,
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
{{ session()->forget('status_success') }} <!-- Limpia la sesión después de usarla -->
@endif
@if(session('status_success'))
<script>
    // Extraer el mensaje completo
    const successMessage = `{!! session('status_success') !!}`;

    // Extraer tipo de operación (registro, eliminación, etc.)
    const operationMatch = successMessage.match(/^(.*?)<br>/);
    const operationMessage = operationMatch ? operationMatch[1] : 'Operación realizada';

    // Extraer correo y contraseña si existen
    const emailMatch = successMessage.match(/<strong>Correo:<\/strong> ([^<]+)/);
    const passwordMatch = successMessage.match(/<strong>Contraseña:<\/strong> (\w+)/);
    const email = emailMatch ? emailMatch[1] : null;
    const password = passwordMatch ? passwordMatch[1] : null;

    // Configurar SweetAlert
    Swal.fire({
        title: operationMessage,
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
{{ session()->forget('status_success') }} <!-- Limpia la sesión después de usarla -->
@endif



@endsection
