$(document).ready(function(){
	$(document).on('click', '#submit_btn', function(){
		$('[name="address_cust"], [name="city_cust"], [name="state_cust"], [name="zip_cust"], [name="address_site"], [name="city_site"], [name="cc_wo_num"], [name="agreement_num"], [name="dwg_num"], [name="dwg_date"], [name="voltage"], [name="sic_code"], [name="select_planner"], [name="trench_length"], [name="add_trans_load"], [name="winter_const"], [name="ann_use"], [name="permits_row"], [name="ug_vs_oh"], [name="system_mod_cost"], [name="construct_cost"]').each(function () {
            $(this).rules('add', {
                required: true
            });
        });

		if ($("#contract_form").valid()){
                    alert('contract is valid.');
			var comment = $('#comment').val();
			var name_cust = $('input[name=name_cust]').val();
			var address_cust = $('input[name=address_cust]').val();
			var city_cust = $('input[name=city_cust]').val();
			var state_cust = $("#state_cust option:selected").val();
			var zip_cust = $('input[name=zip_cust]').val();
			var address_site = $('input[name=address_site]').val();
			var city_site = $('input[name=city_site]').val();

			var radio1 = $('input[name=city_twn_vil]');
			var city_twn_vil = radio1.filter(':checked').val();

			var cc_wo_num = $('input[name=cc_wo_num]').val();
			var agreement_num = $('input[name=agreement_num]').val();
			var dwg_num = $('input[name=dwg_num]').val();
			var dwg_date = $('input[name=dwg_date]').val();
			var voltage = $("#voltage option:selected").text();

			var radio2 = $('input[name=phase]');
			var phase = radio2.filter(':checked').val();

			var sic_code = $("#sic_code option:selected").text();
			var name_planner = $('input[name=name_planner]').val();
			var id_planner = $('input[name=id_planner]').val();
			var title_planner = $('input[name=title_planner]').val();
			var phone_planner = $('input[name=phone_planner]').val();
			var email_planner = $('input[name=email_planner]').val();
			var region_planner = $('input[name=region_planner]').val();
			var address_planner_line1 = $('input[name=address_planner]').val();
			var address_planner_line2 = $('input[name=address_planner2]').val();
			var trench_length = $('input[name=trench_length]').val();
			var add_trans_load = $('input[name=add_trans_load]').val();
			var winter_const = $('input[name=winter_const]').val();
			var ann_use = $('input[name=ann_use]').val();
			var ciac_credit = $('input[name=ciac_credit]').val();
			var construct_cost = $('input[name=construct_cost]').val();
			var permits_row = $('input[name=permits_row]').val();
			var ug_vs_oh = $('input[name=ug_vs_oh]').val();
			var add_construct_cost = $('input[name=add_construct_cost]').val();
			var add_construct_cost_reason = $('input[name=add_construct_cost_reason]').val();
			var system_mod_cost = $('input[name=system_mod_cost]').val();

			$.ajax({
				type:"POST",
			    url:"contracts/ciac/ajax_calls/submit_contract.php",
			    data:{name_cust: name_cust,
						address_cust: address_cust,
						city_cust: city_cust,
						state_cust: state_cust,
						zip_cust: zip_cust,
						address_site: address_site,
						city_site: city_site,
						city_twn_vil: city_twn_vil,
						cc_wo_num: cc_wo_num,
						agreement_num: agreement_num,
						dwg_num: dwg_num,
						dwg_date: dwg_date,
						voltage: voltage,
						phase : phase ,
						sic_code : sic_code ,
						name_planner: name_planner,
						id_planner: id_planner,
						title_planner: title_planner,
						phone_planner: phone_planner,
						email_planner: email_planner,
						region_planner : region_planner,
						address_planner_line1: address_planner_line1,
						address_planner_line2: address_planner_line2,
						trench_length: trench_length,
						add_trans_load: add_trans_load,
						winter_const: winter_const,
						ann_use: ann_use,
						ciac_credit : ciac_credit ,
						construct_cost : construct_cost ,
						permits_row: permits_row,
						ug_vs_oh: ug_vs_oh,
						add_construct_cost: add_construct_cost,
						add_construct_cost_reason: add_construct_cost_reason,
						system_mod_cost: system_mod_cost,
						comment: comment
				},
			    success:function(data)
			    {
			        alert("Contract sent to supervisor for approval");
			        location.reload();
			    }
			});
		}

		else{
			$('#ac_comment_modal').modal('hide');
			$('html, body').animate({ scrollTop: 0 }, 'fast');
			alert('Some values have not been input');
		}
	});

	$(document).on('click', '#edit_submit_btn', function(){
		$('[name="address_cust"], [name="city_cust"], [name="state_cust"], [name="zip_cust"], [name="address_site"], [name="city_site"], [name="cc_wo_num"], [name="agreement_num"], [name="dwg_num"], [name="dwg_date"], [name="voltage"], [name="sic_code"], [name="select_planner"], [name="trench_length"], [name="add_trans_load"], [name="winter_const"], [name="ann_use"], [name="permits_row"], [name="ug_vs_oh"], [name="system_mod_cost"], [name="construct_cost"]').each(function () {
            $(this).rules('add', {
                required: true
            });
        });

		if ($("#contract_form").valid()){
			var comment = $('#comment').val();
			var id = this.getAttribute('data-id');
			var name_cust = $('input[name=name_cust]').val();
			var address_cust = $('input[name=address_cust]').val();
			var city_cust = $('input[name=city_cust]').val();
			var state_cust = $("#state_cust option:selected").val();
			var zip_cust = $('input[name=zip_cust]').val();
			var address_site = $('input[name=address_site]').val();
			var city_site = $('input[name=city_site]').val();

			var radio1 = $('input[name=city_twn_vil]');
			var city_twn_vil = radio1.filter(':checked').val();

			var cc_wo_num = $('input[name=cc_wo_num]').val();
			var agreement_num = $('input[name=agreement_num]').val();
			var dwg_num = $('input[name=dwg_num]').val();
			var dwg_date = $('input[name=dwg_date]').val();
			var voltage = $("#voltage option:selected").text();

			var radio2 = $('input[name=phase]');
			var phase = radio2.filter(':checked').val();

			var sic_code = $("#sic_code option:selected").text();
			var name_planner = $('input[name=name_planner]').val();
			var id_planner = $('input[name=id_planner]').val();
			var title_planner = $('input[name=title_planner]').val();
			var phone_planner = $('input[name=phone_planner]').val();
			var email_planner = $('input[name=email_planner]').val();
			var region_planner = $('input[name=region_planner]').val();
			var address_planner_line1 = $('input[name=address_planner]').val();
			var address_planner_line2 = $('input[name=address_planner2]').val();
			var trench_length = $('input[name=trench_length]').val();
			var add_trans_load = $('input[name=add_trans_load]').val();
			var winter_const = $('input[name=winter_const]').val();
			var ann_use = $('input[name=ann_use]').val();
			var ciac_credit = $('input[name=ciac_credit]').val();
			var construct_cost = $('input[name=construct_cost]').val();
			var permits_row = $('input[name=permits_row]').val();
			var ug_vs_oh = $('input[name=ug_vs_oh]').val();
			var add_construct_cost = $('input[name=add_construct_cost]').val();
			var add_construct_cost_reason = $('input[name=add_construct_cost_reason]').val();
			var system_mod_cost = $('input[name=system_mod_cost]').val();

			$.ajax({
				type:"POST",
			    url:"contracts/ciac/ajax_calls/saved_submit.php",
			    data:{id: id,
			    		name_cust: name_cust,
						address_cust: address_cust,
						city_cust: city_cust,
						state_cust: state_cust,
						zip_cust: zip_cust,
						address_site: address_site,
						city_site: city_site,
						city_twn_vil: city_twn_vil,
						cc_wo_num: cc_wo_num,
						agreement_num: agreement_num,
						dwg_num: dwg_num,
						dwg_date: dwg_date,
						voltage: voltage,
						phase : phase ,
						sic_code : sic_code ,
						name_planner: name_planner,
						id_planner: id_planner,
						title_planner: title_planner,
						phone_planner: phone_planner,
						email_planner: email_planner,
						region_planner : region_planner,
						address_planner_line1: address_planner_line1,
						address_planner_line2: address_planner_line2,
						trench_length: trench_length,
						add_trans_load: add_trans_load,
						winter_const: winter_const,
						ann_use: ann_use,
						ciac_credit : ciac_credit ,
						construct_cost : construct_cost ,
						permits_row: permits_row,
						ug_vs_oh: ug_vs_oh,
						add_construct_cost: add_construct_cost,
						add_construct_cost_reason: add_construct_cost_reason,
						system_mod_cost: system_mod_cost,
						comment: comment
				},
			    success:function(data)
			    {
			    	$('#ec_comment_modal').modal('hide');
			        alert("Contract sent to supervisor for approval");
			        window.location.href = "in_progress.php";
			    }
			});
		}

		else{
			$('html, body').animate({ scrollTop: 0 }, 'fast');
			alert('Some values have not been inputted');
		}
	});

	$(document).on('click', '#edit_save_btn', function(){
		$('[name="address_cust"], [name="city_cust"], [name="state_cust"], [name="zip_cust"], [name="address_site"], [name="city_site"], [name="cc_wo_num"], [name="agreement_num"], [name="dwg_num"], [name="dwg_date"]').each(function () {
            $(this).rules('remove');
        });

		if ($("#contract_form").valid()){
			var id = this.getAttribute('data-id');
			var name_cust = $('input[name=name_cust]').val();
			var address_cust = $('input[name=address_cust]').val();
			var city_cust = $('input[name=city_cust]').val();
			var state_cust = $("#state_cust option:selected").val();
			var zip_cust = $('input[name=zip_cust]').val();
			var address_site = $('input[name=address_site]').val();
			var city_site = $('input[name=city_site]').val();

			var radio1 = $('input[name=city_twn_vil]');
			var city_twn_vil = radio1.filter(':checked').val();

			var cc_wo_num = $('input[name=cc_wo_num]').val();
			var agreement_num = $('input[name=agreement_num]').val();
			var dwg_num = $('input[name=dwg_num]').val();
			var dwg_date = $('input[name=dwg_date]').val();
			var voltage = $("#voltage option:selected").text();

			var radio2 = $('input[name=phase]');
			var phase = radio2.filter(':checked').val();

			var sic_code = $("#sic_code option:selected").text();
			var name_planner = $('input[name=name_planner]').val();
			var id_planner = $('input[name=id_planner]').val();
			var title_planner = $('input[name=title_planner]').val();
			var phone_planner = $('input[name=phone_planner]').val();
			var email_planner = $('input[name=email_planner]').val();
			var region_planner = $('input[name=region_planner]').val();
			var address_planner_line1 = $('input[name=address_planner]').val();
			var address_planner_line2 = $('input[name=address_planner2]').val();
			var trench_length = $('input[name=trench_length]').val();
			var add_trans_load = $('input[name=add_trans_load]').val();
			var winter_const = $('input[name=winter_const]').val();
			var ann_use = $('input[name=ann_use]').val();
			var ciac_credit = $('input[name=ciac_credit]').val();
			var construct_cost = $('input[name=construct_cost]').val();
			var permits_row = $('input[name=permits_row]').val();
			var ug_vs_oh = $('input[name=ug_vs_oh]').val();
			var add_construct_cost = $('input[name=add_construct_cost]').val();
			var add_construct_cost_reason = $('input[name=add_construct_cost_reason]').val();
			var system_mod_cost = $('input[name=system_mod_cost]').val();

			$.ajax({
				type:"POST",
			    url:"contracts/ciac/ajax_calls/saved_save.php",
			    data:{id: id,
			    		name_cust: name_cust,
						address_cust: address_cust,
						city_cust: city_cust,
						state_cust: state_cust,
						zip_cust: zip_cust,
						address_site: address_site,
						city_site: city_site,
						city_twn_vil: city_twn_vil,
						cc_wo_num: cc_wo_num,
						agreement_num: agreement_num,
						dwg_num: dwg_num,
						dwg_date: dwg_date,
						voltage: voltage,
						phase : phase ,
						sic_code : sic_code ,
						name_planner: name_planner,
						id_planner: id_planner,
						title_planner: title_planner,
						phone_planner: phone_planner,
						email_planner: email_planner,
						region_planner : region_planner,
						address_planner_line1: address_planner_line1,
						address_planner_line2: address_planner_line2,
						trench_length: trench_length,
						add_trans_load: add_trans_load,
						winter_const: winter_const,
						ann_use: ann_use,
						ciac_credit : ciac_credit ,
						construct_cost : construct_cost ,
						permits_row: permits_row,
						ug_vs_oh: ug_vs_oh,
						add_construct_cost: add_construct_cost,
						add_construct_cost_reason: add_construct_cost_reason,
						system_mod_cost: system_mod_cost
				},
			    success:function(data)
			    {
			        alert("Succesfully saved contract");
			        window.location.href = "in_progress.php";
			    }
			});
		}

		else{
			$('html, body').animate({ scrollTop: 0 }, 'fast');
		}
	});

	$(document).on('click', '#save_btn', function(){
		$('[name="address_cust"], [name="city_cust"], [name="state_cust"], [name="zip_cust"], [name="address_site"], [name="city_site"], [name="cc_wo_num"], [name="agreement_num"], [name="dwg_num"], [name="dwg_date"]').each(function () {
            $(this).rules('remove');
        });

		if ($("#contract_form").valid()){
			var name_cust = $('input[name=name_cust]').val();
			var address_cust = $('input[name=address_cust]').val();
			var city_cust = $('input[name=city_cust]').val();
			var state_cust = $("#state_cust option:selected").val();
			var zip_cust = $('input[name=zip_cust]').val();
			var address_site = $('input[name=address_site]').val();
			var city_site = $('input[name=city_site]').val();

			var radio1 = $('input[name=city_twn_vil]');
			var city_twn_vil = radio1.filter(':checked').val();

			var cc_wo_num = $('input[name=cc_wo_num]').val();
			var agreement_num = $('input[name=agreement_num]').val();
			var dwg_num = $('input[name=dwg_num]').val();
			var dwg_date = $('input[name=dwg_date]').val();
			var voltage = $("#voltage option:selected").text();

			var radio2 = $('input[name=phase]');
			var phase = radio2.filter(':checked').val();

			var sic_code = $("#sic_code option:selected").text();
			var name_planner = $('input[name=name_planner]').val();
			var id_planner = $('input[name=id_planner]').val();
			var title_planner = $('input[name=title_planner]').val();
			var phone_planner = $('input[name=phone_planner]').val();
			var email_planner = $('input[name=email_planner]').val();
			var region_planner = $('input[name=region_planner]').val();
			var address_planner_line1 = $('input[name=address_planner]').val();
			var address_planner_line2 = $('input[name=address_planner2]').val();
			var trench_length = $('input[name=trench_length]').val();
			var add_trans_load = $('input[name=add_trans_load]').val();
			var winter_const = $('input[name=winter_const]').val();
			var ann_use = $('input[name=ann_use]').val();
			var ciac_credit = $('input[name=ciac_credit]').val();
			var construct_cost = $('input[name=construct_cost]').val();
			var permits_row = $('input[name=permits_row]').val();
			var ug_vs_oh = $('input[name=ug_vs_oh]').val();
			var add_construct_cost = $('input[name=add_construct_cost]').val();
			var add_construct_cost_reason = $('input[name=add_construct_cost_reason]').val();
			var system_mod_cost = $('input[name=system_mod_cost]').val();

			$.ajax({
				type:"POST",
			    url:"contracts/ciac/ajax_calls/save_contract.php",
			    data:{name_cust: name_cust,
						address_cust: address_cust,
						city_cust: city_cust,
						state_cust: state_cust,
						zip_cust: zip_cust,
						address_site: address_site,
						city_site: city_site,
						city_twn_vil: city_twn_vil,
						cc_wo_num: cc_wo_num,
						agreement_num: agreement_num,
						dwg_num: dwg_num,
						dwg_date: dwg_date,
						voltage: voltage,
						phase : phase ,
						sic_code : sic_code ,
						name_planner: name_planner,
						id_planner: id_planner,
						title_planner: title_planner,
						phone_planner: phone_planner,
						email_planner: email_planner,
						region_planner : region_planner,
						address_planner_line1: address_planner_line1,
						address_planner_line2: address_planner_line2,
						trench_length: trench_length,
						add_trans_load: add_trans_load,
						winter_const: winter_const,
						ann_use: ann_use,
						ciac_credit : ciac_credit ,
						construct_cost : construct_cost ,
						permits_row: permits_row,
						ug_vs_oh: ug_vs_oh,
						add_construct_cost: add_construct_cost,
						add_construct_cost_reason: add_construct_cost_reason,
						system_mod_cost: system_mod_cost
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

	function getPlanner(){
		var name_planner = $("#select_planner option:selected").text();

		$.ajax({
			type: "POST",
			url: "contracts/ciac/form_actions/select_planner.php",
			data:{
				name_planner:name_planner
			},
			success:function(data){
				$('#planner_info').html(data);
			}
		});
	}

	$(document).on('click', '#cancel_pending_contract_btn', function(e){
		var id = this.getAttribute('data-id');

		$.ajax({
			type: "POST",
			url: "contracts/ciac/ajax_calls/cancel_pending_contract.php",
			data:{
				id: id
			},
			success:function(data){
				alert('Succesfully cancelled contract');
				location.reload();
			}
		});
	});

	$(document).on('click', '#cancel_super_contract_btn', function(e){
		var id = this.getAttribute('data-id');

		$.ajax({
			type: "POST",
			url: "contracts/ciac/ajax_calls/cancel_pending_contract.php",
			data:{
				id: id
			},
			success:function(data){
				alert('Succesfully cancelled contract');
				location.reload();
			}
		});
	});

	/*$(document).on('click', '#excel_download_btn', function(e){
		var from_date = $('input[name=from_date]').val();
		var to_date = $('input[name=to_date]').val();

		$.ajax({
			type: "POST",
			url: "excel_download.php",
			data:{
				from_date:from_date,
				to_date:to_date
			},
			success:function(data){
				location.reload();
			}
		});
	});*/

	$(document).on('click', '#delete_saved_contract_btn', function(e){
		var id = this.getAttribute('data-id');

		$.ajax({
			type: "POST",
			url: "contracts/ciac/ajax_calls/delete_saved_contract.php",
			data:{
				id: id
			},
			success:function(data){
				location.reload();
			}
		});
	});

	$(document).on('change', '#select_planner', function(e){
		var plannerSelected = $("option:selected", this);
		var name_planner = this.value;

		$.ajax({
			type: "POST",
			url: "contracts/ciac/form_actions/select_planner.php",
			data:{
				name_planner:name_planner
			},
			success:function(data){
				$("#planner_info").hide().html(data).slideDown();
				$('#planner_info').slideDown(750);
				$('#planner_info').html(data);
			}
		});
	});

	$(document).on('change', '#same_as_cust', function(){
		if (this.checked){
			var address_cust = $('input[name=address_cust]').val();
			var city_cust = $('input[name=city_cust]').val();

			$.ajax({
				type: "POST",
				url: "contracts/ciac/form_actions/same_as_cust_check.php",
				data: {
					address_cust:address_cust,
					city_cust:city_cust
				},
				success:function(data){
                                        $('#site_info').html(data);
				}
			});
		}

		else{
			$('#address_site').val('');
			$('#city_site').val('');
		}
	});

	$(document).on('click', '#approve_btn', function(e){
		var id = this.getAttribute('data-id');
                var supervisor_sig = $('#approval_sig').val();
                var comment = $('#comment').val();
                
		$.ajax({
			type: "POST",
			url: "contracts/ciac/ajax_calls/approve_contract.php",
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

	$(document).on('click', '#not_approved_submit_btn', function(e){
		var comment = $('#comment').val();
		var id = $('input[name=id]').val();

		$.ajax({
			type: "POST",
			url: "contracts/ciac/ajax_calls/not_approved_contract.php",
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

	$(document).on('click', '#close_alert', function(e){
		var userid = this.getAttribute('data-userid');

		$.ajax({
			type: "POST",
			url: "contracts/ciac/ajax_calls/close_notification.php",
			data:{
				userid: userid
			},
			success:function(data){
			}
		});
	});

	//No longer using assign a contract feature
	/*$(document).on('click', '#assign_btn', function(e){
		if ($("#assign_form").valid()){
			var wonum = $('input[name=assign_wonum]').val();
			var planner = $("#planner option:selected").text();
			var cust_name = $('input[name=cust_name]').val();

			$.ajax({
				type: "POST",
				url: "contracts/ciac/ajax_calls/assign_contract.php",
				data:{
					wonum: wonum,
					planner: planner
				},
				success:function(data){
					alert("Contract successfully assigned to " + planner);
					location.reload();
				}
			});
		}
	});*/

	//Changes the contract type in the navbar for the current user
	$(document).on('change', '#contract_type', function(e){
		var contractSelected = $("option:selected", this);
		var contract_type = this.value;

		$.ajax({
			type: "POST",
			url: "contracts/general/update_contract_type.php",
			data:{
				contract_type:contract_type
			},
			success:function(data){
				location.reload();
			}
		});
	});


	var timerid;
    $("#ann_use").on("input",function(e){
        var ann_use = $(this).val();
        if($(this).data("lastval")!= ann_use){
            $(this).data("lastval", ann_use);

            clearTimeout(timerid);
            timerid = setTimeout(function() {

                //change action
                if (isNaN(ann_use)){
                	alert('Input not a valid number');
                }

                else{
	                $.ajax({
                                type: "POST",
                                url: "contracts/ciac/form_actions/calc_std_allowance.php",
                                data:{
                                        ann_use: ann_use
                                },
                                success:function(data){                                      
                                        $('#ciac_credit').val(data);
                                }
                             });
           		}

            },250);

        };
    });

    var timerid2;
    $("#cc_wo_num").on("input",function(e){
        var wonum = $(this).val();
        if($(this).data("lastval")!= wonum){
            $(this).data("lastval", wonum);

            clearTimeout(timerid);
            timerid2 = setTimeout(function() {

                //change action
                $.ajax({
                            type: "POST",
                            url: "contracts/ciac/form_actions/get_cost_construct.php",
                            data:{
                                    wonum: wonum
                            },
                            success:function(data){
                                    $('#construct_cost').val(data);
                            }
                    });

            },400);

        };
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
                        url:"contracts/ciac/ajax_calls/ciac_reassign_submit.php",
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

 $('.modal_button').click(function(){
        var id = $(this).attr('data-id');
         
        $.ajax({
                type:"POST",
		url:"contracts/ciac/ajax_calls/ciac_reassign_modal.php",
                data:{     
                            id:id
                },
            success:function(result){
                
            $(".modal-content").html(result);
            }
        });
    });


});
