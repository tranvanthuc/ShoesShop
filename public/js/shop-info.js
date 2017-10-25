// validate phone
function validatephone(phone) {
  var maintainplus = "";
  var numval = phone.value;
  if (numval.charAt(0) == "+") {
    var maintainplus = "";
  }
  curphonevar = numval.replace(
    /[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,
    ""
  );
  phone.value = maintainplus + curphonevar;
  var maintainplus = "";
  phone.focus;
}

// validate email
function email_validate(email) {
  var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

  if (regMail.test(email) == false) {
    document.getElementById("status").innerHTML =
      "<span class='warning'>Email address is not valid yet.</span>";
  } else {
    document.getElementById("status").innerHTML = "";
  }
}
