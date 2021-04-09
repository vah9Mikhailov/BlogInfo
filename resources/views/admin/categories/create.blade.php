@extends('admin.layouts.layout')
<title>Argon - Создание категории</title>
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Список категорий</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Новая категория</li>
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
                        <h3 class="mb-0">Создание категории</h3>
                        <hr>
                        <div class="table-responsive border-0">
                            <table class="table align-items-center table-flush">
                                <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Название категории</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Имя категории...">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Сохранить</button>
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

