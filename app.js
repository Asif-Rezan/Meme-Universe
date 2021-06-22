$(document).ready(function()
{

  

  //hide and show comment box--------------->>
  var flag=true;
  $('.comment').click(function()
    {
      if(flag)
      {
        $(".comment-div" ).css('visibility','visible');
        flag=false;
      }
      else
      {
        $(".comment-div" ).css('visibility','hidden');
        flag=true;
      }    
      
    });

     //End hide and show comment box--------------->>
     
     $(".tem-form").hide();
     
     
      $(".tem-icon").click(function()
      {
        $(".tem-form").show(2000);
       
 
      });

     

      //--------------------------//



     $(".copy-button").click(()=>{

      var copyTxt=$(".img-url-box");

      copyTxt.select();  // Select the text field
                          

      document.execCommand("copy"); // copy text field

      

     })


     // -------------------------------------------//


    





});







