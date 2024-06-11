@extends('plantillas.login_plantilla')
@section('title','Registro | Nuevo usuario')
@section('nav_name','Registro | Nuevo usuario')

@section('body')
<form action="{{route('home')}}" method="POST">
    <h1>Registro</h1>
    <hr class="bg-success">
    <div class="mb-3">
        <label for="exampleInputText1" class="form-label">nombre de usuario</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="textHelp">
        <div id="textHelp" class="form-text"></div>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
        <div id="passwordHelp" class="form-text"></div>
    </div>
    @csrf
    <a href="{{(route('log_home'))}}"><button type="button" class="btn btn-outline-success">regresar</button></a>
    <button type="submit" class="btn btn-outline-success">Aceptar</button>
</form>
@endsection        