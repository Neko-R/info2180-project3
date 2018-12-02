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



function getJob(event){
var display = document.getElementById("display");
//var job = document.getElementById("job_select");
var httpRequest = new XMLHttpRequest();
var job_clicked=event.target.innerHTML;
httpRequest.onreadystatechange = function(){
   if(httpRequest.readyState===XMLHttpRequest.DONE){
                      if(httpRequest.status===200){
                
                         var response=httpRequest.responseText;
                         display.innerHTML=" "+response;
                         
                     }
                     else{
                     
                      alert("Encountered prolem with request");
                     
                        
                     }
                  }
                            } 

httpRequest.open('GET','jobDetails.php?jobtitle='+job_clicked, true);
httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
httpRequest.send();
    
       };
 
function apply(job, user){
    $.post("./test/apply.php",
    {
        job_id: job,
        user_id: user
    },
    function(){
        alert("You successfully applied for this job!");
    });
}
                  
 
 




