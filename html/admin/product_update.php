<?
include "../common.php";

$no=$_REQUEST[no];
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
$imagename1=$_REQUEST[imagename1];
$imagename2=$_REQUEST[imagename2];
$imagename3=$_REQUEST[imagename3];
$checkno1=$_REQUEST[checkno1];
$checkno2=$_REQUEST[checkno2];
$checkno3=$_REQUEST[checkno3];

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

$fname1=$imagename1;
if ($checkno1=="1") $fname1="";    // ���� üũ�� �� ���
if ($_FILES["image1"]["error"]==0) 
  {
      $fname1=$_FILES["image1"]["name"];
      $fsize=$_FILES["image1"]["size"];
      if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
          "../product/" . $fname1)) exit("���ε� ����");
  }

  $fname2=$imagename2;
  if ($checkno2=="1") $fname2="";    // ���� üũ�� �� ���
  if ($_FILES["image2"]["error"]==0)
  {
      $fname2=$_FILES["image2"]["name"];
      $fsize=$_FILES["image2"]["size"];
      if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
          "../product/" . $fname2)) exit("���ε� ����");
  }

  $fname3=$imagename3;
  if ($checkno3=="1") $fname3="";    // ���� üũ�� �� ���
  if ($_FILES["image3"]["error"]==0)      // ������ ������ �ִ��� ����
  {
      $fname3=$_FILES["image3"]["name"];
      $fsize=$_FILES["image3"]["size"];
      if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
          "../product/" . $fname3)) exit("���ε� ����");

  }


$query="update product set menu17='$menu', code17='$code', name17='$name', coname17='$coname', price17='$price', opt117='$opt1', opt217='$opt2', contents17='$contents', status17='$status', regday17='$regday', icon_new17='$icon_new',	icon_hit17='$icon_hit',icon_sale17='$icon_sale',discount17='$discount',image117='$fname1',image217='$fname2',image317='$fname3' where no17=$no;";
$result=mysqli_query($db,$query);
if (!$result) exit("����:$query");

echo("<script>location.href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>