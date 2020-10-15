
<style>
  .my-custom-scrollbar {
  position: relative;
  width: 100%;
  overflow: auto;
  }
  .table-wrapper-scroll-y {
  display: block;
  }

/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 80vh;
    overflow-y: auto;
}

</style>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
    $('.datepicker').datepicker({
    format: 'dd/mm/yyyy'
    });
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  });
  //Date range picker
</script>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $title?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
           
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Tambah</button>
              &nbsp
              <div class="table-wrapper-scroll-x my-custom-scrollbar">
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>NIK</th>
                    <th>J.Kel</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Sosmed</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($k as $k){ ?>
                      <tr>
                        <td><?php echo $k->namakaryawan; ?></td>
                        <td><?php echo $k->namajabatan; ?></td>
                        <td><?php echo $k->nikkaryawan; ?></td>
                        <td>
                          <?php 
                            if($k->jeniskelaminkaryawan=='L'){
                              echo "Laki-laki";
                            }
                            else if($k->jeniskelaminkaryawan=='P') {
                              echo "Perempuan";
                            } 
                            else {
                              echo "-";
                            }; 
                          ?>
                        </td>
                        <td><?php echo $k->tanggallahirkaryawan; ?></td>
                        <td><?php echo $k->alamatkaryawan; ?></td>
                        <td><?php echo $k->nohpkaryawan; ?></td>
                        <td><?php echo $k->emailkaryawan; ?></td>
                        <td><?php echo $k->sosmedkaryawan; ?></td>
                        <td>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" 
                            data-id="<?php echo $k->id; ?>"
                            data-nama="<?php echo $k->namakaryawan; ?>"
                            data-jabatan="<?php echo $k->idjabatankaryawan; ?>"
                            data-nik="<?php echo $k->nikkaryawan; ?>"
                            data-jkel="<?php echo $k->jeniskelaminkaryawan; ?>"
                            data-tgllahir="<?php echo $k->tanggallahirkaryawan; ?>"
                            data-alamat="<?php echo $k->alamatkaryawan; ?>"
                            data-nohp="<?php echo $k->nohpkaryawan; ?>"
                            data-email="<?php echo $k->emailkaryawan; ?>"
                            data-sosmed="<?php echo $k->sosmedkaryawan; ?>"
                            >Edit
                          </button>                      
                        </span>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3" 
                            data-id="<?php echo $k->id; ?>"
                            data-nama="<?php echo $k->namakaryawan; ?>"                            
                            >Hapus
                          </button>
                        </td>
                      </tr>                      
                    <?php } ?>                  
                  </tbody>
                  <tfoot>
                  <tr>                  
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <script>
            $(document).ready(function () {
                $('#exampleModal2').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) // Button that triggered the modal                                    
                  var id = button.data('id')
                  var nama = button.data('nama')                  
                  var jabatan = button.data('jabatan')
                  var nik = button.data('nik')
                  var jkel = button.data('jkel')
                  var tgllahir = button.data('tgllahir')
                  var alamat = button.data('alamat')
                  var nohp = button.data('nohp')
                  var email = button.data('email')
                  var sosmed = button.data('sosmed')
                  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                  var modal = $(this)                  
                  modal.find('#ekaryawan-id').val(id)
                  modal.find('#ekaryawan-nama').val(nama)
                  
                  document.getElementById('ekaryawan-jabatan').value=jabatan;                  

                  modal.find('#ekaryawan-nik').val(nik)
                  modal.find('#ekaryawan-jkel').val(jkel)
                  modal.find('#ekaryawan-tgl').val(tgllahir)
                  modal.find('#ekaryawan-alamat').val(alamat)
                  modal.find('#ekaryawan-nohp').val(nohp)
                  modal.find('#ekaryawan-email').val(email)
                  modal.find('#ekaryawan-sosmed').val(sosmed)                  
                })

                $('#exampleModal3').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) // Button that triggered the modal                                    
                  var id = button.data('id')
                  var nama = button.data('nama')                  
                  
                  var modal = $(this)                  
                  modal.find('#dkaryawan-id').val(id)
                  modal.find('#dkaryawan-nama').html(nama)                  
                })
            });
          </script>

          <!-- Untuk tambah -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah data karyawan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method='post' action="<?php echo site_url('view/karyawan_input');?>">
                    <div class="form-group">
                      <label for="karyawan-nama" class="col-form-label">Nama:</label>
                      <input type="text" class="form-control" id="karyawan-nama" name="karyawan-nama">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Jabatan:</label>
                      <select class="form-control" id="karyawan-jabatan" name="karyawan-jabatan">
                        <?php foreach ($j as $j){ ?>
                          <option value="<?php echo $j->id; ?>" class="form-control"><?php echo $j->namajabatan; ?></option>
                          <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="karyawan-nik" class="col-form-label">NIK:</label>
                      <input type="text" class="form-control" id="karyawan-nik" name="karyawan-nik">
                    </div>

                    <div class="form-group">
                      <label for="karyawan-jkel" class="col-form-label">J.Kel:</label>                      
                      <select class="form-control" id="karyawan-jkel" name="karyawan-jkel">>
                        <option value="L" class="form-control">Laki-laki</option>
                        <option value="P" class="form-control">Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="karyawan-tgl" class="col-form-label">Tanggal Lahir:</label>                                        
                      <div class="input-group date"  data-target-input="nearest">
                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id='karyawan-tgl' name='karyawan-tgl' placeholder='dd/mm/yyyy'>
                        <div class="input-group-append" data-target="#karyawan-tgl" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="karyawan-alamat" class="col-form-label">Alamat:</label>
                      <input type="text" class="form-control" id="karyawan-alamat" name="karyawan-alamat">
                    </div>


                    <div class="form-group">
                      <label for="karyawan-nohp" class="col-form-label">No HP:</label>
                      <input type="text" class="form-control" id="karyawan-nohp" name="karyawan-nohp">
                    </div>

                    <div class="form-group">
                      <label for="karyawan-email" class="col-form-label">Email:</label>
                      <input type="text" class="form-control" id="karyawan-email" name="karyawan-email">
                    </div>

                    <div class="form-group">
                      <label for="karyawan-socmed" class="col-form-label">Socmed:</label>
                      <input type="text" class="form-control" id="karyawan-socmed" name="karyawan-sosmed">
                    </div>                                      
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- FORM -->
                </form>
              </div>
            </div>
          </div>

          <!-- Untuk EDIT DATA -->
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit data karyawan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method='post' action="<?php echo site_url('view/karyawan_edit');?>">
                    <div class="form-group">
                      <label for="ekaryawan-nama" class="col-form-label">Nama:</label>
                      <input type="text" class="form-control" id="ekaryawan-nama" name="ekaryawan-nama">
                      <input type="hidden" class="form-control" id="ekaryawan-id" name="ekaryawan-id">
                    </div>
                    <div class="form-group">
                      <label for="ekaryawan-jabatan" class="col-form-label">Jabatan:</label>
                      <select class="form-control" id="ekaryawan-jabatan" name="ekaryawan-jabatan">
                        <?php foreach ($j2 as $j2){ ?>
                          <option value="<?php echo $j2->id; ?>" class="form-control"><?php echo $j2->namajabatan; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="ekaryawan-nik" class="col-form-label">NIK:</label>
                      <input type="text" class="form-control" id="ekaryawan-nik" name="ekaryawan-nik">
                    </div>

                    <div class="form-group">
                      <label for="ekaryawan-jkel" class="col-form-label">J.Kel:</label>                      
                      <select class="form-control" id="ekaryawan-jkel" name="ekaryawan-jkel">>
                        <option value="L" class="form-control">Laki-laki</option>
                        <option value="P" class="form-control">Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="ekaryawan-tgl" class="col-form-label">Tanggal Lahir:</label>                                        
                      <div class="input-group date"  data-target-input="nearest">
                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id='ekaryawan-tgl' name='ekaryawan-tgl' placeholder='dd/mm/yyyy'>
                        <div class="input-group-append" data-target="#ekaryawan-tgl" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="ekaryawan-alamat" class="col-form-label">Alamat:</label>
                      <input type="text" class="form-control" id="ekaryawan-alamat" name="ekaryawan-alamat">
                    </div>


                    <div class="form-group">
                      <label for="ekaryawan-nohp" class="col-form-label">No HP:</label>
                      <input type="text" class="form-control" id="ekaryawan-nohp" name="ekaryawan-nohp">
                    </div>

                    <div class="form-group">
                      <label for="ekaryawan-email" class="col-form-label">Email:</label>
                      <input type="text" class="form-control" id="ekaryawan-email" name="ekaryawan-email">
                    </div>

                    <div class="form-group">
                      <label for="ekaryawan-socmed" class="col-form-label">Sosmed:</label>
                      <input type="text" class="form-control" id="ekaryawan-socmed" name="ekaryawan-sosmed">
                    </div>                                      
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <!-- FORM -->
                </form>
              </div>
            </div>
          </div>



          <div class="modal fade" id="exampleModal3" style="display: none;" aria-hidden="true">
            <form method='post' action="<?php echo site_url('view/karyawan_hapus');?>">
            <div class="modal-dialog" style='overflow-y:none;'>
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus data </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body" style='height:200px;'>
                  <input type=hidden id='dkaryawan-id' name='dkaryawan-id'>
                  <p>Apakah anda yakin menghapus data <h5 id='dkaryawan-nama'></h5></p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-outline-light">Hapus Data</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            </form>
            <!-- /.modal-dialog -->
          </div>

