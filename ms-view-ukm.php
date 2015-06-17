<?php
    require "ms-ukm.php";
     
    $db = new DB_Class;
    $ukm = new Ukm($db);
 
if(isset($_GET['aksi']) == '') {        
        $tampil = $ukm->tampil_ukm();
        echo "<h1>Pengelolaan Ukm</h1>";
        echo "<h3><a href='ms-view-ukm.php?aksi=tambah'>Tambah Ukm</a> | <a href='ms-view-ukm.php'>Pengelolaan Ukm</a> | <a href='ms-view-user.php'>Pengelolaan User</a></h3>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>NO</th>";
        echo "<th>Nama Ukm</th>";
        echo "<th align='center' colspan=2>Edit/Hapus</th>";
        echo "</tr>";
        $no=1;
        foreach($tampil as $data) {
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>".$data['nama_ukm']."</td>";
            echo "<td align='center'><a href=\"?aksi=edit&id_ukm=$data[id_ukm]\">Edit</a></td>";
            echo "<td align='center'><a href=\"?aksi=hapus&id_ukm=$data[id_ukm]\" onclick=\"return confirm('Yakin dihapus?')\">Hapus</a></td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        echo "<form method='POST' action='?aksi=proses-tambah' align='center'>";
        echo "<p>Nama UKM<br/><input type='text' name='nama_ukm'></p>";
        echo "<p><input type='submit' value='Simpan'></p>";
        echo "</form>";
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'proses-tambah') {
        $nama_ukm = $_POST['nama_ukm'];
         
        if($nama_ukm!=""){
            $tambah = $ukm->tambah_ukm($nama_ukm);
            if($tambah) {
                echo "Data berhasil di simpan";
                echo "<meta http-equiv='refresh' content='2; url=ms-view-ukm.php'>";
            }
            else {
                echo "Data gagal di simpan";
                echo "<meta http-equiv='refresh' content='2; url=ms-view-ukm.php'>";
            }
        }
        else{
            echo "Data masih ada yang kosong, harap dilengkapi";
            echo "<meta http-equiv='refresh' content='2; url=ms-view-ukm.php'>";
        }
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
        $id_ukm = $_GET['id_ukm'];
        echo "<form method='POST' action='?aksi=proses-edit' align='center'>";
        echo "<p>Nama Ukm<br/><input type='text' name='nama_ukm' value=".$ukm->baca_ukm('nama_ukm', $id_ukm)."></p>";
        echo "<p><input type='submit' value='Simpan'><input type='hidden' name='id' value=".$ukm->baca_ukm('id_ukm',$id_ukm)."></p>";
        echo "</form>";
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'proses-edit') {
        $id_ukm = $_POST['id'];
        $nama_ukm = $_POST['nama_ukm'];
         
        $edit = $ukm->edit_ukm($id_ukm, $nama_ukm);
        if($edit) {
            echo "Data berhasil di edit";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-ukm.php'>";
        }
        else {
            echo "Data gagal di edit";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-ukm.php'>";
        }
    }
    else if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
        $id_ukm = $_GET['id_ukm'];
         
        $hapus = $ukm->hapus_ukm($id_ukm);
        if($hapus) {
            echo "Berhasil di hapus";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-ukm.php'>";
        }
        else {
            echo "Gagal di hapus";
            echo "<meta http-equiv='refresh' content='2;url=ms-view-ukm.php'>";
        }
    }
?>