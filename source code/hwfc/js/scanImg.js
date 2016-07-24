var up=0;
$(function () {
	var index=0; 
	var picTimer;
	$("#scanImg0").hover(function () {
        clearInterval(picTimer);
    }, function () {
        picTimer = setInterval(function () {
            scan(index);
            index++;
            if (index == 4) { index = 0; }
        }, 4000); //此4000代表自动播放的间隔，单位：毫秒
    }).trigger("mouseleave");
});
function scan(show)
{
	for(var i=0;i<4;i++)
	{
		$("#scanBig"+show).display="block";
		
		if(i!=show){
		$("#scanBig"+up).stop(true,false).fadeOut();
		document.getElementById("scan"+i).className="scanhide";
		}
	}
	$("#scanBig"+show).stop(true,false).fadeIn();
	document.getElementById("scan"+show).className="scanShow";
	switch(show)
	{
		case 0:document.getElementById("scanT").innerHTML="09级梯队BAT 2013年软件学院院内赛 夺得冠军";break;
		case 1:document.getElementById("scanT").innerHTML="HWFC代表软件学院 夺得 2012年第七届院系杯 冠军";break;
		case 2:document.getElementById("scanT").innerHTML="HWFC与国防生足球队 友谊赛";break;
		case 3:document.getElementById("scanT").innerHTML="HWFC队长交接 李元博卸任 新任队长朱剑秋";break;
		default: break;
	}
	up=show;
	
	

}