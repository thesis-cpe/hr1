
// add_member function
function add_member() {
	// initialisation
	var url = 'add_member.php';
	var method = 'POST';
	var params = 'list2='+document.getElementById('list2').value;
	params += '&txtNewcus='+document.getElementById('txtNewcus').value;
	params += '&txtOldcus='+document.getElementById('txtOldcus').value;
	params += '&txtNumaudit='+document.getElementById('txtNumaudit').value;
	params += '&txtHour='+document.getElementById('txtHour').value;
	params += '&txtMoney='+document.getElementById('txtMoney').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="inc/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

// add_signatory function
function add_signatory() {
	// initialisation
	var url = 'add_signatory.php';
	var method = 'POST';
	var params = 'txtPerson='+document.getElementById('txtPerson').value;
	params += '&list2='+document.getElementById('list2').value;
	params += '&txtNumtax='+document.getElementById('txtNumtax').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="inc/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

// add_signatory_company function
function add_signatory_com() {
	// initialisation
	var url = 'add_signatory_com.php';
	var method = 'POST';
	var params = 'txtPerson='+document.getElementById('txtPerson').value;
	params += '&list2='+document.getElementById('list2').value;
	params += '&txtTax='+document.getElementById('txtTax').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="inc/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

// add_audit_company function
function add_audit_com() {
	// initialisation
	var url = 'add_audit_com.php';
	var method = 'POST';
	//var params = '$txtPer='+document.getElementById('txtPer').value;
	var params = '&txtAudit='+document.getElementById('txtAudit').value;
	params += '&txtTax='+document.getElementById('txtTax').value;
	var container_id = 'list_container_audit' ;
	var loading_text = '<img src="inc/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

// delete_member function
function delete_member(fk_employee_worker_id, fk_n_customer_id) {
	if (confirm('Are you sur to delete this member ?')) {
		// initialisation
		var url = 'delete_member.php';
		var method = 'POST';
		var params = 'fk_employee_worker_id='+fk_employee_worker_id;
		var params = 'fk_n_customer_id='+fk_n_customer_id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="inc/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

// delete_signatory function
function delete_signatory(signatory_id) {
	if (confirm('Are you sur to delete this signatory ?')) {
		// initialisation
		var url = 'delete_signatory.php';
		var method = 'POST';
		var params = 'signatory_id='+signatory_id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="inc/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

// delete_signatory_company function
function delete_signatory_com(signatory_company_id) {
	if (confirm('Are you sur to delete this signatory ?')) {
		// initialisation
		var url = 'delete_signatory_com.php';
		var method = 'POST';
		var params = 'signatory_company_id='+signatory_company_id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="inc/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

// delete_audit_company function
function delete_audit_com(employee_work_id) {
	if (confirm('Are you sur to delete this signatory ?')) {
		// initialisation
		var url = 'delete_audit_com.php';
		var method = 'POST';
		var params = 'employee_work_id='+employee_work_id;
		var container_id = 'list_container_audit' ;
		var loading_text = '<img src="inc/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
    	xhr = new XMLHttpRequest();
    } catch(e) {
	    try{ // for: IE6+
	    	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch(e1) { // if not supported or disabled
		    alert("Not supported!");
		}
	}
	xhr.onreadystatechange = function() {
						       if(xhr.readyState == 4) { // when result is ready
							       document.getElementById(container_id).innerHTML = xhr.responseText;
							   } else { // waiting for result 
							       document.getElementById(container_id).innerHTML = loading_text;
							   }
						   	}
	xhr.open(method, url, true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send(params);
}