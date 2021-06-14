<?
	$cart = $_COOKIE[cart];
	$n_cart = $_COOKIE[n_cart];
	$no=$_REQUEST[no];//pos값
	$kind = $_REQUEST[kind];
	$pos = $_REQUEST[pos];
	$name = $_REQUEST[name];
	$tel1 = $_REQUEST[tel1];
	$tel2 = $_REQUEST[tel2];
	$tel3 = $_REQUEST[tel3];
	$sm = $_REQUEST[sm];
	$birthday1 = $_REQUEST[birthday1];
	$birthday2 = $_REQUEST[birthday2];
	$birthday3 = $_REQUEST[birthday3];
	$juso = $_REQUEST[juso];


if (!$n_cart) $n_cart=0;   

switch ($kind) {

    case "insert": 
		$n_cart++;

		$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);//작대기없음
		$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);//작대기있음

        $cart[$n_cart] = implode("^", array($name, $tel, $sm, $birthday,$juso));

        setcookie("cart[$n_cart]",$cart[$n_cart]);
		setcookie("n_cart",$n_cart);

         break;

	case "delete":      // 제품삭제
		 setcookie("cart[$pos]","");
         break;

	case "update":     // 수량 수정
		 list($name, $tel, $sm, $birthday,$juso)=explode("^", $cart[$no]);
         //$pos번째 제품번호, 옵션값들 알아내기.
		$name = $_REQUEST[name];
		$tel1 = $_REQUEST[tel1];
		$tel2 = $_REQUEST[tel2];
		$tel3 = $_REQUEST[tel3];
		$sm = $_REQUEST[sm];
		$birthday1 = $_REQUEST[birthday1];
		$birthday2 = $_REQUEST[birthday2];
		$birthday3 = $_REQUEST[birthday3];
		$juso = $_REQUEST[juso];

		$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);//작대기없음
		$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);//작대기있음

		 $cart[$no] = implode("^", array($name, $tel, $sm, $birthday,$juso));
         //이전 값에 새 수량으로 제품정보 합치기.
         //$pos번째에 제품정보 저장.
		 setcookie("cart[$no]",$cart[$no]);
         break;

	/*case "deleteall":    // 장바구니 전체 비우기
         for($i=1;$i<=$n_cart;$i++)
            { if ($cart[$i]) 
			  setcookie("cart[$i]","");}
		 setcookie("n_cart","");
		 $n_cart = 0;
		 //초기화*/
}

echo("<script>location.href='juso_list_1.php'</script>");

?>