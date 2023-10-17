<!-- <?php
  if(is_array($sanpham)){
    extract($sanpham);
  }
  $hinhpath="../upload/".$img;
                    if(is_file($hinhpath)){
                        $hinh="<img src='".$hinhpath."' height='80'>";
                    }else{
                        $hinh="no photto";
                    }
?> -->
<div class="row2">
         <div class="row2 font_title">
          <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
         <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id?>">
           <div class="row2 mb10 form_content_container">
           <select name="iddm" id="">
              <?php
                foreach($listdanhmuc as $danhmuc){
                  if($danhmuc['id']==$danhmuc['name']) $s="selected"; else $s="";
                  echo '<option value="'.$danhmuc['id'].'" '.$s.'>'.$danhmuc['name'].'</option>';
                };
              ?>
                
            </select>
           </div>
           <div class="row2 mb10">
            <label>Tên Sản Phẩm </label> <br>
            <input type="text" name="tensp" placeholder="nhập vào tên sản phẩm" value="<?php echo $name?>">
           </div>
           <div class="row2 mb10">
            <label>Giá Sản Phẩm </label> <br>
            <input type="text" name="giasp" placeholder="nhập vào tên sản phẩm"value="<?php echo $price?>">
           </div>
           <div class="row2 mb10">
            <label>Hình Sản Phẩm </label> <br>
            <input type="file" name="hinh" placeholder="nhập vào tên sản phẩm">
            <?php echo $hinh ?>
           </div>
           <div class="row2 mb10">
            <label>Mô tả </label> <br>
            <textarea name="mota" id="" cols="30" rows="10" ><?php echo $mota?></textarea>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="submit" name="capnhat" value="Cập Nhật">
         <input  class="mr20" type="reset" value="Nhập lại">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="Danh Sách"></a>
           </div>
           <?php
              if(isset($thongbao)&&($thongbao!="")){
                echo $thongbao;
              }
            ?>
          </form>
         </div>
        </div>