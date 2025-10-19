@extends('admin.admin')
@section('page-title', 'Daftar Profil')

@section('content')
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h4>Daftar Profil</h4>
  <a href="{{ route('profil.create') }}" class="btn btn-primary btn-action">Tambah Profil</a>
    </div>
    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr><th>#</th><th>Profil ID</th><th>Nama Desa</th><th>Kabupaten</th><th>Aksi</th></tr>
          </thead>
          <tbody>
            @foreach($profils as $profil)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $profil->profil_id }}</td>
              <td>{{ $profil->nama_desa }}</td>
              <td>{{ $profil->kabupaten }}</td>
              <td>
                <a href="{{ route('profil.show', $profil) }}" class="btn btn-sm btn-info">Lihat</a>
                <a href="{{ route('profil.edit', $profil) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('profil.destroy', $profil) }}" method="POST" style="display:inline-block">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $profils->links() }}
    </div>
  </div>
</div>
@endsection
