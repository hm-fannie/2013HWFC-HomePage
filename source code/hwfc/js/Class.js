function Class(show)
{
	document.getElementById("class"+show).className="ClassShow";
	document.getElementById("comtable"+show).style.display="block";
	for(var i=0;i<3;i++)
	{
		if(i!=show){
		document.getElementById("class"+i).className="ClassHide";
		document.getElementById("comtable"+i).style.display="none";
		}
	}

}