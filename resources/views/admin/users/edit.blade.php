@extends('admin.layouts.layout')
<title>Argon - Редактирование профиля</title>

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Cостав администрации</a></li>
                                <li class="breadcrumb-item active" aria-current="page">"{{$user->name}}"</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h2 class="mb-0">Создание поста</h2>
                        <hr>
                        <div class="table-responsive border-0 overflow-hidden">
                            <table class="table align-items-center table-flush">
                                <form method="post" action="{{ route('users.update',['user' => $user->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Ник пользователя</label>
                                        <input type="text" class="form-control"
                                               id="name" name="name" value="{{$user->name}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="text" class="form-control"
                                               id="email" name="email" value="{{$user->email}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Роль</label>
                                        <select class="form-control" data-toggle="select" id="role_id" name="role_id">
                                            @foreach($roles as $k => $v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Сохранить
                                        </button>
                                    </div>
                                </form>
                            </table>
                        </div>
                    </div>
                    <!-- Light table -->

                    <!-- Card footer -->
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('auth.layouts.footers.auth')
    </div>
@endsection


