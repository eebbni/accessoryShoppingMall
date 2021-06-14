<?
	include "common.php";
	include "main_top.php";
	
	$query="select * from product 
                where status17=1 and icon_new17=1
                order by rand() limit 15";
	$result=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");

?>

<!-------------------------------------------------------------------------------------------->	

<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->

<!-------------------------------------------------------------------------------------------->	

 <head>
<title> </title>
<meta http-equiv="content-type" content="text/html; charset=euc-kr">

<style type="text/css">
body { margin:0px; padding:0px; width:100%; height:100%; }

#slide_box { width:1000px; height:480px; border:0px; position:relative; }
#slide_img { width:1000px; height:480px;  position:absolute; left:0px; top:20px; cursor:pointer; }
#slide_menu { border:0px; margin:0px;30px;30px;10px padding:100px;  list-style:none;  position:absolute; left:420px; bottom:0px; }
#slide_menu li { width:20px; height:20px; background-color: #dddddd; border-left:1px solid #ffffff; cursor:pointer; float:left; font-family: 돋움,verdana; font-size: 12px; color: black; text-align:center; line-height:30px; font-weight: 900; }
#slide_menu li:first-child { border-left:0px; width:20px; }

    .imgBoxDiv{
      width: 580px;
      height: 300px;
      position: relative;
      cursor: pointer;
      overflow: hidden;
      
    }
    .imgDiv{
      width: 100%;
      height: 100%;
      position: absolute;
      background: lightblue;
      z-index:1;
      -webkit-transition:all .5s ease;
      transition: all .5s ease;
      bottom:0px;
      overflow: hidden;
     }
     .imgBoxDiv:hover .imgDiv{
       bottom: 30px;
     }
     .imgDescDiv{
      width: 100%;
      height: 20px;
      padding:10px;
      color:#000000;
      background: #F0F0F0;
      position: absolute;
      bottom:0px;
    }

.coin-slider { overflow: hidden; zoom: 1; position: relative; }
.coin-slider a{ text-decoration: none; outline: none; border: none; }

.cs-buttons { font-size: 0px; padding: 10px; float: left; }
.cs-buttons a { margin-left: 5px; height: 10px; width: 10px; float: left; border: 1px solid #B8C4CF; color: #B8C4CF; text-indent: -1000px; }
.cs-active { background-color: #B8C4CF; color: #FFFFFF; }

.cs-title { width: 545px; padding: 10px; background-color: #000000; color: #FFFFFF; }

.cs-prev, 
.cs-next { background-color: #000000; color: #FFFFFF; padding: 0px 10px; }

</style>

<script src="http://code.jquery.com/jquery-latest.js"></script> 
<script language="JavaScript">
    <!--
        function setCookie( name, value, expiredays ) {
            var todayDate = new Date();
            todayDate.setDate( todayDate.getDate() + expiredays ); 
            document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
        }
        function closePop() {
            if ( document.pop_form.chkbox.checked ){
                setCookie( "maindiv", "done" , 1 );
            }
            document.all['layer_popup'].style.visibility = "hidden";
        }
    //--> 
</script>




<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
var imgarr = new Array();
var urlarr = new Array();



imgarr[0] = "images/main01_big01.jpg";    // 슬라이더 이미지
urlarr[0] = "main.php";  // 메뉴와 이미지 클릭시 이동할 주소



imgarr[1] = "images/main01_big02.jpg";
urlarr[1] = "main.php";



imgarr[2] = "images/main01_big03.jpg";
urlarr[2] = "main.php";



var auto_num = 0;
var auto_start;
var auto_time = 3000;    // 이미지 바뀌는 시간설정 - 5초



$(function(){
$("#slide_box").prepend("<img id='slide_img' src='"+imgarr[0]+"' alt='0' />");
$("#slide_menu li:first").css({"backgroundColor":"#4c4c4c","color":"white"});
$("#slide_menu li").each(function(i) { 
$(this).attr("idx", i);
}).click(function() {
location.href=urlarr[$(this).attr("idx")];
}).hover(function(){
clearInterval(auto_start);
$("#slide_menu li").css({"backgroundColor":"#dddddd","color":"black"});
$(this).css({"backgroundColor":"#4c4c4c","color":"white"});
$("#slide_img").attr("src",imgarr[$(this).attr("idx")]);
$("#slide_img").attr("alt",$(this).attr("idx"));
},function(){
auto_num = $(this).attr("idx");
auto_start = setInterval("auto()",auto_time);;
});
$("#slide_img").click(function() {
location.href=urlarr[$(this).attr("alt")];
});
auto_start = setInterval("auto()",auto_time);
});
function auto(){
auto_num++;
if(auto_num >= imgarr.length){ auto_num = 0; }
$("#slide_menu li").css({"backgroundColor":"#dddddd","color":"black"});
$("#slide_menu li").each(function(i) {
if(auto_num == i){
$(this).css({"backgroundColor":"#4c4c4c","color":"white"});
$("#slide_img").attr("src",imgarr[$(this).attr("idx")]);
$("#slide_img").attr("alt",$(this).attr("idx"));
}
});
}


</script>






<div id="slide_box">

     <ul id="slide_menu">
          <li></li>
          <li></li>
          <li></li>
		 
     </ul>

</div>


<!--<tr><td height="100"></td></tr>-->
			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->	

			<table width="767" border="0" cellspacing="0" cellpadding="0">

				<tr>
					<tr><td height="370" rowspan="2"></td></tr><!--배너밑에 빈공간-->
</tr>




  
  

<!--<div class="imgBoxDiv"  style=padding-left:0px;>
      <div class="imgDiv"><a href='product.php?menu=2'><img src="images/main02_item01.jpg"></div>
      <div class="imgDescDiv"><a href='product.php?menu=2'>피어싱 베스트 바로가기▶</a>  
	  <div>
  </div>--->
   

					<td height="80">
						
						<img src="images/main_newproduct.gif" width="1000" height="80">
						<tr><td height="20" colspan="2"></td></tr>
					</td>

				</tr>

			</table>
				<!---1번째 줄-->


				
<?
$num_col=4;   $num_row=3;                   // column수, row수
$count=mysqli_num_rows($result);           // 출력할 제품 개수
$icount=0;       // 출력한 제품개수 카운터
echo("<table border='0' cellpadding='0' cellspacing='0' style='right:1350px;'>");
for ($ir=0; $ir<$num_row; $ir++)
{
     echo("<tr>");
     for ($ic=0;  $ic<$num_col;  $ic++)
    {
         if ($icount < $count)
        {
             $row=mysqli_fetch_array($result);
			 $price1=number_format($row[price17]);
             echo("<td width='300' height='205' align='center' valign='top'>

						<table border='0' cellpadding='0' cellspacing='0' width='200' class='cmfont'>

							<tr> 

								<td align='center'> 

									<a href='product_detail.php?no=$row[no17]'><img src='product/$row[image117]' width='180' height='200' border='0'></a><br>

								</td>

							</tr>

							<tr><td height='15'>");
							
							echo("</td></tr>

							<tr><br><br> ");

								echo("<td height='20' align='center'><a href='product_detail.php?no=$row[no17]'><font color='444444'>$row[name17]</font></a><br><br>&nbsp; ");
								
									/*if($row[icon_hit17]==1){
									echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									}*/
									if($row[icon_new17]==1){
									echo("<img src='images/custom_28.gif' align='absmiddle' vspace='1'><br><br>");
									}
									if($row[icon_sale17]==1){
									echo("<img src='images/custom_27.gif' align='absmiddle' vspace='1'><br><br>");} /*<font color='red'>$row[discount17]%</font>
									*/
									
									
								echo("</td>");
								
							echo("</tr><br><br>");
	
							

							if($row[icon_sale17]==1){
							
							echo("<tr><td height='20' align='center'><b><strike>$price1 won</strike></b></td></tr>");
							
							$price=number_format(round($row[price17]*(100-$row[discount17])/100, -1) );
							echo("<tr><td height='20' align='center'><b>$price won</b></td></tr>");
							}
							else
							echo("<tr><td height='20' align='center'><b>$price1 won</b></td></tr>");

							

						
						echo("</table>

					</td>");
         }
         else
             echo("<td></td>");      // 제품 없는 경우
         $icount++;
     }
    echo("</tr>");
}
echo("</table>");
?>
<tr><td height="50"></td></tr>
				</tr>


				<tr><td height="50"></td>

				<td><div class="imgBoxDiv"  style=padding-left:210px;>
      <div class="imgDiv"><a href='product.php?menu=2'><img src="images/main02_item01.jpg"></div>
      <div class="imgDescDiv"><a href='product.php?menu=2'>피어싱 베스트 바로가기▶</a>  
	  <div>
  </div></td></tr>

  <td height="50"></td>

<table border="0" cellpadding="0" cellspacing="0" width="300" class="cmfont">
  <hr> 
  <br><br><br>
WEEKLY BEST ITEM<br><br><br>
   <tr>
   <td rowspan="2" ><a href="#"><img src="images/we.JPG" width="400" height="420" border="0" style=padding:10px;style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60"></td>
      <td><a href="product_detail.php?no=16"><img src="images/3ca01337f08085626f4c763349795462.gif" width="200" height="200" border="0" style=padding:10px; style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60"></a></td>
      <td><a href="product_detail.php?no=25"><img src="images/0250060000752.jpg" width="200" height="200" border="0"style=padding:10px;style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60"></a></td>
   </tr>

   <tr>
      <td><a href="product_detail.php?no=24"><img src="images/0030010012592.jpg" width="200" height="200" border="0"style=padding:10px;style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60"></a></td>
	  <td><a href="product_detail.php?no=22"><img src="images/deb3877226651e5052a410ae13cbd74b.gif" width="200" height="200" border="0"style=padding:10px;style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60"></a></td>
   </tr>


</table>
			</table>

 

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

 

<!-------------------------------------------------------------------------------------------->	

<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->

<!-------------------------------------------------------------------------------------------->	

<?

	include"main_bottom.php";

?>

	