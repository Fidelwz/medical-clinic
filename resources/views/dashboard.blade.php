 @extends('adminlte::page')

@section('title', 'Dashboard')



@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content')



<div id="app">
  @yield('content-wrapper')
</div>
@stop
@section('js')



<script
src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
crossorigin="anonymous"></script>
    <script src="{{ asset('./js/test.js') }}" defer></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.js"> </script>


    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>



    @yield('scripts')
@stop  
