
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
    height: 20vh;
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
                    <th>Nama Jabatan</th>                  
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($j as $j){ ?>
                      <tr>                        
                        <td><?php echo $j->namajabatan; ?></td>                                                
                        <td>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" 
                            data-id="<?php echo $j->id; ?>"                            
                            data-jabatan="<?php echo $j->namajabatan; ?>"
                            >Edit
                          </button>                      
                        </span>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3" 
                            data-id="<?php echo $j->id; ?>"
                            data-jabatan="<?php echo $j->namajabatan; ?>"
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
                  var jabatan = button.data('jabatan')
                  
                  var modal = $(this)                  
                  modal.find('#ejabatan-id').val(id)
                  modal.find('#ejabatan-jabatan').val(jabatan)                  
                  modal.find('#ejabatan-jabatan').focus(); 
                })

                $('#exampleModal3').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget) // Button that triggered the modal                                    
                  var id = button.data('id')                  
                  var jabatan = button.data('jabatan')
                  
                  var modal = $(this)                  
                  modal.find('#djabatan-id').val(id)
                  modal.find('#djabatan-jabatan').html(jabatan)
                })
            });
          </script>

          <!-- Untuk tambah -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah data jabatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method='post' action="<?php echo site_url('view/jabatan_input');?>">
                    <div class="form-group">
                      <label for="jabatan-jabatan" class="col-form-label">Jabatan:</label>
                      <input type="text" class="form-control" id="jabatan-jabatan" name="jabatan-jabatan">
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit data Jabatan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method='post' action="<?php echo site_url('view/jabatan_edit');?>">
                    <div class="form-group">
                      <label for="ejabatan-nama" class="col-form-label">Nama:</label>
                      <input type="text" class="form-control" id="ejabatan-jabatan" name="ejabatan-jabatan">
                      <input type="hidden" class="form-control" id="ejabatan-id" name="ejabatan-id">
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
            <form method='post' action="<?php echo site_url('view/jabatan_hapus');?>">
            <div class="modal-dialog" style='overflow-y:none;'>
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus data </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body" style='height:200px;'>
                  <input type=hidden id='djabatan-id' name='djabatan-id'>
                  <p>Apakah anda yakin menghapus data <h5 id='djabatan-jabatan'></h5></p>
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

