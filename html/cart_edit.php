<?
include "common.php";

$cart = $_COOKIE[cart];
//$a=$_COOKIE[a] ��� ���� $a[0]�̳� $a[1] ���� ����� �� �ִ�.
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

	case "order":      // �ٷ� �����ϱ�
        $n_cart++;
         $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
         setcookie("cart[$n_cart]",$cart[$n_cart]);
		 setcookie("n_cart",$n_cart);
         break;

	case "delete":      // ��ǰ����
		 setcookie("cart[$pos]","");
			if ($pos==1){
				setcookie("n_cart","");
		 $n_cart = 0;
			} 
         break;

	case "update":     // ���� ����
		 list($no, $num, $opts1, $opts2)=explode("^", $cart[$pos]);
         //$pos��° ��ǰ��ȣ, �ɼǰ��� �˾Ƴ���.

		 $num = $_REQUEST [num];

		 $cart[$pos] = implode("^", array($no, $num, $opts1, $opts2));
         //���� ���� �� �������� ��ǰ���� ��ġ��.
         //$pos��°�� ��ǰ���� ����.
		 setcookie("cart[$pos]",$cart[$pos]);
         break;

	case "deleteall":    // ��ٱ��� ��ü ����
         for($i=1;$i<=$n_cart;$i++)
            { if ($cart[$i]) 
			  setcookie("cart[$i]","");}
		 setcookie("n_cart","");
		 $n_cart = 0;
		 //�ʱ�ȭ
}

if ($kind=="order")
echo("<script>location.href='order.php'</script>");
else
echo("<script>location.href='cart.php'</script>");

?>