<?
include "common.php";
$cookie_no=$_COOKIE[cookie_no];
$cart = $_COOKIE[cart];
$n_cart = $_COOKIE[n_cart];

$o_name=$_REQUEST[o_name];
$o_phone=$_REQUEST[o_phone];
$o_tel=$_REQUEST[o_tel];
$o_email=$_REQUEST[o_email];
$o_zip=$_REQUEST[o_zip];
$o_juso=$_REQUEST[o_juso];

$r_name=$_REQUEST[r_name];
$r_tel=$_REQUEST[r_tel];
$r_phone=$_REQUEST[r_phone];
$r_email=$_REQUEST[r_email];
$r_zip=$_REQUEST[r_zip];
$r_juso=$_REQUEST[r_juso];
$memo=$_REQUEST[memo];

$pay_method=$_REQUEST[pay_method];
$card_kind=$_REQUEST[card_kind];
$card_halbu=$_REQUEST[card_halbu];
$bank_kind=$_REQUEST[bank_kind];
$bank_sender=$_REQUEST[bank_sender];

if($pay_method==1){
	$card_halbu=0;
}
//jumun 테이블에서 오늘 주문 중, 가장 큰 주문번호 값 조사.
$query="select no17 from jumun where jumunday17=curdate() order by no17 desc";
$result=mysqli_query($db,$query); 
if (!$result) exit("에러:$query");
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);

$jumunday=date("ymd");

if ($count>0)      // 주문번호가 있으면
   $jumun_no = $jumunday . sprintf("%04d",substr($row[no17],-4)+1);//고치기 ☆★
else
   $jumun_no = $jumunday . "0001";

$total=0;
$product_nums = 0;
$product_names = "";

For ($i=1;  $i<=$n_cart;  $i++)
{
	if ($cart[$i]) // 제품정보가 있는 경우만
	{
		list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);

		$query="select * from product where no17=$no"; //제품 설명 가져오기
		// ? 제품정보(제품번호, 단가, 할인여부, 할인율) 알아내기
		$result=mysqli_query($db,$query); 
		if (!$result) exit("에러:$query");
		$count=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		
		
		//세일일때
		if($row[icon_sale17]==1){
			$price1= (round($row[price17]*(100-$row[discount17])/100, -1));
			$cash=$num*$price1;
		}
		//세일아닐때
		else{
			$price1= $row[price17];
			$cash=$num*$price1;
		}
		

		$query="insert into jumuns ( jumun_no17,product_no17,num17,price17,cash17 ,discount17,opts_no117,opts_no217) values ('$jumun_no','$no','$num','$price1','$cash','$row[discount17]','$opts1','$opts2');";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");    
	
		setcookie("cart[$i]","");

		$total = $total + $cash;

		$product_nums = $product_nums + 1;
		if ($product_nums==1) $product_names = $row[name17];

	}
	
}
	if ($product_nums>1)      // 제품수가 2개 이상인 경우만, "외 ?" 추가
	{
		$tmp = $product_nums-1;
		$product_names = $product_names . " 외 " . $tmp;
	}

	if ($total<$max_baesongbi) 
	{
		$query="insert into jumuns ( jumun_no17,product_no17,num17,price17,cash17 ,discount17,opts_no117,opts_no217) values ('$jumun_no','0','1','$baesongbi','$baesongbi','0','0','0');";
		$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
		//(주문_번호, 0, 1, 배송비, 배송비, 0, 0, 0,)
		$total = $total + $baesongbi;
	}

	if ($cookie_no)//로그인했는지 안했는지 조사
		$member_no = $cookie_no;
	else
		$member_no = 0;

$jumunday1=date("Y");
$jumunday2=date("m");
$jumunday3=date("d");
$jumunday=$jumunday1."-".$jumunday2."-".$jumunday3;


/*$query="insert into jumun (no17, member_no17, jumunday17, product_names17, product_nums17, 
  o_name17, o_tel17, o_phone17, o_email17, o_zip17 o_juso17, 
  r_name17, r_tel17, r_phone17, r_email17, r_zip17, r_juso17, memo17,
  pay_method17, card_okno17, card_hallbu17, card_kind17, 
  bank_kind17, bank_sender17,
  total_cash17, state17) values ('$jumun_no','$member_no','$jumunday','$product_names','$product_nums','$o_name','$o_tel','$o_phone','$o_email','$o_zip','$o_juso','$r_name','$r_tel','$r_phone','$r_email','$r_zip','$r_juso','$memo','$pay_method','$jumun_no','$card_halbu','$card_kind','$bank_kind','$bank_sender','$total','1');";*/

 
$query="insert into jumun ( no17,member_no17,jumunday17,product_names17,product_nums17,o_name17,	o_tel17,o_phone17,o_email17,o_zip17,o_juso17,r_name17,r_tel17,	r_phone17,r_email17,r_zip17,r_juso17,memo17,pay_method17,	card_okno17,card_hallbu17,card_kind17,bank_kind17,bank_sender17,total_cash17,state17) values ('$jumun_no','$member_no','$jumunday','$product_names','$product_nums','$o_name','$o_tel','$o_phone','$o_email','$o_zip','$o_juso','$r_name','$r_tel','$r_phone','$r_email','$r_zip','$r_juso','$memo','$pay_method','$jumun_no','$card_halbu','$card_kind','$bank_kind','$bank_sender','$total','1');";
$result=mysqli_query($db,$query);
		if(!$result) exit("에러:$query");
  echo("<script>location.href='order_ok.php'</script>");
  
?>