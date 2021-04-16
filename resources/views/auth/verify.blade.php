@extends('auth.layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('admin.users.header.guest')
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h4>{{ __('Подтвердите email адрес') }}</h4>
                        </div>
                        @if (session('resent'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ __('Ссылка на подтверждение email повторно выслана') }}
                            </div>
                        @endif

                        <p>{{ __('Если ссылка на подтверждение email адреса не получена, отправьте заново') }}</p>

                        <form action="{{ route('verification.resend') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-8 offset-2">
                                    <button type="submit" class="btn btn-primary btn-block">Отправить повторно</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

