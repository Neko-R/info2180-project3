
window.onload = function() {
    
    var page = document.getElementById("page");
    var startrequest = new XMLHttpRequest();
    startrequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            page.innerHTML = this.response;
        }
    };
    startrequest.open("GET", "./login.html", true);
    startrequest.send();
};

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
