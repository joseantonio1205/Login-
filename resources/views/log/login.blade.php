@extends('plantillas.login_plantilla')

@section('title','Login | Inicio de sesión')
@section('nav_name','Login | Inicio de sesión')

@section('body')
<form action="{{route('validacion')}}" method="POST">
    <h1>Login</h1>
    <hr class="bg-success">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" required autofocus id="email" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
        <div id="passwordHelp" class="form-text"></div>
    </div>
    @csrf
    <br>
    <a href="{{route('registro_new')}}">no estas registrado?</a>
    <br>
    <br>
    <button type="submit" class="btn btn-outline-success">Aceptar</button>

</form>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('err'))
    <script>Swal.fire("las credenciales son incorrectas, vuelva a intentarlo.");</script>
    @endif
@endsection