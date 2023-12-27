function lo() {
    alert("Thank You for Using Examee.net See you soon!");
    window.location.replace("index.php");
    session_destroy();
}

function addquiz() {
    document.getElementById("addq").style.display = "initial";
    document.getElementById("delq").style.display = "none";
    document.getElementById("viewq").style.display = "none";
}

function delquiz() {
    document.getElementById("delq").style.display = "initial";
    document.getElementById("addq").style.display = "none";
    document.getElementById("viewq").style.display = "none";
}

function viewq() {
    document.getElementById("viewq").style.display = "initial";
    document.getElementById("delq").style.display = "none";
    document.getElementById("addq").style.display = "none";
}
