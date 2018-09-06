document.getElementById("close").addEventListener("click", function() {
	document.getElementById("img-holder").style.display = "none";
});

giveAllImagesEvent();
giveAllFoldButtonsEvent();

function giveAllImagesEvent() {
	var images = document.getElementsByTagName("img");

	for(var i = 0; i < images.length; i++) {
		images[i].addEventListener("click", imgClick);
	}
}

function giveAllFoldButtonsEvent() {
	var buttons = document.getElementsByClassName("plan-menu");

	for(var i = 0; i < buttons.length; i++) {
		buttons[i].addEventListener("click", foldBtnClick);
	}
}

function imgClick(evt) {
	document.getElementById("img").src = evt.currentTarget.src;
	document.getElementById("img-holder").style.display = "block";
}

function foldBtnClick(evt) {
	var panel = evt.currentTarget.parentNode.getElementsByClassName("plan-panel")[0];
	var i = evt.currentTarget.getElementsByTagName("i")[0];
	console.log(i.tagName);
	if (i.tagName == "BUTTON") {
		i = evt.currentTarget.getElementsByTagName("i")[0];
	}

	if(panel.classList.contains("hidden")) {
		panel.classList.remove("hidden");
		i.style.transform = "rotate(-90deg)";
	}else {
		panel.classList.add("hidden");
		i.style.transform = "none";
	}
}