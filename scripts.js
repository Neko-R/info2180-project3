

function sideDisplay(page){
    
    var display = document.getElementById("display");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            alert(this.responseText);
            display.innerHTML = this.responseText;
        }
    };
    request.open("GET", "file:///C:/workspace/INFO2180/info2180-project3/addUser.html", true);
    request.send();
}
