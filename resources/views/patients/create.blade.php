@extends('dashboard')

@section('content-wrapper')
<div class="container mt-4 px-5 ">
    <h2 class="text-center" >Crear nuevo paciente</h2>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="d-flex flex-column align-items-center">
        <div class="mb-3 w-50">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="lastName" class="form-label">Apellido</label>
            <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" value="{{ old('lastName') }}" required>
            @error('lastName')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="file" class="form-label">Expediente</label>
            <input type="text" name="file" class="form-control @error('file') is-invalid @enderror" id="file" value="{{ old('file') }}" required>
            @error('file')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    {{-- <div class="mb-3">
        <div class=" align-items-end">
            <div>
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" name="role" id="role" required>
                    <option value="">Choose...</option>
                    @foreach ($roles as $role )
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    
                </select>
                <div class="invalid-feedback">
                    Please select a valid Rol.
                </div>
            </div>
        </div>
    </div> --}}
        {{-- <div class="mb-3 w-50">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 w-50">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    </form>
</div>
@endsection
