@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  {{ session('error') }}
                </div>
              </div>
            @endif

            <div class="alert alert-danger" role="alert">
                {{ __('You are logged in!') }}
                <br>
                Using google email : {{ Auth::user()->email }}
            </div>

            @if ($submission != null)
                <div class="alert alert-success" role="alert">
                    PENGAJUAN ANDA BERHASIL
                    <br>
                    SILAHKAN CEK KEMBALI AKUN SMARTCAMPUS ANDA
                    <br>
                    JIKA ADA MASALAH, SILAHKAN DATANG KE KANTOR TIPD
                    <br><br>

                    <h4>NAMA : {{ $submission->name }}</h4>
                    <h4>NIM : {{ $submission->nim }}</h4>
                    <h4>SKS SEBELUMNYA : {{ $submission->sks_old }}</h4>
                    <h4>SKS SEHARUSNYA : {{ $submission->sks_new }}</h4>
                </div>
            @else
                
            <div class="card">
                <div class="card-header">{{ __('FORM PERBAIKAN JUMLAH SKS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('submission.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">NAMA</label>
                          <input type="name" class="form-control" id="name" name="name" required>
                          <div id="name" class="form-text text-danger">Pastikan nama yang diinput dengan BENAR</div>
                        </div>
                        <div class="mb-3">
                          <label for="nim" class="form-label">NIM</label>
                          <input type="nim" class="form-control" id="nim" name="nim" required>
                          <div id="nim" class="form-text text-danger">Pastikan nama yang diinput dengan BENAR</div>
                        </div>
                        <div class="mb-3">
                          <label for="sks_old" class="form-label">SKS SEBELUMNYA</label>
                          <input type="sks_old" class="form-control" id="sks_old" name="sks_old" required>
                          <div id="sks_old" class="form-text text-danger">Pastikan sks sebelumnya yang diinput dengan BENAR</div>
                        </div>
                        <div class="mb-3">
                          <label for="sks_new" class="form-label">SKS YANG SEHARUSNYA</label>
                          <input type="sks_new" class="form-control" id="sks_new" name="sks_new" required>
                          <div id="sks_new" class="form-text text-danger">Pastikan sks seharusnya yang diinput dengan BENAR</div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>
@endsection
