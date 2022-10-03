@extends('welcome')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="border-1 border rounded-3 p-3">
                    <h2 class="mt-3">Пользователи</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">login</th>
                            <th scope="col">email</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Роль</th>
                            <th scope="col">Создан</th>
                            <th scope="col">Изменён</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="col">{{$user->id}}</th>
                                        <th scope="col">{{$user->login}}</th>
                                        <th scope="col">{{$user->email}}</th>
                                        <th scope="col">{{$user->fulltime}}</th>
                                        <th scope="col">{{$user->address}}</th>
                                        <th scope="col">{{$user->role}}</th>
                                        <th scope="col">{{$user->created_at}}</th>
                                        <th scope="col">{{$user->updated_at}}</th>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
