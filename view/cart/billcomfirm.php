<main class="catalog  mb">
 <div class="boxleft">
   <div class="row mb">
     <div class="boxtrai mr ">
        <div class="row mb">
            <div style="text-align: center;" class="row boxcontent3 mb">
                <h1>Cảm ơn quý khách đã đặt hàng</h1>
            </div>
        </div>

        <?php
            if(isset($bill)&&(is_array($bill))){
                extract($bill);
            }
        ?>
        <div class="row2 font_title">
          <h1 style="text-align: center;">Thông tin đơn hàng</h1>
         </div>
         <div class="row2 form_content ">
            <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            <div style="text-align: center;" class="row boxcontent3 mb">
                <li>- Mã đơn hàng : DAM - <?php echo $bill['id'];?></li>
                <li>- Ngày đặt hàng : <?php echo $bill['ngaydathang'];?></li>
                <li>- Tổng đơn hàng : <?php echo $bill['total'];?></li>
                <li>- Phương thức thanh toán : <?php echo $bill['bill_pttt'];?></li>
            </div>
        <div class="row2 font_title">
                    <h1>Thông tin người đặt hàng</h1>
                    </div>
                    <div class="row2 form_content ">
                        <form action="#" method="POST">
                    <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <td style="padding-right: 30px;">Người đặt hàng :</td>
                        <td><?php echo $bill['bill_name']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Địa chỉ :</td>
                        <td><?php echo $bill['bill_address']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Email :</td>
                        <td><?php echo $bill['bill_email']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 20px;">Điện thoại :</td>
                        <td><?php echo $bill['bill_tel']; ?></td>
                    </tr>
                    </tr>
                </table>
            </div>
            <div class="row2 font_title">
                    <h1>Giỏ Hàng</h1>
                    </div>
                    <div class="row2 form_content ">
                        <form action="#" method="POST">
                    <div class="row2 mb10 formds_loai">
                        <table>

                            <?php
                            include "model/cart.php";
                            viewcart(0);
                            ?>


                        </table>
                    </div>
                    </div>
                </div>
        </div>
      </div>
    </div>
   </div>
  </div>
    <?php
    include "view/boxright.php";
    ?>
</main>