<?php 

    require_once ("main.php");
?>

<div class="clubbox">
	<div class="leftblank"></div>
		<div class="clubback">
			<div class="length"></div>
			<div class="clubContain">
				<div class="clubHead">
				<img class="clublogo" src="img/videologo.png">
				</div>
				<div class="cutline">
				<a href="index.php"><span class="cutHome">首页</span></a>
				<a href="news.php"><span class="cutClub">精彩视频</span></a>
				</div>
				<div class="newsUnderCut"></div>
				<div class="videos">
				<?php
		
                    $query1="SELECT * FROM video ORDER BY vDate DESC";
                    $result = $databaseConnection-> query($query1);
					$i=0;
			while($row = $result->fetch_array()){
			echo "
			<a target='_blank' href='".$row['vUrl']."'>
					<div class='aVideos'>
					
						<div class='vPhoto'>
							<img style='border:none;'src='".$row['vPhoto']."'width=128 height=96>
							<div class='play'>
								<img id='play".$i."' style='border:none;'src='img/play.png' >
							</div>
						</div>
						<div class='viTitle' id='viTitle".$i."'>"
						.$row['vDate']."</br>".$row['vTitle']."
						</div>
					</div>
					</a>";
					$i++;}
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
	<script>navi(5);</script>
	</body>
</html>
