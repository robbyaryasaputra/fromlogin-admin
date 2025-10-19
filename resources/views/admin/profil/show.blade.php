@extends('admin.admin')
@section('page-title', 'Detail Profil')

@section('content')
<style>
  .detail-avatar {
    width: 120px; height: 120px; border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    background: linear-gradient(135deg,#eef2ff,#ffffff); border: 1px solid rgba(0,0,0,0.04);
    box-shadow: 0 6px 18px rgba(15,23,42,0.04); font-size: 36px; color:#374151;
  }
  .detail-key { color:#6b7280; font-weight:600 }
  .detail-value { color:#111827 }
  .action-group .btn{ margin-left:.5rem }
</style>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header p-3 bg-gradient-info text-white d-flex align-items-center justify-content-between">
          <div>
            <h5 class="mb-0">Detail Profil Desa</h5>
            <p class="text-sm opacity-8 mb-0">Informasi profil desa secara lengkap</p>
          </div>
          <div class="action-group">
            <a href="{{ route('profil.index') }}" class="btn btn-light btn-sm">Kembali</a>
            <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('profil.destroy', $profil->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus profil ini?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 text-center">
              <div class="detail-avatar mx-auto mb-3">
                @if($profil->logo)
                  <img src="{{ asset($profil->logo) }}" alt="logo" style="max-width:100%; border-radius:50%;">
                @else
                  <i class="fa fa-home"></i>
                @endif
              </div>
              <h6 class="mb-0">{{ $profil->nama_desa }}</h6>
              <p class="text-sm text-muted">Profil ID: {{ $profil->profil_id }}</p>
            </div>
            <div class="col-md-8">
              <dl class="row">
                <dt class="col-sm-4 detail-key">Kecamatan</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->kecamatan ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Kabupaten</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->kabupaten ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Provinsi</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->provinsi ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Alamat Kantor</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->alamat_kantor ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Email</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->email ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Telepon</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->telepon ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Visi</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->visi ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Misi</dt>
                <dd class="col-sm-8 detail-value">{{ $profil->misi ?? '-' }}</dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
