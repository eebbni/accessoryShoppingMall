<?
	$data = $_COOKIE[data];
	$n_data = $_COOKIE[n_data];
	$no1=$_REQUEST[no1];//pos값
	$kind = $_REQUEST[kind];
	$pos = $_REQUEST[pos];
	$name = $_REQUEST[name];
	$num = $_REQUEST[num];


if (!$n_data) $n_data=0;   

switch ($kind) {

    case "insert": 
		$n_data++;
        $data[$n_data] = implode("^^", array($n_data, $name, $num));

        setcookie("data[$n_data]",$data[$n_data]);
		setcookie("n_data",$n_data);

         break;

	case "delete":      // 제품삭제
		 setcookie("data[$pos]","");
         break;

	case "update":     // 수량 수정
		 list($no,$name,$num)=explode("^^", $data[$no1]);
         //$pos번째 제품번호, 옵션값들 알아내기.
		$name = $_REQUEST[name];
		$num = $_REQUEST[num];
		 $data[$no1] = implode("^^", array($no,$name,$num));
         //이전 값에 새 수량으로 제품정보 합치기.
         //$pos번째에 제품정보 저장.
		 setcookie("data[$no1]",$data[$no1]);
         break;

}

echo("<script>location.href='test3.php'</script>");

?>