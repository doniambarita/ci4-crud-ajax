<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('siswa/simpandata', ['class' => 'formsiswa']); ?>
      <div class="modal-body">
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">NIS</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nis" name="nis">
            <div class="invalid-feedback errorNis">
                
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama">
            <div class="invalid-feedback errorNama">
                
            </div>
          </div>
        </div>  
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Tempat Lahir</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="tmptlahir" name="tmptlahir">
            <div class="invalid-feedback errorTmptlahir">
                
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="tglahir" name="tglahir">
            <div class="invalid-feedback errorTglahir">
                
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
              <select name="jenkel" id="jenkel" class="form-control">
                  <option value="">-Pilih-</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
              </select>
              <div class="invalid-feedback errorJenkel">
                
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      <?= form_close() ?>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('.formsiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable');
                    $('.btnsimpan').html('Simpan');
                },
                success: function (response) {
                    if(response.error){
                        if(response.error.nis){
                            $('#nis').addClass('is-invalid');
                            $('.errorNis').html(response.error.nis);
                        }else{
                            $('#nis').removeClass('is-invalid');
                            $('.errorNis').html('');
                        }

                        if(response.error.nama){
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        }else{
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        
                        if(response.error.tmptlahir){
                            $('#tmptlahir').addClass('is-invalid');
                            $('.errorTmptlahir').html(response.error.tmptlahir);
                        }else{
                            $('#tmptlahir').removeClass('is-invalid');
                            $('.errorTmptlahir').html('');
                        }

                        if(response.error.tglahir){
                            $('#tglahir').addClass('is-invalid');
                            $('.errorTglahir').html(response.error.tglahir);
                        }else{
                            $('#nama').removeClass('is-invalid');
                            $('.errorTglahir').html('');
                        }

                        if(response.error.jenkel){
                            $('#jenkel').addClass('is-invalid');
                            $('.errorJenkel').html(response.error.jenkel);
                        }else{
                            $('#jenkel').removeClass('is-invalid');
                            $('.errorJenkel').html('');
                        }
                    }else{
                        Swal.fire({
                          icon: 'success',
                          title: 'Berhasil',
                          text: response.sukses,
                        })
                        $('#modaltambah').modal('hide');
                        datasiswa()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
</script>