<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link href="css/Main.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/Tab.js"></script>
        <title>پارسیان همراه</title>
    </head>
    <body style="background:url(img/bgbody.gif)">
    	<div class="topline"></div>
    	<table border="0" width="900" align="center" style="margin-top:-5px;">
        	<tr>
            	<td colspan="2">
            	<div class="box" style="width:900px; height:200px; background:url(img/header.png) right no-repeat;">
                    <div class="divtr">
                    	<a href="index.php?group=3"><div class="divtd" style=" background-image:url(img/4sim.gif)"></div></a>
                    	<a href="index.php?group=1"><div class="divtd" style="margin-right:5px; background-image:url(img/2sim.gif)"></div></a>
                    	<a href="index.php?group=2"><div class="divtd" style="margin-right:5px; background-image:url(img/original.gif)"></div></a>
                    	<a href="index.php?group=4"><div class="divtd" style="margin-right:5px; width:218px; background-image:url(img/bluhands.gif)"></div></a>
                    </div>
                </div>
            	<div class="menu">
                	<a href="#">صفحه اصلی</a>
                	<a href="#">پیگیری مرسولات پستی</a>
                	<a href="#">راهنمای خرید پستی</a>
                	<a href="#">سوالات متداول</a>
                	<a href="#">ارتباط با ما</a>
                </div>
                </td>
            </tr>
        	<tr>
            	<td>
                    <div class="box" style="width:620px; height:200px; text-align:right; padding:10px; margin-top:15px;">
                        <iframe src="Slider.php" frameborder="0" width="620" height="310" scrolling="no" style="margin:-25px 0 0 -7px;"></iframe>
                    </div>
                  <table border="0" cellpadding="2" cellspacing="1" class="box" style="width:640px; text-align:right; padding:10px; margin:20px 0 0 0px;" >
                       <tr><td colspan="2" style="background:#666; width:640px; margin-right:20px; padding:5px; color:#fff; border-radius:5px;">لیست کلی گوشیها</td></tr>
                        <?php
						require("class/connection.php");
						$connector=new connection();
						$query="SELECT * FROM banner WHERE bannerId='1'";
						$result=$connector->queryRun($query);
						$row = mysql_fetch_array($result);
						$image1=$row['image1'];
						$image2=$row['image2'];
						$image3=$row['image3'];
						$image4=$row['image4'];
						$image5=$row['image5'];
						$image6=$row['image6'];
						$image7=$row['image7'];
						$image8=$row['image8'];
						$image9=$row['image9'];
						$image10=$row['image10'];
                        error_reporting(0); //flag
                        $connector=new connection();
                        if($_GET['group']!=''){ $group=$_GET['group']; $query="SELECT *
                        FROM `goods`
                        WHERE `group` = '$group'";} else
                        $query="SELECT * FROM goods";
                        $result=$connector->queryRun($query);
                        $counter=1;	 	 	 	
                        echo '<tr>' ;
                        while($row = mysql_fetch_array($result))
                          {
                            if($row['brand']=='1') $brandImage='<img src="themes/default/images/nokia.gif" />';
                            if($row['brand']=='2') $brandImage='<img src="themes/default/images/lg.gif" />';
                            if($row['brand']=='3') $brandImage='<img src="themes/default/images/huawei.gif" />';
                            if($row['brand']=='4') $brandImage='<img src="themes/default/images/apple.gif" />';
                            if($row['brand']=='5') $brandImage='<img src="themes/default/images/sony-ericsson.gif" />';
                            if($row['brand']=='6') $brandImage='<img src="themes/default/images/htc.gif" />';
                            if($row['brand']=='7') $brandImage='<img src="themes/default/images/samsung.gif" />';
                            if($row['brand']=='8') $brandImage='<img src="themes/default/images/glx.gif" />';
                            echo '<td>
                            <table height="450" cellspacing="0" cellpadding="0" style="background:#fff; border-radius:10px; padding:10px; margin-top:10px;">
                          <tr>
                            <td colspan="2" align="center" style="background:#fff; border-radius:5px; width:270px;"><h2>'.$row['goodName'].'</h2></td>
                          </tr>
                          <tr>
                            <td width="280px" style="max-width:280px" colspan="2"><img src="'.$row['photoSource'].'" width="280px" style="max-width:280px"/></td>
                          </tr>
                          <tr>
                            <td colspan="2">
							  <div><h2 style="float:right; margin-top:15px;">قیمت:</h2><p class="sala">'.$row['price'].' تومان</p></div>
							</td>
                          </tr>
                          <tr style="display:none;">
                            <td>برند</td>
                            <td>'.$brandImage.'</td>
                          </tr>
                          <tr>
                            <td align="center" class="buy"><a href="comments.php?goodId='.$row['goodId'].'">اطلاعات بیشتر</a></td>
                            <td align="center" class="bas"><a class="bas" href="'.$row['purchaseLink'].'">خرید پستی</a></td>
                          </tr>
                          <tr style="display:none">
                            <td colspan="2" align="center"><input type="submit" class="buy" value="افزودن به سبد خرید" /></td>
                          </tr>
                        </table>
                            </td>';
                            if($counter%2==0) echo '</tr><tr>';
                            $counter++;
                          }
                          
                        ?>
                        </tr>
                        </table>
                  <div class="hbanner" style="margin-top:20px;">
                  <img src="<?php echo $image5; ?>" width="630px" height="110px" style="padding:5px" />
                  </div>
                </td>
            	<td style="vertical-align:top">
                	<div class="vbanner" style="margin-top:15px;">
                    <img src="<?php echo $image9; ?>" width="225px" height="110px" style="padding:5px" />
                    </div>
                	<div class="vbanner">
                    <img src="<?php echo $image10; ?>" width="225px" height="110px" style="padding:5px" />
                    </div>
                    <div class="box" style="width:215px; height:180px; margin-top:20px; padding:10px;">
                    	<div class="sidebox">ارتباط با مدیر</div>
                        <br />
                     <center><a target="_self" title="Yahoo Status" href="ymsgr:sendim?آی دی ياهو شما"><img border="0" src="http://opi.yahoo.com/online?u=آی دی ياهو شما&m=g&t=14"></a></center><div style="display:none"><h1><a href="">نمایش وضعیت در یاهو</a></h1></div>

                    </div>
                    <div class="box" style="width:215px; height:180px; margin-top:20px; padding:10px;">
                    	<div class="sidebox">لینکهای متنی</div>
					<?php
					$connector=new connection();
					$query="SELECT * FROM links";
					$result=$connector->queryRun($query);	 	 	 	
					$counter=0;
					while($row = mysql_fetch_array($result))
					  echo '<div align="right"><a href="'.$row['linkTarget'].'">'.$row['linkName'].'</a></div>';
					
					?>
                    </div>
                    <div class="box" style="width:215px; margin-top:20px; padding:10px;">
                    	<div class="sidebox">امکانات سایت</div>
                    	<div class="divtd2" style="margin-top:5px; background-image:url(img/4sim.gif)"></div>
                    	<div class="divtd2" style="margin-top:5px; background-image:url(img/2sim.gif)"></div>
                    	<div class="divtd2" style="margin-top:5px; background-image:url(img/original.gif)"></div>
                    	<div class="divtd2" style="margin-top:5px; width:218px; background-image:url(img/bluhands.gif)"></div>
                    </div>
                    <div class="box" style="width:215px; height:180px; margin-top:20px; padding:10px;">
                    	<div class="sidebox">آمار سایت</div>
                        <!-- Begin WebGozar.com Counter code -->
<script type="text/javascript" language="javascript" src="http://www.webgozar.ir/c.aspx?Code=2495356&amp;t=counter" ></script>
<noscript><a href="http://www.webgozar.com/counter/stats.aspx?code=2495356" target="_blank"  style="width:250px">&#1570;&#1605;&#1575;&#1585;</a></noscript>
<!-- End WebGozar.com Counter code -->
                        
                    </div>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
            	<div style="width:200px;">
                <img src="img/lg.png"/>
                </div>
                <hr />
                <div align="right" style="text-align:right; margin-top:5px;">
               	  <li class="li"><a href="#">صفحه اصلی</a></li>
                	<li class="li"><a href="#">پیگیری مرسولات پستی</a></li>
                	<li class="li"><a href="#">راهنمای خرید پستی</a></li>
                	<li class="li"><a href="#">سوالات متداول</a></li>
                	<li class="li"><a href="#">ارتباط با ما</a></li>
                </div>
            </div>
            <div class="ftr">
  				Developed By Kian Art Co.&nbsp;&copy; 2012
            </div>
            </center>
                </td>
            </tr>
        </table>

    </body>
</html>
