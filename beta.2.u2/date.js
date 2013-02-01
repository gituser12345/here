function date(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
       
        result = ''+days[day]+', '+months[month]+' '+d+', '+year;
        document.getElementById(id).innerHTML = result;
        setTimeout('date("'+id+'");','1000');
        return true;
}
