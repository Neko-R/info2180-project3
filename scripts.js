
function sideDisplay(page){
    var display = document.getElementById("display");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            display.innerHTML = this.response;
        }
    };
    request.open("GET", "./"+page, true);
    request.send();
}

function logOut(){
window.open('../test/logout.php','_top');
}

