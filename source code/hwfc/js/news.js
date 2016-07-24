var up=0;
function newsPh(show)
{
	for(var i=0;i<5;i++)
	{
		$("#newsPh"+show).display="block";
		
		if(i!=show){
		$("#newsPh"+up).stop(true,false).fadeOut(300);
		}
	}
	$("#newsPh"+show).stop(true,false).fadeIn(300);
	up=show;
	
	

}