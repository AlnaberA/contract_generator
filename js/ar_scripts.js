$(document).on('click', '#save_ar_btn', function(){
	if ($("#ar_contract_form").valid()){
		var name_cust = $('input[name=name_cust]').val();
		var attention = $('input[name=attention]').val();
		var address_cust = $('input[name=address_cust]').val();
		var city_cust = $('input[name=city_cust]').val();
		var state_cust = $("#state_cust option:selected").val();
		var zip_cust = $('input[name=zip_cust]').val();
		var ar_estimate = $('input[name=ar_estimate]').val();
		var address_site = $('input[name=address_site]').val();
		var place_site = $('input[name=place_site]').val();
		var radio1 = $('input[name=type_site]');
		var type_site = radio1.filter(':checked').val();
		var project_description = $('input[name=project_description]').val();
		var county = $('input[name=county]').val();
		var voltage = $("#voltage option:selected").text();
		var radio2 = $('input[name=phase]');
		var phase = radio2.filter(':checked').val();
		var dwg_num = $('input[name=dwg_num]').val();
		var dwg_date = $('input[name=dwg_date]').val();
		var service_center = $('input[name=service_center]').val();
		var region = $('input[name=region]').val();
		var work_description = $('textarea#work_description').val();
                var wonum = $('input[name=wonum]').val();
                var creator_name = $('input[name=creator_name]').val();
                var creator_id = $('input[name=creator_id]').val();
                var creator_title = $('input[name=creator_title]').val();
                var creator_phone = $('input[name=creator_phone]').val();
                var creator_email = $('input[name=creator_email]').val();
                
		$.ajax({
			type:"POST",
		    url:"contracts/ar/ajax/ar_save.php",
		    data:{      name_cust: name_cust,
		    		attention: attention,
                                address_cust: address_cust,
                                city_cust: city_cust,
                                state_cust: state_cust,
                                zip_cust: zip_cust,
                                ar_estimate: ar_estimate,
                                address_site: address_site,
                                place_site: place_site,
                                type_site: type_site,
                                project_description: project_description,
                                county: county,
                                voltage: voltage,
                                phase : phase,
                                dwg_num: dwg_num,
                                dwg_date: dwg_date,
                                service_center: service_center,
                                region: region,
                                work_description: work_description,
                                wonum: wonum,
                                creator_name: creator_name,
                                creator_id: creator_id,
                                creator_title: creator_title,
                                creator_phone: creator_phone,
                                creator_email: creator_email
			}, 
		    success:function(data)
		    {
		    	alert('Contract Saved');
		    	window.location.href = "in_progress.php";
		    }
		});
	}

	else{
		$('html, body').animate({ scrollTop: 0 }, 'fast');
	}
});

$(document).on('click', '#submit_ar_btn', function(){
	if ($("#ar_contract_form").valid()){
		var name_cust = $('input[name=name_cust]').val();
		var attention = $('input[name=attention]').val();
		var address_cust = $('input[name=address_cust]').val();
		var city_cust = $('input[name=city_cust]').val();
		var state_cust = $("#state_cust option:selected").val();
		var zip_cust = $('input[name=zip_cust]').val();
		var ar_estimate = $('input[name=ar_estimate]').val();
		var address_site = $('input[name=address_site]').val();
		var place_site = $('input[name=place_site]').val();
		var radio1 = $('input[name=type_site]');
		var type_site = radio1.filter(':checked').val();
		var project_description = $('input[name=project_description]').val();
		var county = $('input[name=county]').val();
		var voltage = $("#voltage option:selected").text();
		var radio2 = $('input[name=phase]');
		var phase = radio2.filter(':checked').val();
		var dwg_num = $('input[name=dwg_num]').val();
		var dwg_date = $('input[name=dwg_date]').val();
		var service_center = $('input[name=service_center]').val();
		var region = $('input[name=region]').val();
		var work_description = $('textarea#work_description').val();
		var comments = $('textarea#comments').val();
                var wonum = $('input[name=wonum]').val();
                var creator_name = $('input[name=creator_name]').val();
                var creator_id = $('input[name=creator_id]').val();
                var creator_title = $('input[name=creator_title]').val();
                var creator_phone = $('input[name=creator_phone]').val();
                var creator_email = $('input[name=creator_email]').val();

		$.ajax({
			type:"POST",
		    url:"contracts/ar/ajax/ar_submit.php",
		    data:{name_cust: name_cust,
		    		attention: attention,
					address_cust: address_cust,
					city_cust: city_cust,
					state_cust: state_cust,
					zip_cust: zip_cust,
					ar_estimate: ar_estimate,
					address_site: address_site,
					place_site: place_site,
					type_site: type_site,
					project_description: project_description,
					county: county,
					voltage: voltage,
					phase : phase,
					dwg_num: dwg_num,
					dwg_date: dwg_date,
					service_center: service_center,
					region: region,
					work_description: work_description,
					comments: comments,
                                        wonum: wonum,
                                        creator_name: creator_name,
                                        creator_id: creator_id,
                                        creator_title: creator_title,
                                        creator_phone: creator_phone,
                                        creator_email: creator_email
			},
		    success:function(data)
		    {
		    	alert('Contract submitted for supervisor approval');
		    	window.location.href = "in_progress.php";
		    }
		});
	}

	else{
		$('#ar_comment_modal').modal('hide');
		$('html, body').animate({ scrollTop: 0 }, 'fast');
	}
});




$(document).on('click', '#delete_saved_contract_btn', function(){
        var id = this.getAttribute('data-id');
	//alert(id);
        if (window.confirm("Do you really want to delete this contract? Press cancel if no.")) { 
        $.ajax({
                    type:"POST",
		    url:"contracts/ar/ajax/ar_delete.php",
		    data:{
                        id:id
                    },
		    success:function(data)
		    {
		    	alert('Successfully Deleted Draft.');
		    	location.reload();
		    }
        });
        }
  });
  
$(document).on('click', '#cancel_pending_contract_btn', function(){
        var id = this.getAttribute('data-id');
	//alert(id);
        if (window.confirm("Do you really want to cancel this contract? Press cancel if no.")) { 
            $.ajax({
                        type:"POST",
                        url:"contracts/ar/ajax/ar_cancel.php",
                        data:{
                            id:id
                        },
                        success:function(data)
                        {
                            alert('Successfully canceled contract from supervisor viewing, if you would like to make edits the status of the contract has been changed to SAVED.');
                            location.reload();
                        }
            });
        }
});
      
        
$(document).on('click', '#save_saved_ar_btn', function(){
    
                var id = this.getAttribute('data-id');
                var name_cust = $('input[name=name_cust]').val();
                var attention = $('input[name=attention]').val();
                var address_cust = $('input[name=address_cust]').val();
                var city_cust = $('input[name=city_cust]').val();
                var state_cust = $("#state_cust option:selected").val();
                var zip_cust = $('input[name=zip_cust]').val();
                var ar_estimate = $('input[name=ar_estimate]').val();
                var address_site = $('input[name=address_site]').val();
                var place_site = $('input[name=place_site]').val();
                var radio1 = $('input[name=type_site]');
                var type_site = radio1.filter(':checked').val();
                var project_description = $('input[name=project_description]').val();
                var county = $('input[name=county]').val();
                var voltage = $("#voltage option:selected").text();
                var radio2 = $('input[name=phase]');
                var phase = radio2.filter(':checked').val();
                var dwg_num = $('input[name=dwg_num]').val();
                var dwg_date = $('input[name=dwg_date]').val();
                var service_center = $('input[name=service_center]').val();
                var region = $('input[name=region]').val();
                var work_description = $('textarea#work_description').val();
                var comments = $('textarea#comments').val();
                var wonum = $('input[name=wonum]').val();
                var creator_name = $('input[name=creator_name]').val();
                var creator_id = $('input[name=creator_id]').val();
                var creator_title = $('input[name=creator_title]').val();
                var creator_phone = $('input[name=creator_phone]').val();
                var creator_email = $('input[name=creator_email]').val();

		$.ajax({
                    type:"POST",
		    url:"contracts/ar/ajax/ar_saved_save.php",
		    data:{     
                                id:id,
                                name_cust: name_cust,
		    		attention: attention,
                                address_cust: address_cust,
                                city_cust: city_cust,
                                state_cust: state_cust,
                                zip_cust: zip_cust,
                                ar_estimate: ar_estimate,
                                address_site: address_site,
                                place_site: place_site,
                                type_site: type_site,
                                project_description: project_description,
                                county: county,
                                voltage: voltage,
                                phase : phase,
                                dwg_num: dwg_num,
                                dwg_date: dwg_date,
                                service_center: service_center,
                                region: region,
                                work_description: work_description,
                                comments: comments,
                                wonum: wonum,
                                creator_name: creator_name,
                                creator_id: creator_id,
                                creator_title: creator_title,
                                creator_phone: creator_phone,
                                creator_email: creator_email
			},
		    success:function(data)
		    {
		    	alert('Contract Sucessfully Saved');
		    	window.location.href = "in_progress.php";
		    }
		});
        });
        
$(document).on('click', '#ar_saved_submit_btn', function(){
    
                var id = this.getAttribute('data-id');
                var name_cust = $('input[name=name_cust]').val();
                var attention = $('input[name=attention]').val();
                var address_cust = $('input[name=address_cust]').val();
                var city_cust = $('input[name=city_cust]').val();
                var state_cust = $("#state_cust option:selected").val();
                var zip_cust = $('input[name=zip_cust]').val();
                var ar_estimate = $('input[name=ar_estimate]').val();
                var address_site = $('input[name=address_site]').val();
                var place_site = $('input[name=place_site]').val();
                var radio1 = $('input[name=type_site]');
                var type_site = radio1.filter(':checked').val();
                var project_description = $('input[name=project_description]').val();
                var county = $('input[name=county]').val();
                var voltage = $("#voltage option:selected").text();
                var radio2 = $('input[name=phase]');
                var phase = radio2.filter(':checked').val();
                var dwg_num = $('input[name=dwg_num]').val();
                var dwg_date = $('input[name=dwg_date]').val();
                var service_center = $('input[name=service_center]').val();
                var region = $('input[name=region]').val();
                var work_description = $('textarea#work_description').val();
                var comments = $('textarea#comment').val();
                var wonum = $('input[name=wonum]').val();
                var creator_name = $('input[name=creator_name]').val();
                var creator_id = $('input[name=creator_id]').val();
                var creator_title = $('input[name=creator_title]').val();
                var creator_phone = $('input[name=creator_phone]').val();
                var creator_email = $('input[name=creator_email]').val();

                
		$.ajax({
                    type:"POST",
		    url:"contracts/ar/ajax/ar_saved_submit.php",
		    data:{     
                                id:id,
                                name_cust: name_cust,
		    		attention: attention,
                                address_cust: address_cust,
                                city_cust: city_cust,
                                state_cust: state_cust,
                                zip_cust: zip_cust,
                                ar_estimate: ar_estimate,
                                address_site: address_site,
                                place_site: place_site,
                                type_site: type_site,
                                project_description: project_description,
                                county: county,
                                voltage: voltage,
                                phase : phase,
                                dwg_num: dwg_num,
                                dwg_date: dwg_date,
                                service_center: service_center,
                                region: region,
                                work_description: work_description,
                                comments: comments,
                                wonum: wonum,
                                creator_name: creator_name,
                                creator_id: creator_id,
                                creator_title: creator_title,
                                creator_phone: creator_phone,
                                creator_email: creator_email
			},
		    success:function(data)
		    {
		    	alert('Contract Sucessfully Submitted');
		    	window.location.href = "in_progress.php";
		    }
		});
        });
        
$(document).ready(function() {
    $('.modal_button').click(function(){
        var id = $(this).attr('data-id');
         
        $.ajax({
                type:"POST",
		url:"contracts/ar/ajax/ar_reassign_modal.php",
                data:{     
                            id:id
                },
            success:function(result){
                
            $(".modal-content").html(result);
            }
        });
    });
    
});

$(document).on('click', '#reassign_btn', function(){
        var user_id = $('#reassign_planner_select').val();
        var btn_id = $('#btn_id').val();
        
        if(user_id == "Make a Selection")
        {
            alert('ERROR: No Selection Made');
           return;
        }
        else {
            $.ajax({
                        type:"POST",
                        url:"contracts/ar/ajax/ar_reassign_submit.php",
                        data:{
                            user_id:user_id,
                            btn_id:btn_id
                        },
                        success:function(data)
                        {
                            alert('Successfully Reassigned Contract.');
                            location.reload();
                        }
            });
        }
});

$(document).on('click', '#approve_btn', function(e){
		var id = this.getAttribute('data-id');
                var supervisor_sig = $('#approval_sig').val();
                var comment = $('#comment').val();
                
		$.ajax({
			type: "POST",
			url: "contracts/ar/ajax/ar_approve.php",
			data:{
				id: id,
                                supervisor_sig: supervisor_sig,
                                comment: comment
			},
			success:function(data){
				alert("Contract Approved");
				
                                window.location.href = "approved.php";
			}
		});
	});

$(document).on('click', '#reject_btn', function(e){
        var comment = $('#comment').val();
        var id = $('input[name=id]').val();

        $.ajax({
                type: "POST",
                url: "contracts/ar/ajax/ar_reject.php",
                data:{
                        id: id,
                        comment:comment
                },
                success:function(data){
                        alert("Email successfully sent to planner with your comments"); 
                        window.location.href = "supervisor.php";
                }
        });
});

$(document).on('change', '#service_center', function(e){
    
   var service_center = this.value;
    
   if(service_center == 'Caniff' || service_center == 'Trombly' || service_center == 'Redford'){
       $('input[name=region]').val("SE");
   }
   else if(service_center == 'Pontiac' || service_center == 'Howell' || service_center == 'Shelby'){
       $('input[name=region]').val("NW");
   }
   else if(service_center == 'Lapeer' || service_center == 'Marysville' || service_center == 'Mt. Clemens' || service_center == 'NAEC'){
       $('input[name=region]').val("NE");
   }
   else if(service_center == 'Ann Arbor' || service_center == 'Newport' || service_center == 'Western Wayne')
   {
       $('input[name=region]').val("SW");
   }
   else
   {
       $('input[name=region]').val("");
   }
   
});
