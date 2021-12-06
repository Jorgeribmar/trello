@extends('layouts.app')

@section('content')

<div class="profilePage">
        <h1 class="profileTitle">Edition du profil</h1>
        <div id="profileCard" style="width: 30rem; height: 30rem;">
            <form action="{{route('profile.update', $profileIdFront)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" >{{ __('Name') }}</label><br>
                    <input id="name" type="text" class="form-control 
                    @error('name') is-invalid 
                    @enderror" name="name" value="{{$profileName}}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" >{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control 
                    @error('email') is-invalid 
                    @enderror" name="email" value="{{$profileEmail}}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" >{{ __('Password') }}</label><br>
                    <input id="password" type="password" class="form-control 
                    @error('password') is-invalid 
                    @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="password-confirm" >{{ __('Confirm Password') }}</label><br>
                    
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    
                </div>
                
        <!--boutons -->
            <div id="EditprofileButtons" class="card-body">
                <button type="submit" class="btn btn-info">Mettre à jour</button>
                <a class="btn btn-dark" href="{{route('profile.show', $profileIdFront)}}">Retour</a>
                
            </form>
            
                <form action="{{route('profile.destroy', $profileIdFront)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer profil</button>
                </form>
            </div>
        </div>
</div>

@endsection
