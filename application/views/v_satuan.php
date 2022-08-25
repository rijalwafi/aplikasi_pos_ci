<div class="col-lg-3">
    <div class="card m-b-30">
        <div class="card-body">

            <h4 class="mt-0 header-title" id="title"></h4>
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="alert-simpan-berhasil" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Berhasil !</strong> Data Berhasil Disimpan
            </div>
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="alert-update-berhasil" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Berhasil !</strong> Data Berhasil Dirubah
            </div>
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" id="salah" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Gagal !</strong> Data Gagal Disimpan
            </div>
            
            <!-- <button id="tombol-edit">Klik</button>
            <button id="tombol-balikin">Balikin</button> -->
            <form class="" action="#" id="frm_data_barang">
                <input type="hidden" name="status" id="s" value="baru">
                <input type="hidden" name="id_satuan" id="id_satuan">
                <div class="form-group">
                    <label>Nama Satuan Barang</label>
                    <input type="text" class="form-control" required placeholder="Masukkan Nama Satuan" id="satuan" name="satuan"/>
                </div>
               
                <div class="form-group">
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" id="btn-simpan">
                            <span id="txt-proses">Tambah</span>
                        </button>
                        
                    </div>
                </div>
            </form>

        </div>
    </div>
</div> <!-- end col -->

<div class="col-lg-9">
    <div class="card m-b-30">
        <div class="card-body">

            <h4 class="mt-0 header-title">Data Satuan Barang</h4>

            <table id="datatable" class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size:12px;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>satuan</th>
                    <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($get_satuan as $val) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $val->satuan?></td>
                       
                       
                        <td>
                            <button type="button" class="btn-edit btn btn-info btn-sm" data-id="<?php echo $val->id_satuan ?>" >Edit</button>
                           
                            <a href="<?php echo base_url()?>C_satuan/hapus/<?php echo $val->id_satuan ?>" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda Ingin Menghapusnya ?')">Hapus</a>
                            
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

        </div>
    </div>
</div> <!-- end col -->
            
<script>
    $('#title').text('Tambah Satuan');
    
    var status,url;
    status = "";
    //var status_text = $('#status').val('baru');
    function clear_form() {
        $('#s').val('baru');
       
        $('#nama_satuan').val('');
      
    }



    $('#btn-simpan').on('click',function(){
        var form_data = $('#frm_data_barang').serialize();
        if($('#s').val() == "baru"){
            proses("baru",form_data);
            //console.log('status : baru => '+form_data);
        }else if($('#s').val() == "update"){
            proses("update",form_data);
            //console.log('status : update => '+form_data);
        }
    });

    $('.btn-edit').on('click',function () {
       var id_satuan = $(this).attr("data-id");
       //alert(kd_barang);
       $('#title').text('Edit Satuan');
       $('#s').val('update');
       $('#txt-proses').text('Rubah');
      
       //console.log(kd_barang);
       $.ajax({
            type: 'GET',
            url: "<?php echo base_url()?>C_satuan/get_data/"+id_satuan,
            dataType : "JSON",
            beforeSend: function() {
                // setting a timeout
               
            },
            success: function(data) {
                //var hasil = JSON.parse(data);
                
                $.each(data,function(id_satuan,satuan){
                   console.log(data)
                    $('#id_satuan').val(data.id_satuan);
                    $('#satuan').val(data.satuan);

                });
            },
            error: function(xhr) { // if error occured
               
            },
            complete: function() {
                
            }
        });
    });


    function proses(status,form_data) {
    //    alert(form_data);
        if(status == "baru"){
            url = "<?php echo base_url()?>C_satuan/simpan";
            console.log(url+" ads"+form_data);
        }else if(status == "update"){
            url = "<?php echo base_url()?>C_satuan/rubah";
            console.log(url+" ads"+form_data);
        }
        $.ajax({
            type: 'POST',
            url: url,
            data: form_data,
            beforeSend: function() {
                // setting a timeout
               
            },
            success: function(data) {
                console.log(data);
                var hasil = JSON.parse(data);
                if(hasil.status == "sukses"){
                    $('#alert-simpan-berhasil').show();
                    clear_form(); 
                    setTimeout(function() {
                        window.location.reload();
                    },0);
                }else if(hasil.status == "sukses-update"){
                    $('#alert-update-berhasil').show();
                    clear_form(); 
                    setTimeout(function() {
                        window.location.reload();
                    },0);
                }else if(hasil.status == "gagal"){
                    $('#salah').show();
                    clear_form();
                }
            },
            error: function(xhr) { // if error occured
               
            },
            complete: function() {
                
            }
        });
    }

    

</script>