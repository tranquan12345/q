
<div class="row2">
         <div class="row2 font_title">
          <h1>THỐNG KÊ</h1>
         </div>
         <div class="row2 form_content ">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
               
                <th>Stt</th>
                <th>Loại Hàng</th>
                <th>Số Lượng</th>
                <th>Giá min</th>
                <th>Giá max</th>
                <th>Giá trung bình </th>
            </tr>
            <?php
                foreach($listthongke as $thongke){
                    extract($thongke);
                    echo '
                    <tr>
                    <td>'.$madm.'</td>
                    <td>'.$tendm.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.$minprice.'</td>
                    <td>'.$maxprice.'</td>
                    <td>'.$avgprice.'</td>
                </tr>
                    ';
                }
            ?>
           </table>
           </div>
           <div class="row mb10 ">
                <a href="index.php?act=bieudo"> <input  class="mr20" type="button" value="Xem biểu đồ"></a>
           </div>
         </div>
        </div>



       
    </div>