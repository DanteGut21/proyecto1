@extends('layouts.app')
@section('content')
    @if(Auth::check())
        <div class="row">
            Estas logueado
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5> Acceso no válido. Favor de iniciar sesión.</h5>
                </div>
            </div>
        </div>
    @endif
@endsection
