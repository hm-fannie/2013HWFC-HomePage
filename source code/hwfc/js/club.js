function clubtext(show){
document.getElementById("club"+show).className="cutshow";
document.getElementById("clubtext"+show).style.display="block";
	for(var i=0;i<4;i++){
		if(i!=show){
			document.getElementById("club"+i).className="cuthide";
			document.getElementById("clubtext"+i).style.display="none";
		}
	}
}

