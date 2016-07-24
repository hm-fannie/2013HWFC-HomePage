function team(show){
document.getElementById("team"+show).className="teamcutshow";
document.getElementById("inteam"+show).style.display="block";
	for(var i=0;i<2;i++){
		if(i!=show){
			document.getElementById("team"+i).className="teamcuthide";
			document.getElementById("inteam"+i).style.display="none";
		}
	}
}
function position(show){
document.getElementById("position"+show).className="positionshow";
document.getElementById("TeamR"+show).style.display="block";
	for(var i=0;i<5;i++){
		if(i!=show){
			document.getElementById("position"+i).className="positionhide";
			document.getElementById("TeamR"+i).style.display="none";
		}
	}
}

