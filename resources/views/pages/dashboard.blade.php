@extends('layouts.admin.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">

  <div class="row">
    <div class="col-12">
      <div class="card card-background-mask-dark">
        <div class="full-background" style="background-image: url('{{ asset('assets-admin/img/ivancik.jpg') }}'); background-position: center;"></div>
        <div class="card-body text-left p-3">
          <div class="row">
            <div class="col-md-8 col-lg-7">

              <h3 class="text-pink-600 font-weight-bolder" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.6);">
                Halo, Admin.
              </h3>
              <p class="text-pink-600 text-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">
                Selamat datang kembali. Semua sistem telah siap untuk mengelola dan mempublikasikan konten Anda.
              </p>

            </div>
            <div class="col-md-4 col-lg-5 d-none d-md-block text-center">
              <img src="{{ asset('assets-admin/img/illustrations/rocket-white.png') }}" alt="rocket" style="width: 100%; max-width: 150px; margin-top: -20px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">

    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Warga</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ \App\Models\Warga::count() ?? 0 }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="material-icons-round text-lg opacity-10">groups</i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Profil</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ \App\Models\Profil::count() ?? 0 }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">

              <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                <i class="material-icons-round text-lg opacity-10">account_balance</i>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kategori Berita</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ \App\Models\KategoriBerita::count() ?? 0 }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">

              <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                <i class="material-icons-round text-lg opacity-10">article</i>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">User</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ \App\Models\User::count() ?? 0 }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">

              <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                <i class="material-icons-round text-lg opacity-10">person</i>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
