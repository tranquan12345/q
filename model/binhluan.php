<?php 
    function loadall_binhluan($idpro) {
        //  $sql = "SELECT * FROM binhluan WHERE 1";
         $sql = "
         SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
          LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
          LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
          WHERE sanpham.id=$idpro;
      ";
        if ($idpro > 0) {
            $sql .= " AND idpro='" . $idpro . "'";
        }
        $sql = " select *from binhluan ORDER BY id DESC";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
        $ngaybinhluan = date('Y-m-d');
        $sql="insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values ('$noidung','$iduser','$idpro','$ngaybinhluan')"; 
        pdo_execute($sql);
    }
    function delete_binhluan($id){
        $sql="delete from binhluan where id=".$id;
        pdo_execute($sql);
    }
    function delete_binhluansp($id1){
        $sql="delete from binhluan where idpro=".$id1;
        pdo_execute($sql);
    }
?>