<main class="catalog  mb">
      <div class="boxleft">
      <div class="row2 font_title">
          <h1>Đơn hàng của bạn</h1>
         </div>
         <div class="row2 form_content ">
            <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
              <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày Đặt</th>
                <th>Số lượng mặt hàng</th>
                <th>Tổng giá trị đơn hàng</th>
                <th>Tình trạng đơn hàng</th>
              </tr>
              <?php

                    if(is_array($listbill)){
                      foreach ($listbill as $bill)
                        extract($bill);
                        $ttdh=get_ttdh ($bill['bill_status']);
                        $countsp-loadall_cart_count ($bill['id']);
                    echo '<tr>
                        <td>DAM-'.$bill['id'].'</td>
                        <td>'.$bill['ngaydathang'].'</td>
                        <td>'.$countsp. '</td>
                        <td>'.$bill['total'].'</td>
                        <td>'.$ttdh.'</td>
                        </tr>';
                    }
                ?>
            </table>
            </div>
        </div>
            </div>
            <?php
            include "view/boxright.php";
            ?>
   </main>
