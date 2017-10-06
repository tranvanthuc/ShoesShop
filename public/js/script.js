

function check_pass() {
  if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
      document.getElementById('submit').disabled = false;
  } else {
      document.getElementById('submit').disabled = true;
  }
}


function deleteTodo(href, todoName){
  var confirmDelete = confirm("Do you want to delete '" + todoName+ "' ?");
  if(confirmDelete) {
    window.location.href = href;
  }
}