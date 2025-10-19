@extends('admin.admin')
@section('page-title', 'Detail Warga')

@section('content')
<style>
  /* Small styles for nicer detail card */
  .detail-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg,#f3f4f6,#ffffff);
    border: 1px solid rgba(0,0,0,0.04);
    box-shadow: 0 6px 18px rgba(15,23,42,0.06);
    font-size: 42px;
    color: #4b5563;
  }
  .detail-key { color: #6b7280; font-weight:600; }
  .detail-value { color: #111827; }
  .action-group .btn { margin-left: .5rem; }
</style>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header p-3 bg-gradient-primary text-white d-flex align-items-center justify-content-between">
          <div>
            <h5 class="mb-0">Detail Warga</h5>
            <p class="text-sm opacity-8 mb-0">Informasi lengkap warga</p>
          </div>
          <div class="action-group">
            <a href="{{ route('warga.index') }}" class="btn btn-light btn-sm">Kembali</a>
            <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('warga.destroy', $warga->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            
              <h6 class="mb-0">{{ $warga->nama }}</h6>
              <p class="text-sm text-muted">ID: {{ $warga->warga_id }}</p>
            </div>
            <div class="col-md-8">
              <dl class="row">
                <dt class="col-sm-4 detail-key">No KTP</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->no_ktp ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Jenis Kelamin</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->jenis_kelamin ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Agama</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->agama ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Pekerjaan</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->pekerjaan ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Telepon</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->telp ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Email</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->email ?? '-' }}</dd>

                <dt class="col-sm-4 detail-key">Alamat</dt>
                <dd class="col-sm-8 detail-value">{{ $warga->alamat ?? '-' }}</dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
