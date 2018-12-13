// Function to copy.

function copyfromdiv(div)
{
	  var target = document.getElementById(div);
	  var range, select;
	  if (document.createRange) {
	    range = document.createRange();
	    range.selectNode(target)
	    select = window.getSelection();
	    select.removeAllRanges();
	    select.addRange(range);
	    document.execCommand('copy');
	    select.removeAllRanges();
	  } 
	  else {
	    range = document.body.createTextRange();
	    range.moveToElementText(target);
	    range.select();
	    document.execCommand('copy');
	  }
}