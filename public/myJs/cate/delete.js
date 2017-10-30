$(document).ready(function() {
  $('#btnDelete').click(function(){
    var id = getParam('id');
    var api = getAPI();
    var idPatam = {
      id: id,
    };

    $.ajax({
      type: 'POST',
      url: api + 'cate/delete',
      data: JSON.stringify(idPatam),
      success: function(data) {
        var cate = getData(data)[0];
        console.log(cate);
        window.location.href = "/ajax/cates";
      },
      error: function() {
        alert('Delete cate error');
      }
    });
  });
  
});