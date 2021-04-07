@extends('admin.layouts.layout')
<title>Argon - Редактирование поста</title>

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
                                <li class="breadcrumb-item"><a href="{{route('posts.index')}}">Список постов</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Пост "{{$post->name}}"</li>
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
                                <form method="post" action="{{ route('posts.update',['post' => $post->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Автор поста</label>
                                        <select class="form-control" data-toggle="select" id="user_id" name="user_id">
                                            @foreach($users as $k => $v)
                                                <option value="{{$k}}" @if( $k == $post->user_id) selected @endif>{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Название поста</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" placeholder="Name post" name="name" value="{{$post->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  id="description" rows="5" name="description">{{$post->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="categories">Категории</label>
                                        <select name="categories[]" id="categories"
                                                class="form-control" multiple="multiple"
                                                title="Выбор категорий" style="width: 100%;">
                                            @foreach($categories as $k => $v)
                                                <option value="{{ $k }}" @if(in_array($k, $post->categories->pluck('id')->all())) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Теги</label>
                                        <select name="tags[]" id="tags"
                                                class="form-control" multiple
                                                title="Выбор тегов" style="width: 100%;">
                                            @foreach($tags as $k => $v)
                                                <option value="{{ $k }}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Изображение</label>
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="custom-file-input"
                                                   id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Select file</label>
                                        </div>
                                        <div>
                                            <img src="{{ $post->getImage() }}"  alt="" class="img-thumbnail" width="150" height="161">
                                        </div>
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
        @include('layouts.footers.auth')
    </div>
@endsection


