<? 
$db= mysqli_connect("localhost","shop17","1234","shop17");
if (!$db) exit("DB연결에러");

date_default_timezone_set("Asia/Seoul");

$admin_id="admin";
$admin_pw="1234";
$page_line=10; 
$page_block=5;

$a_idname=array("전체","이름","ID");     //  2줄은 common.php에 작성.
$n_idname=count($a_idname);    

$a_menu=array("분류선택","드롭피어싱","링피어싱","원볼링/투볼링","라블렛피어싱","확장피어싱","사선피어싱","바나나&트위스트");
$n_menu=count($a_menu);         

$a_status=array("상품상태","판매중","판매중지","품절");
$n_status=count($a_status);

$a_icon=array("아이콘","New","Hit","Sale");
$n_icon=count($a_icon);

$a_text1=array("","제품이름","제품번호");   // for문의 $i는 1부터 시작
$n_text1=count($a_text1);

$a_sort=array("신상품순 정렬","고가격순 정렬","저가격순 정렬","상품명 정렬");   // for문의 $i는 1부터 시작
$n_sort=count($a_sort);

$baesongbi = 2500;
$max_baesongbi = 30000;

$a_state=array("전체","주문신청","주문확인","입금확인","배송중","주문완료","주문취소");   // for문의 $i는 1부터 시작
$n_state=count($a_state);

$a_jumun=array("주문번호","고객명","상품명"); 
$n_jumun=count($a_jumun);

$a_day1_m=array("0","1","2","3","4","5","6","7","8","9","10","11","12"); 
$n_day1_m=count($a_day1_m);

$a_day1_d=array("0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"); 
$n_day1_d=count($a_day1_d);

$a_day2_m=array("0","1","2","3","4","5","6","7","8","9","10","11","12"); 
$n_day2_m=count($a_day2_m);

$a_day2_d=array("0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"); 
$n_day2_d=count($a_day2_d);

?>
