@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card text-center">
                <div class="card-body">
                    <!-- tambahkan script di bawah ini untuk membuat tombol signin google -->
                    <a class="btn btn-danger" href="{{ '/auth/redirect'}}">Login dengan akun google</a>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
