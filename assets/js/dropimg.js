var imageLoader = document.getElementById('picture');
    imageLoader.addEventListener('change', handleImage, false);
	
function handleImage(e) {
    var reader = new FileReader();
	reader.onload = function (e) {
		$('#upload img').attr('src',e.target.result);
	}
	var file = e.target.files[0];
	if (file != null) {
		var fileType = e.target.files[0].type;
		if (( fileType=="image/jpeg") ||
			( fileType=="image/jpg") ||
			( fileType=="image/png") ||
			( fileType=="image/gif") ||
			( fileType=="image/bmp")  )	{

			document.getElementById("loader").style.visibility="visible";
		    var delay = 1000; 
			setTimeout(function() {
				document.getElementById("loader").style.visibility="hidden";
			}, delay);
			reader.readAsDataURL(e.target.files[0]); 
		}	
	}	
}

var dropbox;
dropbox = document.getElementById("upload");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}

function drop(e) {
  e.stopPropagation();
  e.preventDefault();
  var dt = e.dataTransfer;
  var files = dt.files;
  imageLoader.files = files;
}
  