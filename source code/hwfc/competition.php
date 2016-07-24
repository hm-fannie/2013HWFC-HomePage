<?php 

    require_once ("main.php");
?>

<div class="clubbox">
	<div class="leftblank"></div>
		<div class="clubback">
			<div class="length"></div>
			<div class="clubContain">
				<div class="clubHead">
				<img class="clublogo" src="img/competitionlogo.png">
				</div>
				<div class="cutline">
				<a href="index.php"><span class="cutHome">首页</span></a>
				<a href="competition.php"><span class="cutClub">赛事信息</span></a>
				</div>
				<div class="newsUnderCut"></div>
				<div class="competionClass">
					<div class="ClassBlankLeft"></div>
					<div class="ClassBlankTop"></div>
					<div class="ClassShow" id="class0"  onclick="Class(0)"onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;"><span>院系杯</span></div>
					<div class="ClassHide" id="class1"  onclick="Class(1)"onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;"><span>大学城联赛</span></div>
					<div class="ClassHide" id="class2"  onclick="Class(2)"onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;"><span>其他</span></div>
				</div>
				
				
				<?php
				for($i=0;$i<3;$i++)
				{
				
					if($i==0){$query1="SELECT * FROM competition WHERE cName='院系杯' ORDER BY cDate DESC";}
					if($i==1){$query1="SELECT * FROM competition WHERE cName='大学城联赛'  ORDER BY cDate DESC";}
					if($i==2){$query1="SELECT * FROM competition WHERE cName!='大学城联赛' AND cName!='院系杯'  ORDER BY cDate DESC";}
                    $result = $databaseConnection-> query($query1);
					$j=0;
					echo<<<EOT
					<table class="competiontable" id="comtable$i" border="0" cellspacing="0" cellpadding="0" class="competionTable" width=550>
					<tr class="competitiontableth">
						<th>赛事</th><th>赛制</th><th>时间</th><th>对阵队伍</th><th>比分</th><th>场地</th><th>战报</th><th>相册</th>
					</tr>
					
EOT;
					while($row = $result->fetch_array())
					{
						$k=$j%2;
						$cAbout=$row['cAbout'];
						if($row['cAbout']==NULL){$about="无";}
						else{$about="<a href='javascript:s$cAbout.submit();'>战报</a>" ;}
						if($row['cPhoto']==NULL){$photo="无";}
						else{$photo="<a href='{$row['cPhoto']}'>相册</a>" ;}
						echo<<<EOF
						<html>
						<tr class="ctd$k">

						<td style="border-right:1px solid white" >{$row['cName']}</td>
						<td style="border-right:1px solid white">{$row['cFormat']}</td>
						<td style="border-right:1px solid white">{$row['cDate']}</td>
						<td style="border-right:1px solid white">{$row['rival']}</td>
						<td style="border-right:1px solid white">{$row['result']}</td>
						<td style="border-right:1px solid white">{$row['place']}</td>
						<td style="border-right:1px solid white">					
						<form name="s$cAbout" action="news.php" method="get"><input type="hidden" name="pubID" value="$cAbout"/></form>
$about</td>
						<td>$photo</td>
						</tr>
EOF;
						$j++;
					}
				}
					echo "</table>";
					
					
					
					




				
				?>
				
			</div>
		</div>
	</div>
	
</div>

	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/Class.js"></script>
	<script type="text/javascript" src="js/shownext.js"></script>
	<script type="text/javascript" src="js/club.js"></script>
	<script type="text/javascript" src="js/navi.js"></script>
	<script type="text/javascript" src="js/scanImg.js"></script>
	<script>navi(3);</script>
	</body>
</html>
