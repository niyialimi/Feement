// JavaScript Document
$(window).load(function(){
//	alert('hete');//checking
	$("#message").hide();
});

/*kid Starts*/
 $(document).on('click', '#kidreg', function(e){
	var validator = $("#kidreg-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this=$(this);
	 $this.button('loading');		
	$("#message").empty();
	//var formData = new FormData($(this)[0]); //where this represent current form; since we have more than one use
	var formData = new FormData($('#kidreg-form')[0]);
	var name= $('#lname').val();
	$.ajax({
	url: "../script/kidregscript.php", 
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
		setTimeout(function(){$this.button('reset');},10000);
		$("#message").fadeIn(20000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(30000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#signup-form')[0].reset();
		
		}else
		{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#signup-form')[0].reset();
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#signup-form')[0].reset();
	}
});
return false;
		 }
		 else
		 {
			 setTimeout(function(){$this.button('reset');},5000);
		$("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#signup-form')[0].reset();
		 }
});
/*kid Registration ends*/

/*view Kid*/ 
  $(document).on('click','#viewbut', function(e){
	  //alert('here');
	   //e.preventDefault();  
    
	var id      = $(this).data('id');
	
     $.ajax({
	  type:         'GET',
      url:          '../script/kidviewscript.php?id='+id,
      cache:        false,
      dataType:     'html',
      contentType:  'application/json; charset=utf-8',
	  success: function(returndata){
		  //alert(id);
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
  /*view Kid ends*/
  
  /*showedit Kid(overlay)*/ 
  $(document).on('click','#editbut', function(e){
	  //alert('here');
	   //e.preventDefault();  
    
	var id      = $(this).data('id');
	
     $.ajax({
	  type:         'GET',
      url:          '../script/showedit.php?id='+id,
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
  /*showedit Kid ends*/
  
  /*edit Kid here*/
   $(document).on('click','#editallbut', function(e){	
   var fname= $('#fname').val();var lname= $('#lname').val();var mname= $('#mname').val();var school= $('#school').val();var stdgrade= $('#stdgrade').val();var kidid= $('#kidid').val();var clientid= $('#clientid').val();var realstatus= $('#realstatus').val();
   
    var status = $('.myradio:checked').val();
	if (status=== 'undefined') {
	 status = realstatus;
		
	}else{status=status; }

 //  if($("input[type='radio'].myradio").is(':checked')) {
 //   var status = $("input[type='radio'].myradio:checked").val();
   // alert(status);
	//}
   //if(status=='Activate' || status=='Active'){status=1;}else{status=0;}
	   var formData = 'fname='+fname+'&lname='+lname+'&mname='+mname+'&school='+school+'&stdgrade='+stdgrade+'&status='+status+'&kidid='+kidid+'&clientid='+clientid;
	   //var name= $('#lname').val();
	   // alert(formData);
	    $.ajax({
	  type:  'POST',
      url:   '../script/kideditscript.php',
	  data:	 formData,     
      dataType:     'html',      
	  success: function(editdata){
		 
			  if(editdata=='OK')
			  {
			  // alert(newformData);
			   alert("Kid Details Data Update Successful");
			   $("#message").fadeIn(20000).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Kid Details Data Update Successful<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-primary"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Kid Details Data Update Successful<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
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
   /*edit Kid ends*/
   
    /*delete kid*/ 
  $(document).on('click','#deletebut', function(e){	 
	   e.preventDefault();   
	    var parent = $(this).closest("tr"); 
		//if (window.confirm("Do you really want to leave?")) { 
  //window.open("exit.html", "Thanks for Visiting!");
//}
	    if(confirm("Are you sure you want to delete this Employee?")){
        var id      = $(this).data('id');
	alert(id);
     $.ajax({
	  type:         'GET',
      url:          '../script/kiddeletescript.php?id='+id,
	  data: 		'std_id='+id,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		 // alert(id);
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
		  $("#message").fadeIn(20000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(30000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;Application Encounter an Error; Please try again<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
	  }
      
    }); return false;
    }
    else{
        return false;
    }
	
	  
  });
  /*delete kid ends*/
  
  /*parent select fee*/
   $(document).on('click','#feecard', function(e){
	 
	var catid      = $(this).data('id');
	var sch=thisform.schname.value;
	//alert (sch+catid);
	window.location='mycart.php?catid='+catid+'&sch='+sch;
  });
  /*parent fee select ends*/
  
  /*Add to cart*/
  $(document).on('click', '#addtocart', function(ev){
	  
		 	ev.preventDefault();
			var $this = $(this);
			var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Adding To Cart...';
			if ($(this).html() !== loadingText) {
			  $this.data('original-text', $(this).html());
			  $this.html(loadingText);}
			$('#showdata').empty();
			 		
			var i=0; var kids = []; var stdname=[];var stdid=[];var grade = []; var schname=[]; var schacct=[]; var payfor=[];var amountdue=[]; var amountpaid=[];
			  //  var chkBox = $('tr input:checked[name="kids[]"]:checked');
			  $('tr input:checked[name="kids[]"]:checked').each(function () {
				   kids[i++] = $(this).val();
				   stdname.push( $(this).closest('tr').find('td:eq(2)').text() );
				   stdid.push( $(this).closest('tr').find('.stid').val() );
				   grade.push($(this).closest('tr').find('td:eq(3)').text());
				   schname.push($(this).closest('tr').find('.schname').val());
				   payfor.push( $(this).closest('tr').find('.catname').val() )
				   amountdue.push(parseInt($(this).closest('tr').find('td:eq(5)').text()));
				   amountpaid.push(parseInt($(this).closest('tr').find('.amt').val()));
				  	
			   });
			   var total=kids.length;var j;
			   for ( j=0;j<total;j++)
			   {
				  // alert(amountpaid[j]);				   
				  // var sum=amountdue[j]-amountpaid[j];
				  // amountpaid=amountpaid[j];
				   
			   
			   
			   //alert('amount='+sum);
			   //alert(stdid+' '+stdname+' '+grade+' '+schname+' '+payfor+' '+amountdue+' '+amountpaid);
			   
			   if(amountpaid[j]>0 && amountdue[j]>0)
			   {
			  // alert('here');
			$.ajax({ 
				url: "../script/cartprocess.php",
				type: "POST",
				 data: {'kids[]':kids,'stdname[]':stdname,'stdid[]':stdid, 'grade[]':grade,'schname[]':schname,'payfor[]':payfor,'amountdue[]':amountdue,'amountpaid[]':amountpaid},
				 cache:false,
				dataType:'html', //expect json value from server
				
				 success: function (returndata) {					
				  
			  		$('#showdata').html('<span style="color:green;"><strong>'+total+' Item(s) Added To Your Cart</strong></span>');
					
					setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
					$(".cart-box" ).load( "../script/cartitems.php");
				},
				error: function(returndata){
						 $('#showdata').html('<span style="color:red;"><strong>Item Not Added</strong></span>');
						 setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 200);
					 }
			});return false;
			   }else
			   {
				    $('#showdata').html('<span style="color:red;"><strong>Item Not Added, Please Check Your Input...Input should be greater than 0<strong></span>');
					setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 200);
			   }
			/*.done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add to Cart'); //reset button text to original text
				alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})*/
  }
		
		
  });
  /*Add to Cart ends*/
  
  /*Payment*/
$(document).on('click', '#checkout', function(ev){	
			ev.preventDefault();
/*			var $this = $(this);
			var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Processing Payment...';
			if ($(this).html() !== loadingText) {
			  $this.data('original-text', $(this).html());
			  $this.html(loadingText);}
			$('#showdata').empty();
	 var len = $('#cartTable tr').length;var total = $('#cartTable tr').eq(len - 1).find('td:eq(1)').text();
	 var kschid = $('#cartTable tr').eq(len - 3).find('.ksid').val();
	// alert(kschid);
	var email=$('#pemail').val();
	amount=parseInt(total*100);
	/*Flutterwave Starts
		const API_publicKey = "FLWPUBK-5ebc5c81f9402fa24370b21163baec99-X";

    function payWithRave() {
		alert('amhere');
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: email,
            amount: amount,
            customer_phone: "234099940409",
            currency: "NGN",
            txref:"ft"+ Math.floor((Math.random() * 1000000000) + 1),
            meta: [{
                metaname: "School Fees Payment",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef; // collect txRef returned and pass to a 					server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
                } else {
                    // redirect to a failure page.
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
	/*Flutterwave Ends*/
	
/*Paystack Ends*/	
/*var handler = PaystackPop.setup({
      key: 'pk_test_0c6ca1062c6e870e237704aaff1316d7486b31b5',
      email: email,
      amount: amount,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
		  setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
					var kids = [];var stdid=[]; var cartid=[]; var i=0; var ksid=[];var ksname=[];
			   
			  $('tr input:checked[name="kids[]"]:checked').each(function () {
				   kids[i++] = $(this).val();
				   stdid.push( $(this).closest('tr').find('.stid').val() );
				   cartid.push($(this).closest('tr').find('.ctid').val());
				   ksid.push($(this).closest('tr').find('.ksid').val());
				   ksname.push($(this).closest('tr').find('.ksname').val());
				  	
			   });
			   
				   var i=kids.length;			  	
			  		alert(kids+' '+cartid+' '+ksid+' '+ksname);
					  
				  $.ajax({
					url: '../script/paidcartscript.php',
					type: 'POST',
					data: {'kids[]':kids,'stdid[]':stdid,'cartid[]':cartid,'ksid[]':ksid,'ksname[]':ksname},
					cache:  false,
					dataType: 'html',    
					success: function (returndata) {
						$('#cartTable').empty();
						$('#process').empty();
						$('#showdata').html('<span style="color:green; font-weight: bold;">Payment Successfull</span>');  
						 
					},
					error: function(returndata){
							$('#showdata').html('<span style="color:red; font-weight: bold;">Payment Error</span>');
						 }
				  });return false;  
		
  
		  
      },
      onClose: function(){
          alert('window closed');
		  setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
      }
    });
    handler.openIframe();	  *//*Paystack Ends*/
	
	  });

/*Payment Ends*/

/*proceed to chkout*/
$(document).on('click', '#proceed', function(ev){
	$.ajax({
	  type:         'GET',
      url:          '../script/chkcart.php',	 
	  success: function(data){
		  if(data<=0)
		  {
		  	//$('#showdata').html(data);
			$('#showdata').html('<span style="color:red">No Item In Your Cart, Therefore No Payment Can Be Processed, Please Add At Least An Item To cart</span>');
		  }
		  else
		  {
			  window.location.href='viewcart.php';
		  }
		  },
	  error:  function(data){
		  
		  }
	});return false;
	});
/*Proceed to chkout*/

/*Cart Operation*/
 $(document).ready(function(){
	  $(".cart-box" ).load( "../script/cartitems.php");
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "../script/showcartitem.php"); //Make ajax request using jQuery Load() & update results
		
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	 	
  });
  //Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var cartid = $(this).attr("data-id"); //get product code
		//alert(cartid)
		$(this).parent().fadeOut(); //remove item element from box
		//$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
		$.ajax({
	  type:         'GET',
      url:          '../script/deletescript.php?cartid='+cartid,
	  //data: 		'msgid='+id,
	  async:		 false,
      cache:        false,
      dataType:     'html',
	  success: function(returndata){
		  if(returndata=='deleted')
		  {
			  $(".cart-box" ).load( "../script/cartitems.php");
			$("#cart-info").html(data); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		  }
		  else
		  {
			  alert('Item Not Deleted');
		  }
	  },
	error: function(returndata)
	  	 {
			 alert('An Error Just Occured, Item Not Deleted');
		 }
		});
		
	});
 /*cart operation ends*/
 
 /*pagination*/
 $(document).ready(function(){
        $('#myTable').after('<div id="nav" class="pagination"></div>');
        var rowsShown = 2;
        var rowsTotal = $('#myTable tbody tr').length;
        var numPages = rowsTotal/rowsShown;
        for(i = 0;i < numPages;i++) {
            var pageNum = i + 1;
            $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
        }
        $('#myTable tbody tr').hide();
        $('#myTable tbody tr').slice(0, rowsShown).show();
        $('#nav a:first').addClass('active');
        $('#nav a').bind('click', function(){

            $('#nav a').removeClass('active');
            $(this).addClass('active');
            var currPage = $(this).attr('rel');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            $('#myTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
                    css('display','table-row').animate({opacity:1}, 300);
        });
    });
 /*Pagination*/
 
 /*Post Message to Forum Starts*/
 $(document).on('click', '#postmsg', function(e){
	var validator = $("#forum-form").data("bs.validator");
	validator.validate();
	 e.preventDefault();
 if (!validator.hasErrors()) 
  {
	 var $this = $(this);
			var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Posting Mesage...';
			if ($(this).html() !== loadingText) {
			  $this.data('original-text', $(this).html());
			  $this.html(loadingText);}		
	$("#message").empty();
	//var formData = new FormData($(this)[0]); //where this represent current form; since we have more than one use
	var formData = new FormData($('#forum-form')[0]);
	$.ajax({
	url: "../script/postmsgscript.php", 
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
		setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
		$("#message").fadeIn(5000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$("#message").fadeOut(10000).html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		$('#sch-form')[0].reset();
		
		}else
		{
		setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$('#schreg-form')[0].reset();
		}	
		
		
	},
	error:function(responsendata)
	{
		setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#schreg-form')[0].reset();
	}
});
return false;
		 }
		 else
		 {
			 setTimeout(function() {
					  $this.html($this.data('original-text'));
					}, 1000);
		$("#message").fadeIn(5000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');
		$("#message").fadeOut(10000).html('<div class="alert alert-danger"><span class="glyphicon glyphicon-alert pull-left"></span>&nbsp;&nbsp;'+responsedata.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><br>');	
		$('#signup-form')[0].reset();
		 }
});
/*Post Message to Forum ends*/

/*forum reply*/
$(document).on('click','#forumreply', function(e){
	  //alert('here');
	   //e.preventDefault();  
    
	var id      = $(this).data('id');
	
    
		  $('#editModal').modal('show');			  
		  $('#editModal').on('shown.bs.modal', function () {
	 	  $('#display2').html();	   
})
});
/*forum reply ends*/