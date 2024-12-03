@extends('dashboard')

@section('content-wrapper')
<div class="container mt-4 px-5">
    <h2 class="text-center">Editar Consultorio</h2>
    <form action="{{ route('office.update', $office->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="d-flex flex-column align-items-center">
            <!-- Campo para el Nombre -->
            <div class="mb-3 w-50">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $office->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Campo para la Descripción -->
            <div class="mb-3 w-50">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" required>{{ old('description', $office->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection
