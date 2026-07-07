<div id="taskbarTimeDiv"></div><div id="miniTimeDiv"></div>
<?php
date_default_timezone_set('Asia/Tehran');
//ini_set('date.timezone', 'Asia/Tehran');


?>
<script language="JavaScript" type="text/javascript" >
<!--
var theTime = new Date('<?php echo date("Y"); ?>','<?php echo date("m"); ?>','<?php echo date("d"); ?>','<?php echo date("H"); ?>','<?php echo date("i"); ?>','<?php echo date("s"); ?>'); 
//alert('<?php echo date("m"); ?>');
//alert(theTime);
function startclock()
{
//var theTime=new Date();

var nhours=theTime.getHours();
var nmins=theTime.getMinutes();
var nsecn=theTime.getSeconds();
var nday=theTime.getDay();
var nmonth=theTime.getMonth();
var ntoday=theTime.getDate();
var nyear=theTime.getYear();
var AorP=" ";

if (nhours>=12)
    AorP="pm";
else
    AorP="am";

if (nhours>=13)
    nhours-=12;

if (nhours==0)
   nhours=12;

if (nsecn<10)
 nsecn="0"+nsecn;

if (nmins<10)
 nmins="0"+nmins;

if (nday==2)
  nday="sunday";
if (nday==3)
  nday="monday";
if (nday==4)
  nday="tuesday";
if (nday==5)
  nday="wednesday";
if (nday==6)
  nday="thursday";
if (nday==7)
  nday="friday";
if (nday==1)
  nday="saturday";



if (nyear<=99)
  nyear= "19"+nyear;

if ((nyear>99) && (nyear<2000))
 nyear+=1900;

fullTime='<div align=center style="border:thin solid white;background:white; width:90px"><font color=royalblue><b>'+nhours+":"+nmins+":"+'</font><font color=royalblue>'+nsecn+"&nbsp;</font></b>"+AorP+'</div><div style="border:thin solid white; width:90px; color:royalblue;border-top:none">'+' GMT+3.5 Tehran</div>';


miniTime='<span style="font-size:14px">'+nhours+":"+nmins+":"+'</span><font color=orange>'+nsecn+"&nbsp;</font>"+'<font color=lightgray>'+AorP+'</font>';


document.getElementById('miniTimeDiv').innerHTML='<font style="font-size:9px">'+miniTime+'</font>';
nsecn++;
theTime.setSeconds(nsecn);
//alert(nday);
setTimeout('startclock()',1000);

} 
startclock();

//startclock();
//-->
</script>

























