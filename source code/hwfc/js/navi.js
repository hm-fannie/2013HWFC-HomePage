function navi(show)
{
	document.getElementById("navi"+show).className="naviCurrent";
	
	for(var i=0;i<6;i++){
		if(i!=show){
			document.getElementById("navi"+i).className="naviNot";
		}
	}
}