function submitform(event,title,content){
	event.preventDefault();  // To stop the form from submitting and refreshing the page.

	var request = new XMLHttpRequest();

	title = encodeURIComponent(title);

	content = encodeURIComponent(content);

	request.open('GET','senddata.php?title='+title+'&content='+content);

	request.send();

	request.onload=function(){
		json = JSON.parse(request.responseText);
		console.log(json);
		if(json[0].response_code=="200"){
			window.location.replace("viewnote.php?noteshareurl="+json[0].shareurl+"");
		}
		else if(json[0].response_code=="400"){
			document.getElementById('errors').innerHTML='Some Error Occured.';
		}
		else if(json[0].response_code=="500"){
			document.getElementById('errors').innerHTML="Insufficient Information.";
		}
	}
}