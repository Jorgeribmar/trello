@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="cssCard" class="card">

                    <div id="cssContent" class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Vous êtes connecté') }}, bienvenue sur Trello Premium <br>
                        <br>

                    </div>
                </div>
            </div>
        </div>


    @endsection
