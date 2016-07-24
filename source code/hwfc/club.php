<?php 

    require_once ("main.php");
?>

<div class="clubbox">
	<div class="leftblank"></div>
		<div class="clubback">
			<div class="length"></div>
			<div class="clubContain">
				<div class="clubHead">
				<img class="clublogo" src="img/clublogo.png">
				</div>
				<div class="cutline">
				<a href="index.php"><span class="cutHome">首页</span></a>
				<a href="club.php"><span class="cutClub">俱乐部</span></a>
				</div>
				<div class="undercut">
					<div class="cutshow" id="club0" onclick="clubtext(0)" onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
					<span>简介</span>
					</div>
					<div class="cutblank"></div>
					<div class="cuthide" id="club1" onclick="clubtext(1)" onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
					<span>历史</span>
					</div>
					<div class="cutblank"></div>
					<div class="cuthide" id="club2" onclick="clubtext(2)" onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
					<span>球服</span>
					</div>
					<div class="cutblank"></div>
					<div class="cuthide" id="club3" onclick="clubtext(3)" onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
					<span>荣誉</span>
					</div>
				</div>
				<div class="clubtext" id="clubtext0">
					<?php
					 $query1="SELECT * FROM club";
                     $result = $databaseConnection-> query($query1);
					 $sucess=($row = $result->fetch_array());
                     if($sucess){echo "<pre>".$row['clAbout']."</pre>";}
					?>
				</div>
				<div class="clubtext" id="clubtext1">
					<?php
					if($sucess){echo "<pre>".$row['clHistory']."</pre>";}
					?>
				</div>
				<div class="clubtext" id="clubtext2">
					<?php
					$query1="SELECT * FROM shirt order by buyTime DESC";
                    $result = $databaseConnection-> query($query1);
					while($row = $result->fetch_array()){
					echo $row['sName']."</br>".$row['sPhoto'].$row['sPlace']."球服</br>".$row['buyTime']."年购买</br></br></br>";
					}
					?>
				</div>
				<div class="clubtext" id="clubtext3">
					<?php
					$query1="SELECT * FROM honor order by hDate DESC";
                    $result = $databaseConnection-> query($query1);
					while($row = $result->fetch_array()){
					$date=strtotime($row['hDate']);
					echo date("Y年n月",$date)." ".$row['hName']." ".$row['hGrade']."</br>证书奖杯：".$row['hPhoto']."</br></br></br>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
	
</div>

	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/shownext.js"></script>
	<script type="text/javascript" src="js/club.js"></script>
	<script type="text/javascript" src="js/navi.js"></script>
	<script type="text/javascript" src="js/scanImg.js"></script>
	<script>navi(1);</script>
	</body>
</html>
