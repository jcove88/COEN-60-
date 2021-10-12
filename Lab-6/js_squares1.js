window.onload = function() {
	var colors = document.getElementById("colors");
	var add = document.getElementById("add");
	var remove = document.getElementById("delete");
	colors.onclick = changeColors;
	add.onclick = addSquare;
	remove.onclick = deleteAll;
}
function getRandomColor() {
	var x = "0123456789abcde";
	var result = "#";
	for(var i = 0; i < 6; i++)
		result += x.charAt(parseInt(Math.random()*x.length));
	return result;
}
function changeColors() {
	var squareArea = document.getElementById("squarearea");
	var squares = squareArea.getElementsByTagName("div");
	for (var i = 0; i < squares.length; i++) {
		squares[i].style.backgroundColor = getRandomColor();
	}
}
function addSquare() {
	var square = document.createElement("div");
	var squareArea = document.getElementById("squarearea");
	square.className = "square";
	square.style.left = parseInt(Math.random() * 650) + "px";
	square.style.top = parseInt(Math.random() * 250) + "px";
	square.style.backgroundColor = getRandomColor();
	squareArea.appendChild(square);
}
function deleteAll() {
	document.getElementById("squarearea").innerHTML = '';
}
