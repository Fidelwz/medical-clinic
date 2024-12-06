@extends('dashboard')

@section('content-wrapper')
<div class="container mt-4 px-5">
    <h2 class="text-center">Editar perfil</h2>
    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" class="p-4 shadow rounded bg-light">
        @csrf
        @method('PUT')
        <div class="d-flex flex-column align-items-center">
            <!-- Nombre -->
            <div class="mb-3 w-50">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $doctor->name) }}" placeholder="Ingrese el nombre" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Apellido -->
            <div class="mb-3 w-50">
                <label for="lastName" class="form-label">Apellido</label>
                <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" value="{{ old('lastName', $doctor->lastName) }}" placeholder="Ingrese el apellido" required>
                @error('lastName')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Consultorio -->
            <div class="mb-3 w-50">
                <label for="id_office" class="form-label">Consultorio</label>
                <select name="id_office" id="id_office" class="form-select custom-select @error('id_office') is-invalid @enderror">
                    <option value="">Sin consultorio</option>
                    @foreach ($offices as $office)
                        <option value="{{ $office->id }}" {{ old('id_office', $doctor->id_office) == $office->id ? 'selected' : '' }}>
                            {{ $office->name }}
                        </option>
                    @endforeach
                </select>
                @error('id_office')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Sexo -->
            <div class="mb-3 w-50">
                <label for="sex" class="form-label">Sexo</label>
                <select name="sex" id="sex" class="form-select custom-select @error('sex') is-invalid @enderror" required>
                    <option value="">{{$doctor->sex}}</option>
                    <option value="M" {{ old('sex', $doctor->sex) == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('sex', $doctor->sex) == 'F' ? 'selected' : '' }}>Femenino</option>
                </select>
                @error('sex')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón -->
            <button type="submit" class="btn btn-primary mt-3 w-50">Guardar cambios</button>
        </div>
    </form>
</div>
@endsection
