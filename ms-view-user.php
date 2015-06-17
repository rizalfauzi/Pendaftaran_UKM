<?php
    require "ms-user.php";
    $db = new DB_Class;
    $user = new User($db);
 
if(isset($_GET['aksi']) == '') {        
        $tampil = $user->tampil_user();
        echo "<h1>Pengelolaan User</h1>";
        echo "<h3><a href='ms-view-user.php?aksi=tambah'>Tambah User</a> | <a href='ms-view-ukm.php'>Pengelolaan UKM</a> | <a href='ms-view-user.php'>Pengelolaan User</a></h3>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>NO</th>";
        echo "<th>Username</th>";
        echo "<th>Password</th>";
        echo "<th>UKM</th>";
        echo "<th align='center' colspan=2>Edit/Hapus</th>";
        echo "</tr>";
        $no=1;
		foreach($tampil as $data) {
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>".$data['username']."</td>";
            echo "<td>".$data['password']."</td>";
            echo "<td>".$data['nama_ukm']."</td>";
            echo "<td align='center'><a href=\"?aksi=edit&id_user=$data[id_user]\">Edit</a></td>";
            echo "<td align='center'><a href=\"?aksi=hapus&id_user=$data[id_user]\" onclick=\"return confirm('Yakin dihapus?')\">Hapus</a></td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        $tampil_ukm= $user->tampil_ukm();
         
        echo "<form method='POST' action='?aksi=proses-tambah' align='center'>";
        echo "<p>Username<br/><input type='text' name='username'></p>";
        echo "<p>Password<br/><input type='password' name='password'></p>";
        echo "<p>Ukm<br/><select name='id_ukm'>";
        echo "<option value=0 selected>Pilih Ukm</option>";
        foreach($tampil_ukm as $data){
            echo "<option value='".$data['id_ukm']."'>".$data['nama_ukm']."</option>";
        }
        echo "</select></p>";
        echo "<p><input type='submit' value='Simpan'></p>";
        echo "</form>";
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'proses-tambah') {
        $id_role = $_POST['id_ukm'];
        $username = $_POST['username'];
        $password = $_POST['password'];
         
        if($id_role!="Pilih Ukm" && $username!="" && $password!=""){
            $tambah = $user->tambah_user($id_ukm,$username,$password);
            if($tambah) {
                echo "Data berhasil di simpan";
                echo "<meta http-equiv='refresh' content='2; url=ms-view-user.php'>";
            }
            else {
                echo "Data gagal di simpan";
                echo "<meta http-equiv='refresh' content='2; url=ms-view-user.php'>";
            }
        }
        else{
            echo "Data masih ada yang kosong, harap dilengkapi";
            echo "<meta http-equiv='refresh' content='2; url=ms-view-user.php'>";
        }
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
        $tampil_ukm = $user->tampil_ukm();
        $id_user = $_GET['id_user'];
        echo "<form method='POST' action='?aksi=proses-edit' align='center'>";
        echo "<p>Username<br/><input type='text' name='username' value=".$user->baca_user('username', $id_user)."></p>";
        echo "<p>Password<br/><input type='text' name='password' value=".$user->baca_user('password', $id_user)."></p>";
        echo "<p>Ukm<br/><select name='id_ukm'>";
        echo "<option value=0 selected>Pilih Ukm</option>";
        foreach($tampil_ukm as $data){
            if($data['id_ukm'] == $user->baca_user('id_ukm', $id_user)){
                echo "<option value='".$data['id_ukm']."' selected>".$data['nama_ukm']."</option>";
            }
            else{
                echo "<option value='".$data['id_ukm']."'>".$data['nama_ukm']."</option>";
            }
        }
        echo "</select></p>";
        echo "<p><input type='submit' value='Simpan'><input type='hidden' name='id_user' value=".$user->baca_user('id_user',$id_user)."></p>";
        echo "</form>";
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'proses-edit') {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id_ukm = $_POST['id_ukm'];
         
        $edit = $user->edit_user($id_user,$id_ukm,$username,$password);
        if($edit) {
            echo "Data berhasil di edit";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-user.php'>";
        }
        else {
            echo "Data gagal di edit";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-user.php'>";
        }
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
        $id_user = $_GET['id_user'];
         
        $hapus = $user->hapus_user($id_user);
        if($hapus) {
            echo "Berhasil di hapus";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-user.php'>";
        }
        else {
            echo "Gagal di hapus";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-user.php'>";
        }
    }
?>