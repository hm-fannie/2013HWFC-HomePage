<?php 

    require_once ("main.php");
?>

<div class="clubbox">
	<div class="leftblank"></div>
		<div class="clubback">
			<div class="length"></div>
			<div class="clubContain">
				<div class="clubHead">
				<img class="clublogo" src="img/newslogo.png">
				</div>
				<div class="cutline">
				<a href="index.php"><span class="cutHome">首页</span></a>
				<a href="news.php"><span class="cutClub">新闻公告</span></a>
				</div>
				<div class="newsUnderCut"></div>
				<?php
				if(is_array($_GET)&&count($_GET)>0){
					if(isset($_GET['pubID']))
					{
					$query1="SELECT * FROM news_announcement WHERE pubID='{$_GET['pubID']}'";
                    $result = $databaseConnection-> query($query1);
					$row = $result->fetch_array();
					$time=strtotime($row['pubTime']);
					$Time=date('Y年n月j日',$time);
					$weekarray=array(日,一,二,三,四,五,六);
					$Day=$weekarray[date("w",$time)];
					echo<<<EOF
					
					<div class="newsTextTitle"><span>{$row['pubTitle']}</span></div>
				<div class="newsTime"><span>发布时间： $Time 星期$Day</span></div>
				<div class="newsText"><pre>{$row['pubAbout']}</pre></div>

EOF;

				}
				}
				else{
				  $query1="SELECT * FROM news_announcement ORDER BY pubTime DESC";
                    $result = $databaseConnection-> query($query1);
					$i=0;
					while($row = $result->fetch_array()){
					$time=strtotime($row['pubTime']);
					$Time=date('Y年n月j日',$time);
			
					$title=$row['pubTitle'];
				if((mb_strlen($title))>95)
				{$title=mb_strcut($title, 0, 92, 'UTF8')."...";}
					echo<<<EOT
					<div class="aNews">
					<form name="aNews$i" action="news.php" method="get">
					<input type=hidden name="pubID" value="{$row['pubID']}"/>
					</form>
						<img class="sign" src="img/sign.png">
						<div class="aNewsblank"></div>
						<a title="{$row['pubTitle']}" class="aNewsTitle" href="javascript:aNews$i.submit();">$Time $title</a>
					</div>
					
EOT;
					$i++;
					}
				}
				?>
				
			</div>
		</div>
	</div>
	
</div>

	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/shownext.js"></script>
	<script type="text/javascript" src="js/club.js"></script>
	<script type="text/javascript" src="js/navi.js"></script>
	<script type="text/javascript" src="js/scanImg.js"></script>
	<script>navi(2);</script>
	</body>
</html>
