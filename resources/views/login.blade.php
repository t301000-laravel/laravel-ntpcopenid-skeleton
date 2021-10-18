@extends('layouts.app')

@section('title', '登入')

@section('content')
    <div class="container">

        @error('email')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col order-1 order-md-0">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <h4>網站管理員登入</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">密碼</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg float-end px-5">登入</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <h4>校務行政帳號登入</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{ route('ntpcopenid.login.start') }}" method="post" id="ntpc-login">
                            @csrf
                            <img src="{{ asset('img/ntpc_logo.png') }}" class="img-fluid" id="ntpc-logo">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('style')
    <style>
        img#ntpc-logo {
            cursor: pointer;
            transition: all 150ms;
        }
        img#ntpc-logo:hover {
            transform: scale(1.2);
            transition: all 300ms;
        }
    </style>
@endsection

@section('script')
    <script>
        const f = document.getElementById('ntpc-login')
        const triggerEl = document.getElementById('ntpc-logo')

        triggerEl.addEventListener('click', () => f.submit())
    </script>
@endsection
