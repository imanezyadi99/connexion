@extends('layouts.app')

@section('content')


<div class="loginBox"> 
    <h3> connexion </h3>
    <form action="/connexion" method="post"  class="section">
    @csrf
        <div class="inputBox">
            <label class="label" >Email </label>
            <input id="uname" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label class="label" >Password </label>
            <input id="pass" type="password" placeholder="Mot de Passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            
     <label class="label" >Signature </label>
     <div id="sign"></div>

      <br>
     <textarea name="signature" id="signature" rows="8" style="display:none"></textarea>
     <button id="clear">Supprimer signature </button>

        </div> 
        <br>
        <button type="submit" class="login-btn">
            {{ __('SE CONNECTER') }}
        </button>
        </form> 
     
      
    
</div>

@endsection
    