<form>
  <div class="form-group row">
    <label for="nik" class="col-5 col-form-label">NIK</label> 
    <div class="col-7">
      <input id="nik" name="nik" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="jenis" class="col-5 col-form-label">Jenis Cuti</label> 
    <div class="col-7">
      <select id="jenis" name="jenis" class="custom-select" required="required">
        <option value=""></option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="awal" class="col-5 col-form-label">Tanggal Awal</label> 
    <div class="col-7">
      <input id="awal" name="awal" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="akhir" class="col-5 col-form-label">Tanggal Akhir</label> 
    <div class="col-7">
      <input id="akhir" name="akhir" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Masuk" class="col-5 col-form-label">Tanggal Masuk</label> 
    <div class="col-7">
      <input id="Masuk" name="Masuk" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="status" class="col-5 col-form-label">Status</label> 
    <div class="col-7">
      <input id="status" name="status" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="ket" class="col-5 col-form-label">Keterangan</label> 
    <div class="col-7">
      <input id="ket" name="ket" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="sisa" class="col-5 col-form-label">Sisa Cuti</label> 
    <div class="col-7">
      <input id="sisa" name="sisa" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-5 col-7">
      <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>