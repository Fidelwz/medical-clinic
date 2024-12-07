@extends('dashboard')
@section('content-wrapper')
  {{-- fullcalendar --}}
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

  <div id="calendar"></div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
      
      // Inicializar el calendario
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', // Vista inicial (mes)
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        selectable: true, // Permitir seleccionar fechas
        selectHelper: true, // Visualizar selección de fechas
        locale: 'es', // Localización en español
        editable: true, // Hacer eventos arrastrables
        dayMaxEvents: true, // Limitar eventos por día
  
        // Manejo de la selección de fecha
        select: function(info) {
          // Mostrar alerta al seleccionar una fecha o rango
          Swal.fire({
            title: 'Seleccionar fecha',
            html: `Has seleccionado del <b>${info.startStr}</b> al <b>${info.endStr}</b>.`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Apartar fecha',
            cancelButtonText: 'Cancelar',
          }).then((result) => {
            if (result.isConfirmed) {
              // Agregar un evento al calendario para marcar la selección
              calendar.addEvent({
                title: 'Reservado', // Título del evento
                start: info.startStr, // Fecha de inicio
                end: info.endStr, // Fecha de fin
                color: '#28a745', // Color verde para marcar la fecha
              });
  
              Swal.fire('¡Hecho!', 'La fecha ha sido apartada y marcada en el calendario.', 'success');
              console.log("Fecha seleccionada:", info.startStr, info.endStr);
            } else {
              calendar.unselect(); // Limpiar selección
            }
          });
        },
      });
  
      calendar.render();
    });
  </script>
  
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
  


<div id='calendar'></div>


@endsection