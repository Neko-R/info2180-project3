
window.onload = function() {
    //sideDisplay('addUser');
    
}

function sideDisplay(page){
    var display = document.getElementById("display");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            display.innerHTML = this.response;
        }
    };
    request.open("GET", "./"+page+".html", true);
    request.send();
}
