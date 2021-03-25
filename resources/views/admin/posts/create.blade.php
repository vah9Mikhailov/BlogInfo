@extends('admin.posts.layouts.layout')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Новый пост</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Посты</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Посты</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('posts.create')}}" class="btn btn-sm btn-neutral">New</a>
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
                        <h3 class="mb-0">Создание поста</h3>
                        <hr>
                        <div class="table-responsive border-0">
                            <table class="table align-items-center table-flush">
                                <form>
                                    <div class="form-group">
                                        <select class="custom-select mr-sm-2" id="user_id">
                                            @foreach($users as $k => $v)
                                                <option selected>Выберете автора статьи</option>
                                                <option value="{{$k}}">{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Название поста</label>
                                        <input type="name" class="form-control" id="name" placeholder="Name post">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <textarea class="form-control" id="description" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories">Категории</label>
                                        <select name="categories" id="categories" class="select2" multiple="multiple"
                                                data-placeholder="Выбор категорий" style="width: 100%;">
                                            @foreach($categories as $k => $v)
                                                <option value="{{ $k }}">{{ $v->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Теги</label>
                                        <select name="tags" id="tags" class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                                            @foreach($tags as $k => $v)
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                            </div>
                                        </div>
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
        @include('layouts.footers.auth')
    </div>
@endsection
