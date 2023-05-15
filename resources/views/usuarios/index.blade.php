@extends('layouts.layout')
@section('contenido')

    <h1>Administrar Usuarios</h1>

{{--    @include('seguridad.usuario.search')--}}

    <a href="" data-target="#modal-create-usuario" data-toggle="modal"><button class="au-btn au-btn-icon au-btn--green au-btn--small btn btn-success">
            Agregar Usuario</button></a>

    <div class="row">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Cargo</th>
                <th scope="col">Fotografia</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de Registro</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->cn}} de {{$usuario->an}}</td>
                    <td><img src="{{asset('/img/usuario/'.$usuario->Foto)}}" alt="{{$usuario->name}}" width="100px"></td>
                    <td>{{$usuario->name}}</td>
                    <td>{!!$usuario->email!!}</td>
                    <td>{{$usuario->created_at}}</td>
                    <td>
                        <a href="" data-target="#modal-update-" data-toggle="modal"><buton class="btn btn-primary">Editar</buton></a>
                        <a href="" data-target="#modal-delete-" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    </td>
                </tr>
{{--                @include('seguridad.usuario.modal')--}}
{{--                @include('seguridad.usuario.edit')--}}
            @endforeach
            </tbody>
        </table>
    </div>
{{--    @include('seguridad.usuario.create')--}}
{{--    {{$usuarios->links()}}--}}

@stop
