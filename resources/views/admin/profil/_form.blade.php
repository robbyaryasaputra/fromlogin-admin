<style>
  /* Styling khusus untuk form Profil agar kolom lebih jelas */
  .profil-form .form-control {
    background: #fff;
    border: 1px solid #e6e6e6;
    padding: .6rem .75rem;
    border-radius: .5rem;
    box-shadow: 0 1px 2px rgba(16,24,40,0.04);
  }
  .profil-form .form-label {
    color: #6b7280;
    font-weight: 600;
    margin-bottom: .5rem;
  }
  .profil-form .mb-3 { padding: .5rem; }
  .profil-form { background: #f8fafc; padding: 1rem; border-radius: .6rem; }
</style>

<div class="row profil-form">
  <div class="mb-3 col-6">
    <label class="form-label">Profil ID</label>
    <input type="text" name="profil_id" class="form-control" value="{{ old('profil_id', isset($profil) ? $profil->profil_id : '') }}" required>
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Nama Desa</label>
    <input type="text" name="nama_desa" class="form-control" value="{{ old('nama_desa', isset($profil) ? $profil->nama_desa : '') }}">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Kecamatan</label>
    <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan', isset($profil) ? $profil->kecamatan : '') }}">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Kabupaten</label>
    <input type="text" name="kabupaten" class="form-control" value="{{ old('kabupaten', isset($profil) ? $profil->kabupaten : '') }}">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Provinsi</label>
    <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi', isset($profil) ? $profil->provinsi : '') }}">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Alamat Kantor</label>
    <input type="text" name="alamat_kantor" class="form-control" value="{{ old('alamat_kantor', isset($profil) ? $profil->alamat_kantor : '') }}">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', isset($profil) ? $profil->email : '') }}">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Telepon</label>
    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', isset($profil) ? $profil->telepon : '') }}">
  </div>
  <div class="mb-3 col-12">
    <label class="form-label">Visi</label>
    <textarea name="visi" class="form-control">{{ old('visi', isset($profil) ? $profil->visi : '') }}</textarea>
  </div>
  <div class="mb-3 col-12">
    <label class="form-label">Misi</label>
    <textarea name="misi" class="form-control">{{ old('misi', isset($profil) ? $profil->misi : '') }}</textarea>
  </div>
  <div class="mb-3 col-12">
    <label class="form-label">Logo (path)</label>
    <input type="text" name="logo" class="form-control" value="{{ old('logo', isset($profil) ? $profil->logo : '') }}">
  </div>
</div>
