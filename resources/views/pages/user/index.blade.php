@extends('layouts.admin.app')

@section('page-title', 'Kelola User')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Daftar User</h6>
          <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">
            <i class="material-icons opacity-10 me-1">person_add</i> Tambah User
          </a>
        </div>
        <div class="card-body">
          @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($items as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td class="text-center">
                    {{-- Tombol Lihat dihapus --}}
                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-sm btn-warning">
                      <i class="material-icons opacity-10">edit</i> Edit
                    </a>
                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus user ini?')">
                      @csrf @method('DELETE')
                      <button class="btn btn-sm btn-danger">
                        <i class="material-icons opacity-10">delete</i> Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada user.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="mt-3">{{ $items->links() }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
