<?
include "../common.php";

$menu=$_REQUEST[menu];
$code=$_REQUEST[code];
$name=$_REQUEST[name];
$coname=$_REQUEST[coname];
$price=$_REQUEST[price];
$opt1=$_REQUEST[opt1];
$opt2=$_REQUEST[opt2];
$contents=$_REQUEST[contents];
$status=$_REQUEST[status];
$icon_new=$_REQUEST[icon_new];
$icon_hit=$_REQUEST[icon_hit];
$icon_sale=$_REQUEST[icon_sale];
$discount=$_REQUEST[discount];
$regday1=$_REQUEST[regday1];
$regday2=$_REQUEST[regday2];
$regday3=$_REQUEST[regday3];
$image1=$_REQUEST[image1];
$image2=$_REQUEST[image2];
$image3=$_REQUEST[image3];

$regday=sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

if(!$icon_new)
	$icon_new=0;
else
	$icon_new=1;

if(!$icon_hit)
	$icon_hit=0;
else
	$icon_hit=1;

if(!$icon_sale)
	$icon_sale=0;
else
	$icon_sale=1;
$name=addslashes($name);
$contents=addslashes($contents);

$fname1=$name1="";
  if ($_FILES["image1"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname1=$_FILES["image1"]["name"];
      $fsize=$_FILES["image1"]["size"];
      if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("업로드 실패");

  }
  $fname2=$name2="";
  if ($_FILES["image2"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname2=$_FILES["image2"]["name"];
      $fsize=$_FILES["image2"]["size"];
	  //$newfname="새파일이름";
	  //if (file_exists("../product/" . $newfname)) exit("동일한 파일이 있음");
      if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("업로드 실패");

      //echo("파일이름 : $newfname<br> 파일크기 : $fsize");
  }
  $fname3=$name3="";
  if ($_FILES["image3"]["error"]==0)      // 선택한 파일이 있는지 조사
  {
      $fname3=$_FILES["image3"]["name"];
      $fsize=$_FILES["image3"]["size"];
	  //$newfname="새파일이름";
	  //if (file_exists("../product/" . $newfname)) exit("동일한 파일이 있음");
      if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("업로드 실패");

      //echo("파일이름 : $newfname<br> 파일크기 : $fsize");
  }


 $query="insert into product (menu17, code17, name17, coname17, price17, opt117, opt217, contents17, status17, regday17, icon_new17,	icon_hit17,icon_sale17,discount17,image117,image217,image317) values('$menu','$code','$name','$coname','$price','$opt1','$opt2','$contents','$status','$regday','$icon_new','$icon_hit','$icon_sale','$discount','$fname1','$fname2','$fname3');";

  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");

  echo("<script>location.href='product.php'</script>");
  ?>