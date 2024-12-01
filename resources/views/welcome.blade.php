<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuestra clinica</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .active {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo y título -->
            <div class="flex items-center">
                <img src="{{ asset('img/clinicalogo.jpg') }}" alt="Logo de la Clínica Saludable" class="w-12 h-12 mr-4">
                <h1 class="text-3xl font-bold text-blue-600">Nuestra Clinica</h1>
            </div>
            <!-- Navegación -->
            <nav class="space-x-4">
                <a href="#inicio" class="text-gray-600 hover:text-blue-600">Inicio</a>
                <a href="#servicios" class="text-gray-600 hover:text-blue-600">Servicios</a>
                <a href="#citas" class="text-gray-600 hover:text-blue-600">Citas</a>
                <a href="#contacto" class="text-gray-600 hover:text-blue-600">Contacto</a>
            </nav>
        </div>
    </header>

    <!-- Inicio -->
    <main class="mt-8">
        <section id="inicio" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold">Bienvenidos a nuestra Clínica</h2>
                <p class="mt-4 text-lg">Cuidamos de ti y de los que más amas.</p>
                <a href="#citas" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition transform hover:scale-105">
                    Agenda tu cita
                </a>

            </div>
        </section>

        <!-- Servicios -->
        <section id="servicios" class="py-16">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-800">Nuestros Servicios</h2>
                <div class="grid md:grid-cols-3 gap-8 mt-8">
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                        <h3 class="text-xl font-semibold text-blue-600">Consulta General</h3>
                        <p class="mt-2 text-gray-600">Atención médica personalizada para todas las edades.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                        <h3 class="text-xl font-semibold text-blue-600">Pediatría</h3>
                        <p class="mt-2 text-gray-600">Cuidamos de los más pequeños con amor y profesionalismo.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                        <h3 class="text-xl font-semibold text-blue-600">Laboratorio Clínico</h3>
                        <p class="mt-2 text-gray-600">Resultados confiables y rápidos.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Formulario de citas -->
        <section id="citas" class="py-16 bg-gray-200">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-800">Agenda tu Cita</h2>
                <form class="mt-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="name" class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Tu nombre completo" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                        <input type="email" id="email" class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Tu correo electrónico" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Número de contacto</label>
                        <input type="tel" id="phone" class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Tu número de contacto" required>
                    </div>
                    <div class="mb-4">
                        <label for="service" class="block text-sm font-medium text-gray-700">Servicio</label>
                        <select id="service" class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                            <option value="">Selecciona un servicio</option>
                            <option value="consulta_general">Consulta General</option>
                            <option value="pediatria">Pediatría</option>
                            <option value="laboratorio">Laboratorio Clínico</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" id="date" class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div class="mb-4">
                        <label for="time" class="block text-sm font-medium text-gray-700">Hora</label>
                        <input type="time" id="time" class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-500 transition">
                        Agendar cita
                    </button>
                </form>
            </div>
        </section>

        <!-- Contacto -->
        <section id="contacto" class="py-16">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800">Contáctanos</h2>
                <p class="mt-4 text-gray-600">Estamos aquí para resolver tus dudas.</p>
                <p class="mt-2 text-gray-600">Teléfono: +503 1234-5678</p>
                <p class="mt-2 text-gray-600">Correo: contacto@nuestraclinica.com</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p>&copy; 2024 Clínica Saludable. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
