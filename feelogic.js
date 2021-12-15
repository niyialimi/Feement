// JavaScript Document
$(window).load(function(){
	//alert('hete');//checking
	$("#message").hide();
	//$("#stdtable1").hide();
	});
	
/*Registration Starts*/
 $(document).on('click', '#regbut', function(e){
	var validator = $("#signup-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	//var crole= $('#crole').val();
	var crole=$('input[name=crole]:checked').val();
	var email=$('#email').val();
	 var $this=$(this);
	 $this.button('loading');		
	$("#message").empty();
	var formData = new FormData($('#signup-form')[0]);	
	$.ajax({
	url: "script/accountregscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,   
	dataType: "JSON",          
	processData:false, 
	    
	success: function(responsedata)   
	{	
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},100);
		$("#message").fadeIn(200).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			
			if(crole=='school')
			{
				window.location='feeapp/schapp/addschool.php?crole='+crole+'&email='+email;
			}else if(crole=='parent')
			{
				window.location='feeapp/ptapp/appkids.php';
				
			}
		}
		
		else
		{
		setTimeout(function(){$this.button('reset');},1000);
		$("#message").fadeIn(1200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(2000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#signup-form')[0].reset();
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},1000);
		$("#message").fadeIn(1200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(2000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#signup-form')[0].reset();
	}
});
return false;
		 }
		 else
		 {
			 setTimeout(function(){$this.button('reset');},1000);
		$("#message").fadeIn(1200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(2000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#signup-form')[0].reset();
		 }
});
/*Registration ends*/

/*App Login*/
$(document).on('click','#loginbut',function(ev){
	
	var validator = $("#login-form").data("bs.validator");
	validator.validate();
	 ev.preventDefault();
 if (!validator.hasErrors()) 
  {
	  
	$("#message").empty();		
	var username=$('#username').val();
	var password=$('#password').val();
	myformData='username='+username +'&password='+password;
	//alert(myformData);
	
$.ajax({
    url: 'script/accountloginscript.php',
    type: 'POST',
    data: myformData,
    //cache: false,
    dataType: 'html',
	beforeSend: function()
   { 
    $("#message").fadeIn(200).html('<div class="alert alert-info"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;Authenticatiing.......<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
	 // $('#lognotice').fadeOut(2000).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Authenticating.......</div>');
   },
    success: function (logindata) {
		if(logindata=='valid')
		{	
			$('#message').fadeIn(25000).html(' <div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;Loggin Successful<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			//window.location='feeapp/ptapp/apphome.php';
			window.location='chkrole.php';
			
		}
		else 
		{			
			
			$('#message').fadeIn(25000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;Invalid Crediential Supplied<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			$('#signup-form')[0].reset();
			
		}
	 
    },
	error: function(logindata){
		
			$('#message').fadeIn(25000).html('<div class="alert alert-Danger"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;An Error just Occured; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			$('#signup-form')[0].reset();
			 
		 }
  });return false;  
  }
});
/*App Login ends*/