
function prof() {
    document.getElementById("prof").style.display = "block";
    document.getElementById("score").style.display = "none";
}

function score() {
    document.getElementById("prof").style.display = "none";
    document.getElementById("score").style.display = "block";
}

function dash() {
    document.getElementById("prof").style.display = "none";
    document.getElementById("score").style.display = "none";
}

function lo() {
    alert("Thank You for Using our Online Examination System");
    window.location.replace("index.php");
}

function addquiz() {
    document.getElementById("addq").style.display = "initial";
}
