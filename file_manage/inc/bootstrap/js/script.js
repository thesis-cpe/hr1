// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 4; // min caracters to display the autocomplete
	var keyword = $('#txtName').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'auto_complet.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#namecus_list_id').show();
				$('#namecus_list_id').html(data);
			}
		});
	} else {
		$('#namecus_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item1(item) {
	// change input value
	$('#txtName').val(item);
	// hide proposition list
	$('#namecus_list_id').hide();
	
}

// autocomplet : this function will be executed every time we change the text
function autocomnum() {
	var min_length = 2; // min caracters to display the autocomplete
	var num = $('#txtNumaudit').val();
	if (num.length >= min_length) {
		$.ajax({
			url: 'auto_complet.php',
			type: 'POST',
			data: {num:num},
			success:function(data){
				$('#num_list_id').show();
				$('#num_list_id').html(data);
			}
		});
	} else {
		$('#num_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item2(item) {
	// change input value
	$('#txtNumaudit').val(item);
	// hide proposition list
	$('#num_list_id').hide();
	
}

// autocomplet : this function will be executed every time we change the text
function autocomname() {
	var min_length = 4; // min caracters to display the autocomplete
	var employee = $('#txtNameaudit').val();
	if (employee.length >= min_length) {
		$.ajax({
			url: 'auto_complet.php',
			type: 'POST',
			data: {employee:employee},
			success:function(data){
				$('#name_list_id').show();
				$('#name_list_id').html(data);
			}
		});
	} else {
		$('#name_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item3(item) {
	// change input value
	$('#txtNameaudit').val(item);
	// hide proposition list
	$('#name_list_id').hide();
	
}

