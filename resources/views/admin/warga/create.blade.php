@extends('admin.admin')
@section('page-title', 'Tambah Warga')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-8 mx-auto">
      <div class="card">
        <div class="card-header"><h4>Tambah Warga</h4></div>
        <div class="card-body">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('warga.store') }}" method="POST">
            @csrf
            @include('admin.warga._form')
            <button class="btn btn-primary btn-action">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
