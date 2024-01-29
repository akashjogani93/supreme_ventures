$(document).ready(function(){
    $(".pan").change(function () 
    {      
        var inputvalues = $(this).val();
        var reg = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;  
        if (inputvalues.match(reg)) 
        {    
                return true;    
        }    
        else {    
            $(".pan").val("");    
                alert("You entered invalid Pan card number");    
                return false;    
            }    
        }); 

        $(".ifsc").change(function () {      
            var inputvalues = $(this).val();      
            var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;    
            if (inputvalues.match(reg)) {    
                    return true;    
                }    
            else {    
                $(".ifsc").val("");
                alert("You entered invalid IFSC code");    
                return false;    
                }    
            }); 

            $('#fname').keypress(function(event){
	
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if ((keycode < 48 || keycode > 57))
                return true;

                return false;
            
            });
            $('#mname').keypress(function(event){
	
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if ((keycode < 48 || keycode > 57))
                return true;

                return false;
            
            });
            $('#lname').keypress(function(event){
	
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if ((keycode < 48 || keycode > 57))
                return true;

                return false;
            
            });
            


    $("#mobile").keyup(function(){ 
        let mob=$("#mobile").val();
        $("#username").val(mob);
        if(mob.length < 10 )
        {
            $('#lab_mob').html(`<span style='color:red'>Mobile Number Not Valid..</span>`);
            $('#sub').prop('disabled',true);
        }else
        {
            $('#lab_mob').html(`<span style='color:green'>Mobile Number is Valid</span>`);
            $('#sub').prop('disabled',false);
        }
    });


    $("#fname").blur(function()
    { 
        let fname=$("#fname").val();
        $("#password").val(fname.trim()+Math.floor (1000 + Math.random () * 9000));
    });
    // $("#fname").keypress(function()
    // { 
    //     console.log('hii');
    //     // let fname=$("#fname").val();
    //     // $("#password").val(fname.trim()+Math.floor (1000 + Math.random () * 9000));
    // });
    

});


         
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode < 48 || charCode > 57))
    return false;

    return true;        
}
    

function checku()
{
  	let acc=$("#acc").val();
  	let acc1=acc.length;
  	if(acc1>=10)
    {
      jQuery.ajax({
          url:'ajax/accnum.php',
          data:'acc=' +$("#acc").val(),
          type:"POST",
          success:function(data){
              $("#msg").html(data);
          },
          error:function(){}
      });
    }else
    {
      	$("#msg").html("<span style='color:red'>Account Number is Not Valid..</span>");
        $('#sub').prop('disabled',true);
    }
}
