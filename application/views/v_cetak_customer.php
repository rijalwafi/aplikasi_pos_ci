<style>
#customers {
  font-family: Verdana, Geneva, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size:10px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4bbbce;
  color: white;
}
</style>

<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-body">
            <p>Surya Jaya<br>Cetak pada Tgl : <?php echo date('Y-m-d')?></p>
            <table id="customers" class="" style="border-collapse: collapse; border-spacing: 0; width: 100%;font-size:12px;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Customer</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($get_customer as $val) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $val->kode_customer ?></td>
                        <td><?php echo $val->nama_customer ?></td>
                        <td><?php echo $val->alamat_customer ?></td>
                        <td><?php echo $val->no_hp;?></td>
                        <td><?php echo $val->email;?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            
        </div>
    </div>
</div> <!-- end col -->
