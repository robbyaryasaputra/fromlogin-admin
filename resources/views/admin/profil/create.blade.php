@extends('admin.admin')
@section('page-title', 'Tambah Profil')

@section('content')
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header"><h4>Tambah Profil</h4></div>
    <div class="card-body">
      @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>@endif
      <form action="{{ route('profil.store') }}" method="POST">
        @csrf
        @include('admin.profil._form')
  <button class="btn btn-primary btn-action">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection
