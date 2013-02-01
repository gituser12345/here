function time(id)
{
	date = new Date;
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
	if(h>=12)
	{
		mr = "pm";	
	} 
	if(h<12)
	{
		mr = "am";
	}
        result = h+':'+m+' '+mr;
        document.getElementById(id).innerHTML = result;
        setTimeout('time("'+id+'");','1000');
        return true;
}
