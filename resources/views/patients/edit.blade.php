@extends('dashboard')
@section('content-wrapper')


<section class="d-flex justify-content-center pt-5" style="background-color: #f8f9fa;">
    <div class="card shadow-sm p-4" style="max-width: 500px; width: 100%;">
        <header class="mb-4">
            <h2 class="h5 font-weight-bold text-dark text-center">
                {{ __('Informacion de la cuenta') }}
            </h2>
            <p class="text-muted text-center">
                {{ __("Actualizar datos..") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form action="{{ route('patients.update', $patient->id)}}" method="POST">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Nombre') }}</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name', $patient->name) }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                />
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">{{ __('Apellido') }}</label>
                <input 
                    type="text" 
                    id="lastName" 
                    name="lastName" 
                    class="form-control" 
                    value="{{ old('lastName', $patient->lastName) }}" 
                    required 
                    autofocus 
                    autocomplete="lastName"
                />
                @error('lastName')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">{{ __('Expediente') }}</label>
                <input 
                    type="text" 
                    id="file" 
                    name="file" 
                    class="form-control" 
                    value="{{ old('file', $patient->file) }}" 
                    required 
                    autofocus 
                    autocomplete="file"
                />
                @error('file')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-grid">
                    <a href="{{ route('patients.index') }}" class="btn btn-danger">
                        {{ __('Regresar') }}
                    </a>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                </div>
            </div>
            @if (session('status') === 'profile-updated')
                <p 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    x-init="setTimeout(() => show = false, 2000)" 
                    class="text-success small mt-3 text-center"
                >
                    {{ __('Guardar.') }}
                </p>
                
            @endif
        </form>
    </div>
</section>



@endsection