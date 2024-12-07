@extends('dashboard')
@section('content-wrapper')
  {{-- fullcalendar --}}
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>


<div id='calendar'></div>


@endsection