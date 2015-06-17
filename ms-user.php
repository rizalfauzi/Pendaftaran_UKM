<?php
include "ms-config.php";
class User {
    public function __construct(Db_Class $db) {
        $this->mysqli = $db->getLink();
    }
     
    public function tampil_user() {
        $query="select * from tbl_user u join tbl_ukm r on u.id_ukm=r.id_ukm order by id_user desc";
        $res=$this->mysqli->query($query);
        return $res;
    }
     
     
    public function tambah_user($id_ukm,$username,$password) {
        $sql = "select id_user from tbl_user where username = '$username'";
        $hasil = $this->mysqli->query($sql);
        $no_rows = $hasil->num_rows;
         
        if($no_rows == 0) {
            $query="insert into tbl_user (id_ukm,username,password) 
                value ('$id_ukm','$username','$password')";
            $res=$this->mysqli->query($query);
            return $res;
        }
        else {
            return false;
        }
    }
     
    public function baca_user($type, $id_user) {
        $query = "select * from tbl_user where id_user = '$id_user'";
        $hasil = $this->mysqli->query($query);
        $data = $hasil->fetch_array(MYSQLI_BOTH);
         
        if($type == 'id_user') {
            return $data['id_user'];
        }
        else if($type == 'id_ukm'){
            return $data['id_ukm'];
        }
        else if($type == 'username') {
            return $data['username'];
        }
        else if($type == 'password'){
            return $data['password'];
        }
    }
     
    public function edit_user($id_user,$id_ukm,$username,$password) {
        $query = "update tbl_user set id_ukm='$id_ukm', username='$username',password='$password' where id_user = '$id_user'";
        $hasil = $this->mysqli->query($query);
        return $hasil;
    }
     
    public function hapus_user($id_user) {
        $query = "delete from tbl_user where id_user = '$id_user'";
        $hasil = $this->mysqli->query($query);
        return $hasil;
    }
 
    public function tampil_ukm() {
        $query="select * from tbl_ukm order by id_ukm desc";
        $res=$this->mysqli->query($query);
        return $res;
    }
}
?>