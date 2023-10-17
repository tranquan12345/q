<style>
td {
    padding: 0 20px;
}
</style>
<main class="catalog  mb ">
    <div class="boxleft">
        <?php extract($sanpham); ?>
        <div class="  mb">
            <div class="box_title">
                <?php echo $name; ?>
            </div>
            <div class="box_content">
                <?php 
                    $img = $img_path . $img;
                    echo "<img src='$img' width='300'>";
                    echo "<p>$mota</p>";
                ?>

            </div>
        </div>
        <?php
            if (isset($_SESSION['user'])) {
        ?>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("#binhluan").load("view/binhluan/binhluanform.php", {idpro:<?php echo $id ?>});
        });
        </script>   
        <div class="mb" id="binhluan">
        </div>
        <?php } else {?>
            <div class="box_title" style="margin-bottom: 20px">Vui lòng đăng nhập để bình luận sản phẩm này</div>
            <?php }?>

        <div class=" mb">
            <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
            <div class="box_content">
                <?php foreach($sanphamcl as $value): ?>
                <li>
                    <a href="index.php?act=sanphamct&idsp=<?=$value['id']?>">
                        <?=$value['name']?>
                    </a>
                </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
?>

</main>