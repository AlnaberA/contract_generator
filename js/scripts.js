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