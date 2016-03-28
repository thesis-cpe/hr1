<script language="javascript"> 
		function check_form(){
		var name = document.form.txtName.value;    
		var lastname = document.form.txtSurname.value;    
        if(name.length < 1){
            alert("โปรดใส่ชื่อ");
            document.form.name.focus();
            return false;
        }
        else if(lastname.length < 1){
            alert("โปรดใส่นามสกุล");
            document.form.lastname.focus();
            return false;
        }
        else {
            document.form.Submit.disabled=true;
            return true;
        }
}
	</script>