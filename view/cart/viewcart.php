<?php if (isset($_SESSION['user'])) {
            extract($_SESSION['user'])
        ?>
 <main class="catalog  mb">
      <div class="boxleft">
      <div class="row2 font_title">
          <h1>Giỏ Hàng</h1>
         </div>
         <div class="row2 form_content ">
            <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>

                <?php
                include "model/cart.php";
                viewcart(1);
                ?>
            </table>
            </div>
        </div>
        <div class="row mb bill">
                    <a href="index.php?act=bill"><input type="button" value="Đồng ý đặt hàng"></a>
                    <a href="index.php?act=xoahet"><input type="button" value="Xóa khỏi giỏ hàng"></a>
        </div>
        <a class="continue-button" href="index.php">Tiếp tục mua </a>
            </div>
            <?php
            include "view/boxright.php";
            ?>
            <?php } else{ ?>
                
            <?php
        include "view/login/dangky.php";
            ?>
            <?php }?>
   </main>
