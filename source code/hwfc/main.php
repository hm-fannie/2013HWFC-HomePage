<?php 
    require_once  ("Includes/connectDB.php");        
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<head class="abc">

<meta http-equiv="Content-Language" content="zh-CN" />
<title>HelloWorld Football Club_混碗饭吃足球俱乐部</title>
<link rel="stylesheet" type="text/css" href="css/hwfcstyle.css">
<link rel="stylesheet" type="text/css" href="css/team.css">
<link rel="stylesheet" type="text/css" href="css/competition.css">
<link rel="stylesheet" type="text/css" href="css/navigation.css">
<link rel="stylesheet" type="text/css" href="css/shownext.css">
<link rel="stylesheet" type="text/css" href="css/club.css">
<link rel="stylesheet" type="text/css" href="css/scanImg.css">
<link rel="stylesheet" type="text/css" href="css/announcement.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" type="text/css" href="css/video.css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<div class="container">
<div class="blank"></div>
<div class="navigation">
	<div class="navigationBotton">
		<a href="index.php" title=""><div class="naviCurrent"id="navi0">首页</div></a>
		<a href="club.php" title=""><div class="naviNot"id="navi1" >俱乐部</div></a>
		<a href="news.php" title=""><div class="naviNot"id="navi2">新闻公告</div></a>
		<div id="navilogoout"><div class="navilogo"><img src="img/logo.gif" width=70></div></div>
		<a href="competition.php" title=""><div class="naviNot" id="navi3">赛事信息</div></a>
		<a href="team.php" title=""><div class="naviNot" id="navi4">球队</div></a>
		<a href="video.php" title=""><div class="naviNot" id="navi5" >精彩视频</div></a>
	</div>
</div>
<div class="navidownblank">
</div>
<div class="leftbox">
	<div class="leftblank"></div>
	<div id="shownext">
		<div class="leftbotton">
			<div class="showbotton" id="select0"  onclick="select(0)"onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;" >
			<span>下一场比赛</span>
			</div>
			<div class="hidebotton" id="select1" onclick="select(1)"onmouseover="this.style.cursor='pointer';this.style.cursor='hand'" onmouseout="this.style.cursor='default'" onclick="document.getElementById('ShowContent').innerHTML='';return false;">
			<span>历史战绩</span>
			</div>
		</div>
		<div class="contain">
			<div id="contain0">
				 <?php
                    $query1="SELECT * FROM competition ORDER BY cDate";
                    $result = $databaseConnection-> query($query1);
                    $time=time();
                    for( $row = $result->fetch_array(); strtotime($row['cDate'])<$time && $row!=NULL;$row = $result->fetch_array() ){}
                    if($row==NULL){$row['cDate']=date("Y-m-d");$row['place']="中大东校区";$row['rival']="HWFC";$row['cName']="每周一赛";$row['cFormat']="体能训练";$row['ctime']=date("H:i",time());}
                    else{$row['ctime'] = date("H:i",strtotime($row['ctime']));}
					?>
                <div class="timeAddress">
					<span class="time"><?php echo $row['cDate']." ".$row['ctime'];?> </span>
					<span class="address"><?php echo $row['place'];?></span>
				</div>
				<div class="vsback">
					<div class="vscontain">
						<div class="vslogo"><img src="img/logo.png" height=90px></div>
						<div class="vs"><img src="img/vs.png"></div>
						<div class="rival">
							<div class="rivalBlank"></div>
							<div class="rivaltall">
								<div class="rivalname"><?php echo $row['rival'];?></div>
							</div>
						</div>
					</div>
					<div class="name"><?php echo $row['cName']." ".$row['cFormat']; ?></div>
				</div>
				
			</div>
			<div id="contain1">
			<table border="0" cellspacing="0" cellpadding="0" class="table1" width=250>
			    <?php
                    $query1="SELECT * FROM competition ORDER BY cDate DESC";
                    $result = $databaseConnection-> query($query1);
                     for( $row = $result->fetch_array(); strtotime($row['cDate'])>$time && $row!=NULL;$row = $result->fetch_array() ){}
                ?>
               <tr class="head">
					<th>比赛时间</th><th>对阵球队</th><th>比分</th>
				</tr>
	
			
				<?php for($i = 0 ; $i < 6 ; $i++): ?>
					<tr class="tr<?php echo  $i%2+1; ?>">
					
					<td><?php echo $row['cDate']; ?> </td><td><?php echo $row['rival']; ?></td><td><?php echo $row['result']; ?> </td></tr>
				<?php $row = $result->fetch_array(); ?>
                <?php endfor; ?>				

			</table>
			</div>
		</div>	
	</div>
	<div class="leftblank"></div>
	<div class="weibo">
<iframe width="250" height="535" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=250&height=535&fansRow=2&ptype=0&speed=0&skin=9&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=2263212780&verifier=e6ddd29a&dpc=1"></iframe>
	</div>
	
		<div class="weixin">
	
	</div>
</div>
<div class="middleblank">
</div>