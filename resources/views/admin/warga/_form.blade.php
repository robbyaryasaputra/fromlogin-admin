<style>
  /* Styling khusus untuk form Warga agar kolom lebih jelas */
  .warga-form .form-control {
    background: #fff;
    border: 1px solid #e6e6e6;
    padding: .6rem .75rem;
    border-radius: .5rem;
    box-shadow: 0 1px 2px rgba(16,24,40,0.04);
  }
  .warga-form .form-label {
    color: #6b7280;
    font-weight: 600;
    margin-bottom: .5rem;
  }
  .warga-form .mb-3 { padding: .5rem; }
  .warga-form { background: #f8fafc; padding: 1rem; border-radius: .6rem; }
</style>

<div class="row warga-form">
  <div class="mb-3 col-6">
    <label class="form-label">Warga ID</label>
    <input type="text" name="warga_id" value="{{ old('warga_id', isset($warga) ? $warga->warga_id : '') }}" class="form-control" required>
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">No KTP</label>
    <input type="text" name="no_ktp" value="{{ old('no_ktp', isset($warga) ? $warga->no_ktp : '') }}" class="form-control" required>
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', isset($warga) ? $warga->nama : '') }}" class="form-control" required>
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin', isset($warga) ? $warga->jenis_kelamin : '') }}" class="form-control">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Agama</label>
    <input type="text" name="agama" value="{{ old('agama', isset($warga) ? $warga->agama : '') }}" class="form-control">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Pekerjaan</label>
    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', isset($warga) ? $warga->pekerjaan : '') }}" class="form-control">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Telp</label>
    <input type="text" name="telp" value="{{ old('telp', isset($warga) ? $warga->telp : '') }}" class="form-control">
  </div>
  <div class="mb-3 col-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" value="{{ old('email', isset($warga) ? $warga->email : '') }}" class="form-control">
  </div>
  <div class="mb-3 col-12">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control">{{ old('alamat', isset($warga) ? $warga->alamat : '') }}</textarea>
  </div>
</div>
