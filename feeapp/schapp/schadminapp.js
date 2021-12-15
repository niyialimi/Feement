// JavaScript Document
$(window).load(function(){
	$('#setpayment').hide();
	});
/*School Reg Starts*/
 $(document).on('click', '#schreg', function(e){
	var validator = $("#schreg-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this=$(this);
	 $this.button('loading');		
	$("#message").empty();
	//var formData = new FormData($(this)[0]); //where this represent current form; since we have more than one use
	var formData = new FormData($('#schreg-form')[0]);
	$.ajax({
	url: "../script/schregscript.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,   
	dataType: "JSON",          
	processData:false, 
	beforeSend: function()
   { 
    $('#message').fadeIn(200).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Processing.......</div>');
	 
   },
	    
	success: function(responsedata)   
	{	
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#sch-form')[0].reset();
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#schreg-form')[0].reset();
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#schreg-form')[0].reset();
	}
});
return false;
		 }
		 else
		 {
			 setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#signup-form')[0].reset();
		 }
});
/*School Registration ends*/

/*school edit(overlay)*/ 
  $(document).on('click','#editbut', function(e){
	  //alert('here');
	   //e.preventDefault();  
    
	var id      = $(this).data('id');
	
     $.ajax({
	  type:         'GET',
      url:          '../script/scheditoverlay.php?id='+id,
      cache:        false,
      dataType:     'html',
      contentType:  'application/json; charset=utf-8',
	  success: function(returndata){
		  //alert(id);
		  $('#editModal').modal('show');			  
		  $('#editModal').on('shown.bs.modal', function () {
	 	  $('#display2').html(returndata);
	   
})
		  },
	  error: function(returndata)
	  {
		  show_message('The Application just ecountered an error', 'error');
	  }
      
    }); return false;
	
	  
  });
  /*school edit ends*/
  
  /*edit school here*/
   $(document).on('click','#editschbut', function(e){	
   
   var schphn= $('#schphn').val();var bankname= $('#bankname').val();var schdid= $('#schdid').val();var clientid= $('#clientid').val();var realststus= $('#realstatus').val(); var acctnum=$('acctnum').val();var schaddress=$('schaddress').val();
   var status = $('.myradio:checked').val();   
 /*  alert(status);
   if (status=='undefined') {
	   status = realstatus;
	   
}else{status=status;}*/
 //  if($("input[type='radio'].myradio").is(':checked')) {
 //   var status = $("input[type='radio'].myradio:checked").val();
   // alert(status);
	//}
   //if(status=='Activate' || status=='Active'){status=1;}else{status=0;}
   //alert(status);
	   var formData = 'schphn='+schphn+'&bankname='+bankname+'&schid='+schid+'&acctnum='+acctnum+'&status='+status+'&schaddress='+schaddress+'&clientid='+clientid;
	   //var name= $('#lname').val();
	    alert('here');
	    $.ajax({
	  type:  'POST',
      url:   '../script/schooleditscript.php',
	  data:	 formData,     
      dataType:     'html',      
	  success: function(editdata){
		 		
			  if(editdata=='OK')
			  {
			   alert("School Data Update Successful");
			   $("#message").fadeIn(20000).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;School Data Update Successful<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;School Data Update Successful<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			   location.reload();
			  }else
			  {
				  $("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			  }
		  },
	  error: function(returndata)
	  {
		  $("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error From the Server; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error Fromthe Server; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	  }
      
    }); return false;
   });
   /*edit school ends*/


/*Add payment module Overlay*/ 
  $(document).on('click','#moduleoverlay', function(e){
	  
		  $('#myModal').modal('show');	
		
  });
  /*Add payment module Overlay ends*/
  
  /*Payment Module/category add Starts*/
 $(document).on('click', '#savemodule', function(e){
	var validator = $("#module-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this=$(this);
	 $this.button('loading');		
	$("#message").empty();
	var formData = new FormData($('#module-form')[0]);
	$.ajax({
	url: "../script/addcategory.php", 
	type: "POST",             
	data: formData, 
	contentType: false,       
	cache: false,   
	dataType: "JSON",          
	processData:false, 
	beforeSend: function()
   { 
    $('#message').fadeIn(200).html('<div id="authnotice" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Processing.......</div>');
	 
   },
	    
	success: function(responsedata)   
	{	
		if(responsedata.status=='success')
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#module-form')[0].reset();
		$('#setpayment').slideDown();
		$('#setcategory').slideUp();
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#module-form')[0].reset();
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#module-form')[0].reset();
	}
});
return false;
		 }
		 else
		 {
			 setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#module-form')[0].reset();
		 }
});
/*Payment Module/category ends*/

 /*Set Class Fee*/  
 $(document).on('click', '#savefee', function(ev){
    ev.preventDefault();
	var schs = []; var classname=[];var amount=[];var i = 0;
			    var chkBox = $('tr input:checked[name="schs[]"]:checked');
			
			  $('tr input:checked[name="schs[]"]:checked').each(function () {
				   schs[i++] = $(this).val();
				   classname.push( $(this).closest('tr').find('.clname').val() );
				   amount.push($(this).closest('tr').find('.amt').val());				   
			   }); 
			   //alert(classname+' '+amount);
			  $.ajax({
    url: '../script/addfee.php',
    type: 'POST',
    data: {'schs[]':schs,'classname[]':classname,'amount[]':amount},
	cache:  false,
	dataType: 'html',    
    success: function (returndata) {
			 
			   $('#msg').fadeIn(200).html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>New Fee Added</strong></div>');
		   $("#msg").fadeOut(10000);
		   parent.slideUp(5000,function() {
					parent.remove();});
			 
    },
	error: function(returndata){
			
			  $('#msg').fadeIn(200).html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Could Not Add New Fee</strong></div>');
		   $("#msg").fadeOut(10000);
		   parent.slideUp(5000,function() {
					parent.remove();});		
		 }
  });return false;  
		
  });
/*Set Class Fees End*/

/*Add New School Overlay*/ 
  $(document).on('click','#newschbut', function(e){
		  $('#addnewModal').modal('show');	
		
  });
  /*Add New School Overlay ends*/
  
 /*view School*/ 
  $(document).on('click','#viewbut', function(e){
	 
	var id      = $(this).data('id');
	var client      = $(this).data('client');
	
     $.ajax({
	  type:         'GET',
      url:          '../script/schoolviewscript.php?id='+id+'&client='+client,
      cache:        false,
      dataType:     'html',
      contentType:  'application/json; charset=utf-8',
	  success: function(returndata){
		  //alert(id+' '+client);
		  $('#myModal').modal('show');	
		  //$('#display').html(returndata);
		 $('#myModal').on('shown.bs.modal', function () {
	 		$('#display').html(returndata);
			
		 //$('#display').load('proscript/viewscript.php').fadeIn("slow");   
})
		  },
	  error: function(returndata)
	  {
		  show_message('The Application just ecountered an error', 'error');
	  }
      
    }); return false;
	
	  
  });
  /*view School ends*/
  
  /*delete School*/ 
  $(document).on('click','#deletebut', function(e){	 
	   e.preventDefault();   
	    var parent = $(this).closest("tr"); 
		
	    if(confirm("Are you sure you want to delete this Employee?")){
        var id      = $(this).data('id');
		var client      = $(this).data('client');
	alert(id);
     $.ajax({
	  type:         'GET',
      url:          '../script/schooldeletescript.php?id='+id+'&client='+client,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  //alert(id);
		  if(returndata=='deleted')
		  {
		  $('#message').fadeIn(200).html('<div class="alert alert-primary alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Kid Details Deleted Successfully</strong></div>');
		   $("#message").fadeOut(10000);
		   parent.slideUp(300,function() {
					parent.remove();});
		  }else
		  {
			  $("#message").fadeIn(200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Data Can not be deleted at the moment, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Data Can not be deleted at the moment, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		  }
		  },
	  error: function(returndata)
	  {
		  $("#message").fadeIn(200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
  /*delete School ends*/
 /*load fee*/ 
  $(document).on('click','#feecard', function(e){	
  var id      = $(this).data('id');
  //alert(id);
  window.location='editpayitem.php?id='+id;
   });
   
   /*Edit Payitem Category*/

 $(document).on('click', '#editfee', function(ev){
	 
	 var validator = $("#editfee-form").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	 	$("#returnmessage").empty();
		var $this=$(this);
		 $this.button('loading');	 
	var formData = new FormData($('#editfee-form')[0]);
	$.ajax({
	url: "../script/editfeescript.php", 
	type: "POST",             
	data: new FormData($('#editfee-form')[0]), 
	contentType: false,       
	cache: false,             
	processData:false,        
	success: function(responsedata)   
	{
		if(responsedate='OK')
		{
			setTimeout(function(){$this.button('reset');},5000);
			$("#returnmessage").fadeIn(200).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Payment Edited Succesfully<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			$("#returnmessage").fadeOut(10000).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Payment Edited Succesfully<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		}
		else
		{
			setTimeout(function(){$this.button('reset');},5000);
			$("#returnmessage").fadeIn(200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Cannot Edit Payment, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			$("#returnmessage").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Cannot Edit Payment, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		}
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#returnmessage").fadeIn(200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Cannot Edit Payment, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			$("#returnmessage").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Cannot Edit Payment, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	}
	});
	return false;
	  }

});

/*Edit Ends*/

/*Edit amount*/

 $(document).on('click', '#editamount', function(ev){
	
	 var validator = $("#editamount-form").data("bs.validator");
	 validator.validate();
		 ev.preventDefault();
	 if (!validator.hasErrors()) 
	  { 
	  var schs = []; var classname=[];var amount=[];var i = 0; var schid=[]; var catid=[];
			
			  $('tr input:checked[name="schs[]"]:checked').each(function () {
				   schs[i++] = $(this).val();
				   classname.push( $(this).closest('tr').find('.clname').val() );
				   amount.push($(this).closest('tr').find('.amt').val());
				   schid.push($(this).closest('tr').find('.schidt').val());	
				   catid.push($(this).closest('tr').find('.catidt').val());			   
			   }); 
			   alert(schs+classname+' '+amount+' '+schid+' '+catid);
	 	$("#msg").empty();
		var $this=$(this);
		 $this.button('loading');	 
	$.ajax({
	url: "../script/editamountscript.php", 
	type: "POST",             
	data: {'classname[]':classname,'amount[]':amount,'schid[]':schid,'catid[]':catid,'schs[]':schs}, 
	cache:  false,
	dataType: 'html',       
	success: function(responsedata)   
	{
		if(responsedate='OK')
		{
			setTimeout(function(){$this.button('reset');},5000);
			$("#msg").fadeIn(200).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Fee Amount Edited Succesfully<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			$("#msg").fadeOut(10000).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Fee Amount Edited Succesfully<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		}
		else
		{
			setTimeout(function(){$this.button('reset');},5000);
			$("#msg").fadeIn(200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Could Not Edit Fee Amount Now, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			$("#msg").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Could Not Edit Fee Amount Now, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		}
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#msg").fadeIn(200).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Could Not Edit Fee Amount Now, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
			$("#msg").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Could Not Edit Fee Amount Now, please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
	}
	});
	return false;
	  }

});

/*Edit amount Ends*/