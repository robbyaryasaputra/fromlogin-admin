@extends('admin.admin')
@section('page-title', 'Edit Profil')

@section('content')
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header"><h4>Edit Profil</h4></div>
    <div class="card-body">
      @if($errors->any())<div class="alert alert-danger"><ul>@foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach</ul></div>@endif
      <form action="{{ route('profil.update', $profil) }}" method="POST">
        @csrf @method('PUT')
        @include('admin.profil._form')
  <button class="btn btn-primary btn-action">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection
