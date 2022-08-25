<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\IOFactory;
class C_laporan extends CI_Controller {

     
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status_login') != "login"){
            redirect(base_url('login'));
        };
        $this->load->model('M_barang');
    }
    

    public function lap_customer()
    {
        $data['title'] = "Laporan Customer";
        $data['content'] = "v_lap_customer";
        $data['get_customer'] = $this->M_barang->get_customer();
        $this->load->view('v_masterpage',$data);
    }

    public function lap_barang()
    {
        $data['title'] = "Laporan Master Barang";
        $data['content'] = "v_lap_barang";
        $data['get_barang'] = $this->M_barang->get_barang();
        $this->load->view('v_masterpage',$data);
    }

    public function lap_tr_barang_masuk()
    {
        $data['title'] = "Laporan Transaksi Barang Masuk";
        $data['content'] = "v_lap_tr_barang_masuk";
        $tgl_awal = null;
        $tgl_akhir = null;
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
        }
        $data['get_tr'] = $this->M_barang->get_tr_barang($tgl_awal,$tgl_akhir);
        $this->load->view('v_masterpage',$data);
    }

    public function lap_tr_barang_keluar()
    {
        $data['title'] = "Laporan Transaksi Barang Keluar";
        $data['content'] = "v_lap_tr_barang_keluar";
        $tgl_awal = null;
        $tgl_akhir = null;
         if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
        }
        $data['get_penjualan'] = $this->M_barang->get_tr_jual_barang($tgl_awal,$tgl_akhir);
        $this->load->view('v_masterpage',$data);
    }

    public function cetak_customer()
    {
        $url = base_url();
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader('Laporan Customer||');
        $mpdf->SetFooter('Halaman||{PAGENO}');

        $mpdf->defaultfooterfontsize=9;
        $mpdf->defaultfooterfontstyle='serif';
        $mpdf->defaultfooterline=2;

        $data['get_customer'] = $this->M_barang->get_customer();
		$html = $this->load->view('v_cetak_customer', $data, TRUE);
        $mpdf->WriteHTML($html);
        
		$mpdf->Output();
    }

    public function cetak_excel_customer(){
   
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();
        $style = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );
        // manually set table data value
        // $sheet->setCellValue('A1', 'Gipsy Danger'); 
        // $sheet->setCellValue('A2', 'Gipsy Avenger');
        // $sheet->setCellValue('A3', 'Striker Eureka');
        $customer=$this->M_barang->get_customer();
      
        foreach(range('A',$spreadsheet->getActiveSheet()->getHighestColumn()) as $col){
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(TRUE);
           
        }
        $spreadsheet->getActiveSheet()->mergeCells("A1:F1");
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($style);
        // $spreadsheet->getActiveSheet()->mergeCells("A1:A2");
        $sheet->setCellValue('A2','Kode Customer');
        $sheet->setCellValue('A1','Data Customer');
        $sheet->setCellValue('B2','Nama ');
        $sheet->setCellValue('C2','alamat ');
        $sheet->setCellValue('D2','No HP ');
        $sheet->setCellValue('E2','Email ');
      
       

        // for($i='A';$i !=$spreadsheet->getActiveSheet()->getHighestColumn();$i++){
        //     $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        // }
      
        $row=3;
     
        foreach($customer as $val){
            $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A'.$row,$val->kode_customer);
            $sheet->SetCellValue('B'.$row,$val->nama_customer);
            $sheet->setCellValue('C'.$row,$val->alamat_customer);
            $sheet->setCellValue('D'.$row,$val->no_hp);
            $sheet->setCellValue('E'.$row,$val->email);
            $row++;
        }

        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'data-customer.xlsx'; // set filename for excel file to be exported
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename); 
        header('Cache-Control: max-age=0');
      
        $writer->save('php://output');	// download file
    }

    public function cetak_barang()
    {
        $url = base_url();
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader('Laporan Barang||');
        $mpdf->SetFooter('Halaman||{PAGENO}');

        $mpdf->defaultfooterfontsize=9;
        $mpdf->defaultfooterfontstyle='serif';
        $mpdf->defaultfooterline=2;

        $data['get_barang'] = $this->M_barang->get_barang();
		$html = $this->load->view('v_cetak_barang', $data, TRUE);
        $mpdf->WriteHTML($html);
        
		$mpdf->Output();
    }
    public function cetak_excel_barang(){
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();
        $style = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );
        // manually set table data value
        // $sheet->setCellValue('A1', 'Gipsy Danger'); 
        // $sheet->setCellValue('A2', 'Gipsy Avenger');
        // $sheet->setCellValue('A3', 'Striker Eureka');
        $barang=$this->M_barang->get_barang();
      
        foreach(range('A',$spreadsheet->getActiveSheet()->getHighestColumn()) as $col){
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(TRUE);
           
        }
        $spreadsheet->getActiveSheet()->mergeCells("A1:F1");
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($style);
        // $spreadsheet->getActiveSheet()->mergeCells("A1:A2");
        $sheet->setCellValue('A2','Kode Barang');
        $sheet->setCellValue('A1','Datra Barang');
        $sheet->setCellValue('B2','Nama Barang');
        $sheet->setCellValue('C2','Satuan');
        $sheet->setCellValue('D2','keterangan ');
        $sheet->setCellValue('E2','Harga Barang ');
        $sheet->setCellValue('F2','stok awal');
        $sheet->setCellValue('G2','stok akhir');
      
       

        // for($i='A';$i !=$spreadsheet->getActiveSheet()->getHighestColumn();$i++){
        //     $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        // }
      
        $row=3;
     
        foreach($barang as $val){
            $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A'.$row,$val->kd_barang);
            $sheet->SetCellValue('B'.$row,$val->nama_barang);
            $sheet->SetCellValue('C'.$row,$val->satuan);
            $sheet->setCellValue('D'.$row,$val->keterangan);
            $sheet->setCellValue('E'.$row,$val->harga_barang);
            $sheet->setCellValue('F'.$row,$val->stok_awal);
            $sheet->setCellValue('G'.$row,$val->stok_akhir);
            $row++;
        }

        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'data-barang.xlsx'; // set filename for excel file to be exported
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'.$filename); 
        header('Cache-Control: max-age=0');
      
        $writer->save('php://output');	// download file
    }

    public function cetak_trmasuk()
    {
        $url = base_url();
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader('Laporan Transaksi Barang Masuk||');
        $mpdf->SetFooter('Halaman||{PAGENO}');

        $mpdf->defaultfooterfontsize=9;
        $mpdf->defaultfooterfontstyle='serif';
        $mpdf->defaultfooterline=2;
        $tgl_awal = null;
        $tgl_akhir = null;
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
        }
        $data['get_tr'] = $this->M_barang->get_tr_barang($tgl_awal,$tgl_akhir);
		$html = $this->load->view('v_cetak_trmasuk', $data, TRUE);
        $mpdf->WriteHTML($html);
        
		$mpdf->Output();
    }
    public function cetak_excel_tr_masuk(){
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();
        $tgl_awal = null;
        $tgl_akhir = null;
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
        }
        $tr_barang_masuk = $this->M_barang->get_tr_barang($tgl_awal,$tgl_akhir);
        $style = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );
        // manually set table data value
        // $sheet->setCellValue('A1', 'Gipsy Danger'); 
        // $sheet->setCellValue('A2', 'Gipsy Avenger');
        // $sheet->setCellValue('A3', 'Striker Eureka');
        $customer=$this->M_barang->get_customer();
      
        foreach(range('A','G') as $col){
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(TRUE);
           
        }
        $spreadsheet->getActiveSheet()->mergeCells("A1:G1");
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($style);
        // $spreadsheet->getActiveSheet()->mergeCells("A1:A2");
        $sheet->setCellValue('A1','Data Barang Masuk');
        $sheet->setCellValue('A2','Kode Barang Masuk');
        $sheet->setCellValue('B2','Kode Barang ');
        $sheet->setCellValue('C2','Nama Barang ');
        $sheet->setCellValue('D2','Harga Barang ');
        $sheet->setCellValue('E2','Jumlah Masuk ');
        $sheet->setCellValue('F2','Tanggal Masuk ');
        
        $sheet->setCellValue('G2','di input oleh ');
        
      
       

        // for($i='A';$i !=$spreadsheet->getActiveSheet()->getHighestColumn();$i++){
        //     $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        // }
      
        $row=3;
     
        foreach($tr_barang_masuk as $val){
            $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A'.$row,$val->id_tr_m);
            $sheet->setCellValue('B'.$row,$val->kd_barang);
            $sheet->setCellValue('C'.$row,$val->nama_barang);
            $sheet->setCellValue('D'.$row,$val->harga_barang);
            $sheet->setCellValue('E'.$row,$val->jumlah_masuk);
            $sheet->SetCellValue('F'.$row,$val->tgl_tr_m);
            $sheet->setCellValue('G'.$row,$val->username);
            
            $row++;
        }

        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'data-barang-masuk'; // set filename for excel file to be exported
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
        header('Content-Disposition: attachment;filename="'.$filename.'_'.$tgl_awal.'-'.$tgl_akhir.'.xlsx'); 
        }else{
            header('Content-Disposition: attachment;filename="'.$filename.'.xlsx'); 
        }
        header('Cache-Control: max-age=0');
      
        $writer->save('php://output');	// download file
    }

    public function cetak_trkeluar()
    {
        $url = base_url();
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader('Laporan Transaksi Barang Keluar||');
        $mpdf->SetFooter('Halaman||{PAGENO}');

        $mpdf->defaultfooterfontsize=9;
        $mpdf->defaultfooterfontstyle='serif';
        $mpdf->defaultfooterline=2;
        $tgl_awal = null;
        $tgl_akhir = null;
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
        }
        
        $data['get_penjualan'] = $this->M_barang->get_tr_jual_barang($tgl_awal,$tgl_akhir);
		$html = $this->load->view('v_cetak_trkeluar', $data, TRUE);
        $mpdf->WriteHTML($html);
        
		$mpdf->Output();
    }
    public function cetak_excel_tr_keluar(){
        $spreadsheet = new Spreadsheet(); // instantiate Spreadsheet

        $sheet = $spreadsheet->getActiveSheet();
        $tgl_awal = null;
        $tgl_akhir = null;
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
            $tgl_awal = $this->input->get('tgl_awal');
            $tgl_akhir = $this->input->get('tgl_akhir');
        }
        $tr_barang_keluar = $this->M_barang->get_tr_jual_barang($tgl_awal,$tgl_akhir);
        $style = array(
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            )
        );
        // manually set table data value
        // $sheet->setCellValue('A1', 'Gipsy Danger'); 
        // $sheet->setCellValue('A2', 'Gipsy Avenger');
        // $sheet->setCellValue('A3', 'Striker Eureka');
        $customer=$this->M_barang->get_customer();
      
        foreach(range('A','F') as $col){
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(TRUE);
           
        }
        $spreadsheet->getActiveSheet()->mergeCells("A1:G1");
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($style);
        // $spreadsheet->getActiveSheet()->mergeCells("A1:A2");
        $sheet->setCellValue('A1','Data Barang Keluar');
        $sheet->setCellValue('A2','Kode Barang Keluar');
        $sheet->setCellValue('B2','Kode Barang ');
        $sheet->setCellValue('C2','Nama Barang');
        $sheet->setCellValue('D2','Harga Barang');
        $sheet->setCellValue('E2','Jumlah Keluar');
        $sheet->setCellValue('F2','tanggal Keluar');
        $sheet->setCellValue('G2','di input oleh ');
        
      
       

        // for($i='A';$i !=$spreadsheet->getActiveSheet()->getHighestColumn();$i++){
        //     $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        // }
      
        $row=3;
     
        foreach($tr_barang_keluar as $val){
            $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A'.$row,$val->id_tr_k);
            $sheet->SetCellValue('B'.$row,$val->kd_barang);
            $sheet->setCellValue('C'.$row,$val->nama_barang);
            $sheet->setCellValue('D'.$row,$val->harga_barang);
            $sheet->setCellValue('E'.$row,$val->jumlah_beli);
            $sheet->setCellValue('F'.$row,$val->tgl_tr_k);
            $sheet->setCellValue('G'.$row,$val->username);
            
            $row++;
        }

        
        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
 
        $filename = 'data-barang-keluar'; // set filename for excel file to be exported
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        if(isset($_GET['tgl_awal']) && isset($_GET['tgl_akhir'])){
        header('Content-Disposition: attachment;filename="'.$filename.'_'.$tgl_awal.'-'.$tgl_akhir.'.xlsx'); 
        }else{
            header('Content-Disposition: attachment;filename="'.$filename.'.xlsx'); 
        }
        header('Cache-Control: max-age=0');
      
        $writer->save('php://output');	// download file
    }


}

/* End of file C_laporan.php */
