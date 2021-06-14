<?
include "common.php";

$cart = $_COOKIE[cart];
//$a=$_COOKIE[a] 라고 쓰면 $a[0]이나 $a[1] 값을 사용할 수 있다.
$n_cart = $_COOKIE[n_cart];
$kind = $_REQUEST [kind];
$no = $_REQUEST [no];
$num = $_REQUEST [num];
$opts1 = $_REQUEST [opts1];
$opts2 = $_REQUEST [opts2];
$pos = $_REQUEST [pos];

if (!$n_cart) $n_cart=0;   

switch ($kind) {

    case "insert": 
		$n_cart++;
         $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
         setcookie("cart[$n_cart]",$cart[$n_cart]);
		 setcookie("n_cart",$n_cart);
         break;

	case "order":      // 바로 구매하기
        $n_cart++;
         $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
         setcookie("cart[$n_cart]",$cart[$n_cart]);
		 setcookie("n_cart",$n_cart);
         break;

	case "delete":      // 제품삭제
		 setcookie("cart[$pos]","");
			if ($pos==1){
				setcookie("n_cart","");
		 $n_cart = 0;
			} 
         break;

	case "update":     // 수량 수정
		 list($no, $num, $opts1, $opts2)=explode("^", $cart[$pos]);
         //$pos번째 제품번호, 옵션값들 알아내기.

		 $num = $_REQUEST [num];

		 $cart[$pos] = implode("^", array($no, $num, $opts1, $opts2));
         //이전 값에 새 수량으로 제품정보 합치기.
         //$pos번째에 제품정보 저장.
		 setcookie("cart[$pos]",$cart[$pos]);
         break;

	case "deleteall":    // 장바구니 전체 비우기
         for($i=1;$i<=$n_cart;$i++)
            { if ($cart[$i]) 
			  setcookie("cart[$i]","");}
		 setcookie("n_cart","");
		 $n_cart = 0;
		 //초기화
}

if ($kind=="order")
echo("<script>location.href='order.php'</script>");
else
echo("<script>location.href='cart.php'</script>");

?>