<?php 
    require_once ("main.php");
function substring($str, $start, $length){ //比较好用字符串截取函数
$len = $length;
if($length < 0){
$str = strrev($str); 
$len = -$length;
}
$len= ($len < strlen($str)) ? $len : strlen($str);
for ($i= $start; $i < $len; $i ++)
{
       if (ord(substr($str, $i, 1)) > 0xa0)
       {
         $tmpstr .= substr($str, $i, 2);
         $i++;
       } else {
         $tmpstr .= substr($str, $i, 1);
       }
}
if($length < 0) $tmpstr = strrev($tmpstr);
return $tmpstr;
}
?>
<div class="rightbox">
	<div class="leftblank"></div>
	<div class="rightcontain">
		<div class="scanImg" id="scanImg0">
		<div class="scancontain">
			<div class="scanRight" >
				<div class="scanBig">
					
					<img id="scanBig0" src="img/pic/scanImg0.jpg"  width=480 height=290px>
					<img id="scanBig1" src="img/pic/scanImg1.jpg"  width=480 height=290px>
					<img id="scanBig2" src="img/pic/scanImg2.jpg"  width=480 height=290px>
					<img id="scanBig3" src="img/pic/scanImg3.jpg"  width=480 height=290px>
					
				</div>
				<div id="scanT">
				09级梯队BAT 2013年软件学院院内赛 夺得冠军
				</div>
				</div>
			<div class="scanMiddle"></div>
			<div class="scanLeft">
				<div class="imgBlank"></div>
				<div class="scanBotton">
					<div class="scanShow" id="scan0" ></div>
					<div class="smallImg"><img src="img/pic/scanImg0.jpg"width=120 height=73 onclick="scan(0)"></div>
				</div>
				<div class="scanBotton">
					<div class="scanhide" id="scan1"></div>
					<div class="smallImg"><img src="img/pic/scanImg1.jpg"width=120 height=73 onclick="scan(1)"></div>
				</div>
				<div class="scanBotton">
					<div class="scanhide" id="scan2"></div>
					<div class="smallImg"><img src="img/pic/scanImg2.jpg"width=120 height=73 onclick="scan(2)"></div>
				</div>
				<div class="scanBotton">
					<div class="scanhide" id="scan3"></div>
					<div class="smallImg"><img src="img/pic/scanImg3.jpg"width=120 height=73 onclick="scan(3)"></div>
				</div>
			</div>
		</div>
		</div>
		<div class="leftblank"></div>
		<div class="announcement">
			<div class="announleft">
				<div class="announleftblank"></div>
				<div class="announlogo">
					<img src="img/announcement.png">
				</div>
			</div>
			<div class="announmiddle"></div>
			<div class="announsign">
				<img class="sign0" src="img/sign.png">
				<img class="sign1" src="img/sign.png">
			</div>
			<div class="announmiddle"></div>
			<div class="annountitle">
			<?php
				$query1="SELECT * FROM news_announcement WHERE pubID>39999 AND pubID<50000 ORDER BY pubTime DESC";
				$result = $databaseConnection-> query($query1);
				$row = $result->fetch_array();
				echo<<<EOA
				<form name="s{$row['pubID']}" action="news.php" method="get"><input type="hidden" name="pubID" value="{$row['pubID']}"/></form>
				<a href="javascript:s{$row['pubID']}.submit();"><div title="{$row['pubTitle']}" class="annountitleT"id="annountitle0" >{$row['pubTitle']}</div></a>
EOA;
				$row = $result->fetch_array();
				echo<<<EOB
				<form name="s{$row['pubID']}" action="news.php" method="get"><input type="hidden" name="pubID" value="{$row['pubID']}"/></form>
				<a href="javascript:s{$row['pubID']}.submit();"><div title="{$row['pubTitle']}" class="annountitleT"id="annountitle1" >{$row['pubTitle']}</div></a>				
			</div>
EOB;
?>
			<div class="announright">	
				<div class="more">
				<a href="news.php"><img src="img/more.png"></a>
				</div>
			</div>
			
		</div>
		<div class="leftblank"></div>
		<div class="news">
			<div class="newsUpBlank"></div>
			<div class="newsHead">
			<img class="newsLogo" src="img/news.png">
			<a href="news.php"><img class="newsmore" src="img/more.png"></a>
			</div>
			<div class="newsContain">
				<div class="newsPhoto">
					<img class="newsPH" id="newsPh0" " src="img/pic/scanImg0.jpg" width=215px height=135px>
					<img class="newsPH" id="newsPh1" onmouseover="newsPh(1)" src="img/pic/scanImg1.jpg" width=215px height=135px>
					<img class="newsPH" id="newsPh2" onmouseover="newsPh(2)" src="img/pic/scanImg2.jpg" width=215px height=135px>
					<img class="newsPH" id="newsPh3" onmouseover="newsPh(3)" src="img/pic/scanImg3.jpg" width=215px height=135px>
					<img class="newsPH" id="newsPh4" onmouseover="newsPh(4)" src="img/pic/scanImg2.jpg" width=215px height=135px>
					
				</div>
				<div class="newsSign">
					<img class="sign2" src="img/sign.png">
					<img class="sign3" src="img/sign.png">
					<img class="sign3" src="img/sign.png">
					<img class="sign3" src="img/sign.png">
					<img class="sign3" src="img/sign.png">
				</div>
				<div class="newsTitles">
				<?php
				$query1="SELECT * FROM news_announcement WHERE pubID<40000 OR pubID>49999 ORDER BY pubTime DESC";
				$result = $databaseConnection-> query($query1);
				
				
				for($i=0,$row = $result->fetch_array();$i<5  && $row = $result->fetch_array();$i++)
				{
				$title=$row['pubTitle'];
				
				if((mb_strlen($title))>55)
				{$title=mb_strcut($title, 0, 52, 'UTF8')."...";}
				$time=strtotime($row['pubTime']);
				$Time=date('Y-m-d',$time);
				echo<<<EOC
				
				<a title="{$row['pubTitle']}" href="javascript:s{$row['pubID']}.submit();"><div class="newsTitleT" id="news$i" onmouseover="newsPh($i)">$Time $title</div></a>
				<form style="margin-bottom:0em"name="s{$row['pubID']}" action="news.php" method="get"><input type="hidden" name="pubID" value="{$row['pubID']}"/></form>

EOC;
				
				
				}
				
				
				?>
					
			
					
				</div>
			</div>
			
		</div>
		<div class="leftblank"></div>
		<div class="video">
			<div class="newsUpBlank"></div>
			<div class="newsHead">
				<img class="newsLogo" src="img/video.png">
				<a href="video.php"><img class="videoMore" src="img/more.png"></a>
			</div>
			<div class="videoContain">
			<?php
		
                    $query1="SELECT * FROM video ORDER BY vDate DESC";
                    $result = $databaseConnection-> query($query1);
			for($i=0,$row = $result->fetch_array();$i<3;$i++,$row = $result->fetch_array()){
			echo "
			<a target='_blank' href='".$row['vUrl']."'>
					<div class='aVideo'>
					
						<div class='vPhoto'>
							<img style='border:none;'src='".$row['vPhoto']."'width=128 height=96>
							<div class='play'>
								<img id='play".$i."' style='border:none;'src='img/play.png' >
							</div>
						</div>
						<div class='vTitle' id='vTitle".$i."'>"
						.$row['vDate']."</br>".$row['vTitle']."
						</div>
					</div>
					</a>";}
			?>
				
			
		</div>
	

	</div>
	
</div>
</div>
</div>
	<script type="text/javascript" src="js/club.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/news.js"></script>
	<script type="text/javascript" src="js/shownext.js"></script>
	<script type="text/javascript" src="js/scanImg.js"></script>
	</body>
</html>
