@extends('admin.posts.layouts.layout')

@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Теги</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Теги</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{route('tags.create')}}" class="btn btn-sm btn-neutral">Создать</a>
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
                        <h3 class="mb-0">Список тегов</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Название</th>
                                <th scope="col" class="sort" data-sort="slug">Slug</th>
                                <th scope="col" class="sort" data-sort="created_At">Создано</th>
                                <th scope="col" class="sort" data-sort="updated_at">Обновлено</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            @foreach($tags as $tag)
                                <tbody class="list">
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$tag->name}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm">{{$tag->slug}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span
                                                    class="name mb-0 text-sm">{{$tag->created_at->format('H:i:s, d.m.Y')}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span
                                                    class="name mb-0 text-sm">{{$tag->updated_at->format('H:i:s, d.m.Y')}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <a href="{{ route('tags.edit', ['tag'=> $tag->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('tags.destroy',['tag' => $tag->id])}}"
                                              method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </form>
                                    </th>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- Card footer -->

                        <div class="pagination py-4 flex-row-reverse">
                            <nav aria-label="...">
                                <ul class="pagination mb-0 mr-auto p-2">
                                    {{$tags->links()}}
                                </ul>
                            </nav>
                        </div>

                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

