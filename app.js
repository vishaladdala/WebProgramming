
function loadData(){
	var input = {};
	input.gend = $(".gender").val();
	input.year = $(".2005-2015").val();
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			$(".results").html(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET","babynames.php?gend="+$(".gender").val()+"&year="+$(".2005-2015").val());
	xmlhttp.send();
}
$(function(){
    var $select = $(".2005-2015");
    for (i=2005;i<=2015;i++){
        $select.append($('<option></option>').val(i).html(i));
    }

    $(".search").click(loadData);
});