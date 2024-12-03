@extends('dashboard')

@section('content-wrapper')
<div class="container mt-4 px-5">
    <h2>Editar Secretaria</h2>
    <form action="{{ route('secretary.update', $secretary->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="d-flex flex-column align-items-center">
            <div class="mb-3 w-50">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $secretary->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 w-50">
                <label for="lastName" class="form-label">Apellido</label>
                <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" value="{{ old('lastName', $secretary->lastName) }}" required>
                @error('lastName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
@endsection
