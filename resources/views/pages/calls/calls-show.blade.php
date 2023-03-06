@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Chamados'])

    <div class="row mt-4 mx-4">
        <div class="card mb-4">

        </div>
        @include('layouts.footers.auth.footer')
    </div>


    @push('js')
    <script>

    </script>
    @endpush

@endsection
