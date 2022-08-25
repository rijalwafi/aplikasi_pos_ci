<?php
defined('BASEPATH') or exit('kamu tak punya akses');

class M_satuan extends CI_Model{

public function get_satuan($where = null){
    $this->db->select('*');
    $this->db->from('tb_satuan');
    if(!empty($where)){
        $this->db->where($where);
    }
    $qr = $this->db->get();
    return $qr->result();
}

public function insert_satuan($set_data){
   return $this->db->insert('tb_satuan',$set_data);

}
public function get_id_satuan($id_satuan)
{
    $cek = $this->db->get_where('tb_satuan', array('id_satuan' => $id_satuan));
    if($cek){
        foreach ($cek->result() as $data) {
            $hasil=array(
                'id_satuan' => $data->id_satuan,
                'satuan' => $data->satuan,
               
                );
        }
        return $hasil;
    }else{
        return false;
    }
}

public function del_satuan($id_satuan){
    return $this->db->delete('tb_satuan',array('id_satuan' => $id_satuan));
}

public function update_satuan($set_data,$id_satuan)
{
    return $this->db->update('tb_satuan',$set_data,array('id_satuan' => $id_satuan));
}
}

?>