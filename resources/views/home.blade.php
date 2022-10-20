@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        </div>
        <ul id="video-list">
            @foreach($videos as $video)
                <li class="video-item col-md4-pull-left">
                    <!-- imagen del video -->
                    <div class="data">
                        <h4> {{$video->title}}</h4>
                    </div>
                </li>
            @endforeach
        </ul>
        {{$videos->links()}}
    </div>

@endsection
