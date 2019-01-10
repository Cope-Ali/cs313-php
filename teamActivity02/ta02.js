// pop function creates a popup alert
function pop(){
alert("Clicked!");
}

//changeColor allows the user to change the color of the first div
function changeColor(){
    var color = document.getElementById('color').value;
document.getElementById('starWars').style.backgroundColor = color;
}