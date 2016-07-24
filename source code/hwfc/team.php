<?php 

    require_once ("main.php");
?>

<div class="clubbox">
	<div class="leftblank"></div>
		<div class="clubback">
			<div class="length"></div>
			<div class="clubContain">
				<div class="clubHead">
				<img class="clublogo" src="img/teamlogo.png">
				</div>
				<div class="cutline">
				<a href="index.php"><span class="cutHome">首页</span></a>
				<a href="team.php"><span class="cutClub">球队</span></a>
				</div>
				
				<?php
				if(is_array($_GET)&&count($_GET)>0){
					if(isset($_GET['mid']))
					{
					$query1="SELECT * FROM member WHERE mid='{$_GET['mid']}'";
                    $result = $databaseConnection-> query($query1);
					$row = $result->fetch_array();
					echo '
						<div class="teamUnderCut"></div>
						<div class="aboutMember">
					<img class="memberphoto" src="'.$row['mPhoto'].'"width=300></br></br>
					'.$row['mAbout'].'</br>
					位置：'.$row['mPosition'].'</br>
					ta的座右铭：'.$row['motto'].'</div>';
					}
					}
					
					
					
				else{
				
				echo<<<EOB
				<div class="undercut">
					<div class="teamcutshow" id="team0" onclick="team(0)" onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
					<span>在队球员</span>
					</div>
					<div class="cutblank"></div>
					<div class="teamcuthide" id="team1" onclick="team(1)" onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
					<span>离队球员</span>
					</div>
				</div>
				<div class="teamUnderCut"></div>
				<div class="inteam" id="inteam0">
					<div class="blank0"></div>
EOB;
$j=0;
			for($i=0;$i<5;$i++)
					{
						if($i==0){$query1="SELECT * FROM member WHERE mPosition='门将' ORDER BY mid";}
						if($i==1){$query1="SELECT * FROM member WHERE mPosition='后卫' ORDER BY mid";}
						if($i==2){$query1="SELECT * FROM member WHERE mPosition='中锋' ORDER BY mid";}
						if($i==3){$query1="SELECT * FROM member WHERE mPosition='前锋' ORDER BY mid";}
						if($i==4){$query1="SELECT * FROM member WHERE mPosition='后勤' ORDER BY mid";}
						$result = $databaseConnection-> query($query1);
						echo<<<EOT
						<div class="teamLeft" id="TeamR$i">
							<div class="TLleftblank"></div>
							<div class="TLtopblank"></div>
EOT;
						
						while($row = $result->fetch_array())
						{
							echo<<<EOD
							<div class="member">
							<form name="member$j" action="team.php" method="get">
							<input type=hidden name="mid" value="{$row['mid']}"/>
							</form>
							<a href="javascript:member$j.submit();"><img style="border:2px solid #0099ff" src="{$row['smallPhoto']}" width=130 height=160></a>
							<span>{$row['mName']}</span>
							</div>
							<div class="memberblank"></div>
						
EOD;
						$j++;
						}
						echo "</div>";
					
					}
					
			
						echo '<div class="teamRight">';
			
			for($i=0;$i<5;$i++)
			{
				switch($i)
				{
					case 0:$position="门</br>将";break;
					case 1:$position="后</br>卫";break;
					case 2:$position="中</br>场";break;
					case 3:$position="前</br>锋";break;
					case 4:$position="后</br>勤";break;				
				}
				$show="positionhide";
				if($i==0){$show="positionshow";}
				echo<<<EOF
				<div class="$show" id="position$i" onclick="position($i)"onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;"></br>$position</div>
				<div class="positionblank"></div>
				
EOF;
			}
			
			echo '			</div>
					</div>
				<div class="inteam" id="inteam1">
					<div class="blank0"></div>
					<div class="TLleftblank"></div>
					<div class="TLtopblank"></div>';
					
			
				$query1="SELECT * FROM member WHERE mPosition='离队' ORDER BY mid";
				$result = $databaseConnection-> query($query1);
				while($row = $result->fetch_array())
				{
							echo<<<EOA
							<div class="member">
							<form name="member$j" action="team.php" method="get">
							<input type=hidden name="mid" value="{$row['mid']}"/>
							</form>
							<a href="javascript:member$j.submit();"><img style="border:2px solid #0099ff" src="{$row['smallPhoto']}" width=130 height=160></a>
							<span>{$row['mName']}</span>
							</div>
							<div class="memberblank"></div>
							
EOA;
						$j++;
				}
}
				?>
				</div>
			</div>
		</div>
	</div>
	
</div>

	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/team.js"></script>
	<script type="text/javascript" src="js/shownext.js"></script>
	<script type="text/javascript" src="js/club.js"></script>
	<script type="text/javascript" src="js/navi.js"></script>
	<script type="text/javascript" src="js/scanImg.js"></script>
	<script>navi(4);</script>
	</body>
</html>
