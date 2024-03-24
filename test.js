const form = document.createElement("form");
form.setAttribute("action", "main.php");
form.setAttribute("method", "POST");

const button = document.createElement("button");
button.setAttribute("hidden", "true");

button.appendChild(form);

var phpSearchDiv = document.getElementById("phpSearchDiv");
phpSearchDiv.style.height = "60%";
