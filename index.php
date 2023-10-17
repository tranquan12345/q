<?php
    session_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";
    if(!isset($_SESSION['mycart']))  $_SESSION['mycart']=[];
    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $kyw = $_POST['keyword'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                $tendm= load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            case "sanphamct":
                if(isset($_POST['guibinhluan'])){
                    insert_binhluan($_POST['idpro'], $_POST['noidung']);
                }
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                    $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                    $binhluan = loadall_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }else{
                    include "view/home.php";            
                }
                break;
            case "dangky":
                if(isset($_POST['dangky'])){
                    $email=$_POST['email'];
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    insert_taikhoan($email,$user,$pass);
                    $thongbao="đăng kí thành công";
                }
                include "view/login/dangky.php";
                break;
                case "dangnhap": 
                    if(isset($_POST['dangnhap']) && ($_POST['dangnhap']!="")){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $checkuser=checkuser($user,$pass);
                        if(is_array($checkuser)){
                            $_SESSION['user']=$checkuser;
                            header('location:index.php');
                        }else{
                            $thongbao1="tài khoản không tồn tại vui lòng kiểm tra hoặc đăng ký!";
                        }
                }
                include "view/home.php";
                break;
                case "edit_taikhoan": 
                    if(isset($_POST['capnhat']) && ($_POST['capnhat']!="")){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel=$_POST['tel'];
                        $id=$_POST['id'];
                        update_taikhoan($id,$user,$pass,$email,$address,$tel);
                        $_SESSION['user']=checkuser($user,$pass);
                        header('location:index.php?act=edit_taikhoan');
                }
                include "view/login/edit_taikhoan.php";
                break;
                case "dangxuat":
                    dangxuat();
                    include "view/home.php";
                    break;
                case "quenmk":
                    if (isset($_POST['guiemail'])) {
                        $email = $_POST['email'];
                        $sendMailMess = sendMail($email);
                    }
                    include "view/login/quenmk.php";
                    break;
                
                case "addtocart":
                    if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $soluong = 1;
                        $ttien = $soluong * $price;
                        $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                        array_push($_SESSION['mycart'], $spadd);
                    }

                    include "view/cart/viewcart.php";
                    break;
                    case 'delcart':
                        if (isset($_GET['idcart']) && $_GET['idcart'] > 0) {
                            $id = $_GET['idcart'];
                            array_splice($_SESSION['mycart'], $id-1,1);
                        } else {
                            $_SESSION['mycart'] = [];
                        }
                        header('Location: index.php?act=viewcart');
                        break;
                    case 'xoahet':
                            $_SESSION['mycart'] = []; // Xóa hết sản phẩm trong giỏ hàng
                            include "view/cart/viewcart.php";
                            break;
                    case 'viewcart':
                            include "view/cart/viewcart.php";
                          break;
                    case 'bill':
                            include "view/cart/bill.php";
                            break;
                    case 'billcomfirm':
                                if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                                    if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $address = $_POST['address'];
                                    $pttt = $_POST['pttt'];
                                    $tel = $_POST['tel'];
                                    $ngaydathang = date('h:i:sa m/d/Y');
                                    $tongdonhang = tongdonhang();
                            
                                    $idbill = insert_bill($iduser,$name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                            
                                    foreach ($_SESSION['mycart'] as $cart) {
                                        insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                                    }
                                    $_SESSION['cart']=[];
                                    
                                }
                                $bill = loadone_bill($idbill);
                                $billct = loadone_cart($idbill);
                                include "view/cart/billcomfirm.php";
                                break;
                        case "mybill":
                           $listbill= loadall_bill($_SESSION['user']['id']);
                           include "view/cart/bill.php";
                           break;
                        case 'lienhe':
                            include "view/lienhe.php";
                            break;
                        case 'gioithieu':
                            include "view/gioithieu.php";
                            break;
                
                        default:
                            include "view/home.php";
                            include "view/boxphai.php";
                            break;
                    }
                } else {
                    include "view/home.php";
                    include "view/boxphai.php";
                }
    include "view/footer.php";
?>