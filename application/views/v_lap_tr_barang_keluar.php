<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="col-lg-12">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Awal</label> 
                                <input type="date" class="form-control" required="" name="tgl_awal">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tanggal Akhir</label> 
                                <input type="date" class="form-control" required="" name="tgl_akhir">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>&nbsp;</label> <br>
                                <button type="submit" class="btn btn-md btn-info"><span class="fas fa-search"></span></button> 
                                <a href="<?php echo base_url('lap/trmasuk') ?>" class="btn btn-md btn-warning">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <table id="datatable" class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Tr Keluar</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah Keluar </th>
                    
                    <th>Tgl Tr Keluar</th>
                  
                    <th>Input Oleh</th>
                    
                </tr>
                </thead>


                <tbody>
                <?php $no = 1; foreach ($get_penjualan as $val) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $val->id_tr_k;?></td>
                        <td><?php echo $val->kd_barang;?></td>
                        <td><?php echo $val->nama_barang;?></td>
                        <td><?php echo $val->harga_barang;?></td>
                        <td><?php echo $val->jumlah_beli;?></td>
                        <td><?php echo $val->tgl_tr_k; ?></td>
                      
                        <td><?php echo $val->username;?></td>
                       
                    </tr>
                <?php }?>
                </tbody>
            </table>
             <?php 
                $tgl_awal = null;
                $tgl_akhir = null;
                if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
                    $tgl_awal = $_GET['tgl_awal'];
                    $tgl_akhir = $_GET['tgl_akhir'];
            ?>
                <a href="<?php echo base_url()?>C_laporan/cetak_trkeluar?tgl_awal=<?php echo $tgl_awal ?>&tgl_akhir=<?php echo $tgl_akhir?>" target="_blank" class="btn btn-info btn-md"><i class="fa fa-print"></i> Cetak PDF</a>
                <a href="<?php echo base_url()?>C_laporan/cetak_excel_tr_keluar?tgl_awal=<?php echo $tgl_awal ?>&tgl_akhir=<?php echo $tgl_akhir?>" target="_blank" class="btn btn-info btn-md"><i class="fa fa-file-excel"></i> Cetak Excel</a>
            <?php } else { ?>
                <a href="<?php echo base_url()?>C_laporan/cetak_trkeluar" target="_blank" class="btn btn-info btn-md"><i class="fa fa-print"></i> Cetak PDF</a>
                <a href="<?php echo base_url()?>C_laporan/cetak_excel_tr_keluar" target="_blank" class="btn btn-info btn-md"><i class="fa fa-file-excel"></i> Cetak Excel</a>
            <?php } ?>
        </div>
    </div>
</div> <!-- end col -->
            


