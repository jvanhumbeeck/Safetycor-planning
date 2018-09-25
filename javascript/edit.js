document.getElementById("addLi").addEventListener("click", function() {
	addLI();
});

var i = 2;

function addLI() {
	var item = document.createElement("LI");
	var input1 = document.createElement("INPUT");
	input1.setAttribute("type", "number");
	input1.setAttribute("name", "teplaatsen[" + i + "][hoeveelheid]");
	input1.setAttribute("autocomplete", "off");
	input1.setAttribute("min", "1");
	input1.setAttribute("value", "0");
	input1.setAttribute("required", "true"); 
	item.appendChild(input1);

	var input2 = document.createElement("INPUT");
	input2.setAttribute("type", "text");
	input2.setAttribute("name", "teplaatsen[" + i + "][naam]");
	input2.setAttribute("value", "example");
	input2.setAttribute("required", "true"); 
	item.appendChild(input2);

	var punt = document.createTextNode(".");
	item.appendChild(punt);

	var list = document.getElementById("list");
	list.insertBefore(item, list.childNodes[list.getElementsByTagName("li").length+2]);

	i++;

}