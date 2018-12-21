function checkForm(form)
  {
    re = /[a-z]/;
    if(!re.test(form.Full_Name.value)) {
      alert("Error:Fullname must contain only 3-16 characters long and contain only letters!");
      form.Full_Name.focus();
      return false;
    }
     re = /^\w+$/;
    if(!re.test(form.Username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.Username.focus();
      return false;
    }
    if(form.Password1.value != "" && form.Password1.value == form.Password2.value) {
      if(form.Password1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.Password1.focus();
        return false;
      }
      if(form.Password1.value == form.Username.value) {
        alert("Error: Password must be different from Username!");
        form.Password1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.Password1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.Password1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.Password1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.Password1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.Password1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.Password1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.Password1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.Password1.value);
    return true;
  }