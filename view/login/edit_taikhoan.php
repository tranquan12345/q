
<main class="catalog  mb ">
    <div class="boxleft">
        <div class="box_title">Cập nhật tài khoản</div>
        <div class="box_content form_account">
            <?php
                if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                    extract($_SESSION['user']);
                }
            ?>
            <form action="index.php?act=edit_taikhoan" method="post">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="email" value="<?php echo $email?>">
                </div>
                <div>
                    Tên đăng nhập
                    <input type="text" name="user" placeholder="user" value="<?php echo $user?>">
                </div>
                <div>
                    Mật khẩu
                    <input type="password" name="pass" placeholder="pass"value="<?php echo $pass?>">
                </div>
                <div>
                    Địa chỉ
                    <input type="text" name="address" placeholder="Địa chỉ"value="<?php echo $address?>">
                </div>
                <div>
                    Điện Thoại
                    <input type="text" name="tel" placeholder="Số điện thoại"value="<?php echo $tel?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" value="Cập nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
            </form>
        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>
