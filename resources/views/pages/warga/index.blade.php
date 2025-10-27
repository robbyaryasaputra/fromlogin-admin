@extends('layouts.admin.app')
@section('page-title', 'Daftar Warga')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Daftar Warga</h4>
          <a href="{{ route('warga.create') }}" class="btn btn-primary btn-action">
            <i class="material-icons opacity-10 me-1">person_add</i> Tambah Warga
          </a>
        </div>
        <div class="card-body">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Warga ID</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Telp</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($wargas as $warga)
                <tr>
                  <td>{{ $warga->warga_id }}</td>
                  <td>{{ $warga->no_ktp }}</td>
                  <td>{{ $warga->nama }}</td>
                  <td>{{ $warga->telp }}</td>
                  <td>
                    {{-- Tombol Lihat dihapus --}}
                    <a href="{{ route('warga.edit', $warga) }}" class="btn btn-sm btn-warning">
                      <i class="material-icons opacity-10">edit</i> Edit
                    </a>
                    <form action="{{ route('warga.destroy', $warga) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Hapus data?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger">
                        <i class="material-icons opacity-10">delete</i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $wargas->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
