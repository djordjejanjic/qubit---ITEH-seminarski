<?php
include "header.php";
?>
 

 <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; margin-top: 20px;">        
     <div class="col-lg-6 col-lg-push-3" style="min-height: 500px;">
         
         <h1 id="fotka">Pretraga fotografija dana po datumu</h1>
     
         <!-- Search form -->
         <div class="active-purple-3 active-purple-4 mb-4">
            <form action="" method="post" id="form" onsubmit="sConsole(event)">
             <input class="form-control" name="dateinput" id="myInput" type="text" placeholder="Upiši dan, mesec i godinu u formatu YYYY-MM-DD" aria-label="Search">
        
         <input id="datum" type="submit" name="pretrazi" class="btn-primary" value="Pretraži"/>
         </form>
         
         <div id="output"><h1 id="title"></h1><thing id="img"></thing><p id="explanation"></p></div>    
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    
   <script type=text/javascript>
   
    //SLIKA DANASNJEG DANA   
     
    $.ajax({
        url:"https://api.nasa.gov/planetary/apod?api_key=aE9tzacMdYz2sbkKkIEFCAsRAaIry9wsgjm6efsQ",
        
        data:  {
         
            date: ""
        
        },
        success: function(data){
            document.getElementById("img").innerHTML="<img src='"+data.url+"'style='width:100%;'/>";
            document.getElementById("title").innerHTML=data.title;
            document.getElementById("explanation").innerHTML=data.explanation;
        }
    });
       
       //IZABERI PO DATUMU SLIKU TOG DANA
       
       function sConsole(event){
            
           event.preventDefault();
           var datum = document.getElementById("myInput");
           display = datum.value;  
       
       
    $.ajax({
        url:"https://api.nasa.gov/planetary/apod?api_key=aE9tzacMdYz2sbkKkIEFCAsRAaIry9wsgjm6efsQ",
        
        data:  {
         
            date: display
        
        },
        success: function(data){
            document.getElementById("img").innerHTML="<img src='"+data.url+"'style='width:100%;'/>";
            document.getElementById("title").innerHTML=data.title;
            document.getElementById("explanation").innerHTML=data.explanation;
        }
    });
    
      } 
    </script>
   
     
     </div>
 </div>
</div>



<?php
include "footer.php";
?>