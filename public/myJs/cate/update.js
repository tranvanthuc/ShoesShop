
  $(document).ready(function() {

    $name = $('#name');
    $gender = $('#gender');
    
    var api = getAPI();
    
    var id = getParam('id');
    var idParam = {
      id: id,
    };

    $.ajax({
      type: 'POST',
      url: api + 'cates/cate',
      data: convertIntoJson(idParam),
      success: function(data) {
        var cate = getData(data)[0];
        $name.val(cate.name);
        $gender.val(cate.gender);
      }
    });

    $('#btnSubmit').click(function(){
      var cate = {
        id: id,
        name: $name.val(),
        gender: $gender.val()
      };
  
      $.ajax({
        type: 'POST',
        url: api + 'cate/update',
        data: JSON.stringify(cate),
        success: function(data) {
          var cate = getData(data)[0];
          console.log(cate);
          window.location.href = "/ajax/cates";
        },
        error: function() {
          alert('Update cate error');
        }
      });
    });
    
  });
