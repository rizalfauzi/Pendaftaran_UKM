<?php
include "ms-config.php";
class UKM {
    public function __construct(Db_Class $db) {
        $this->mysqli = $db->getLink();
    }
     
    public function tampil_ukm() {
        $query="select * from tbl_ukm order by id_ukm";
        $res=$this->mysqli->query($query);
        return $res;
    }
     
     
    public function tambah_ukm($nama_role) {
        $sql = "select id_ukm from tbl_role where nama_ukm = '$nama_ukm'";
        $hasil = $this->mysqli->query($sql);
        $no_rows = $hasil->num_rows;
         
        if($no_rows == 0) {
            $query="insert into tbl_ukm (nama_ukm) 
                value ('$nama_ukm')";
            $res=$this->mysqli->query($query);
            return $res;
        }
        else {
            return false;
        }
    }
     
    public function baca_ukm($type, $id_ukm) {
        $query = "select * from tbl_ukm where id_ukm = '$id_ukm'";
        $hasil = $this->mysqli->query($query);
        $data = $hasil->fetch_array(MYSQLI_BOTH);
         
        if($type == 'id_ukm') {
            return $data['id_ukm'];
        }
        else if($type == 'nama_ukm') {
            return $data['nama_ukm'];
        }
    }
     
    public function edit_ukm($id_ukm, $nama_ukm) {
        $query = "update tbl_ukm set nama_ukm='$nama_ukm' where id_ukm = '$id_ukm'";
        $hasil = $this->mysqli->query($query);
        return $hasil;
    }
     
    public function hapus_ukm($id_role) {
        $query = "delete from tbl_ukm where id_ukm = '$id_ukm'";
        $hasil = $this->mysqli->query($query);
        return $hasil;
    }   
}
?>