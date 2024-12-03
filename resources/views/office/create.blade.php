@extends('dashboard')

@section('content-wrapper')
<div class="container mt-4 px-5">
    <h2 class="text-center" >Crear nuevo consultorio</h2>
    <form action="{{ route('office.store') }}" method="POST">
        @csrf
        <div class="d-flex flex-column align-items-center">
            <div class="mb-3 w-50">
                <label for="name" class="form-label">Nombre del consultorio</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 w-50">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection
