function select(show)
{
	document.getElementById("select"+show).className="showbotton";
	document.getElementById("contain"+show).style.display="block";
	for(var i=0;i<2;i++)
	{
		if(i!=show){
		document.getElementById("select"+i).className="hidebotton";
		document.getElementById("contain"+i).style.display="none";
		}
	}

}