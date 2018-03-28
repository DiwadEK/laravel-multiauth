@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title">Zarządzanie użytkownikami</h1>
            </div>
            <div class="column">
                <a href="{{route('admins.create')}}" class="button is-primary">
                    <i class="fa fa-user-add"></i>Dodaj użytkownika
                </a>
            </div>
        </div>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nazwa</th>
                    <th>Email</th>
                    <th>Data utworzenia</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a class="button is-outlined" href="{{route('admins.edit', $user->id)}}">Edytuj</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
@endsection
