$(document).ready(function() {

  $cates = $('#cates');
  $name = $('#name');
  $gender = $('#gender');

  var api = getAPI();
  $.ajax({
    type: 'GET',
    url: api + 'cates',
    success: function(data) {
      try {
        var cates = getData(data);
        $.each(cates, function(i, cate) {
          $cates.append(
            '<li><a href="/ajax/cate/update?id=' + cate.id + '"> '+ cate.name + '</a></li>'
          );
        });
      } catch (error) {
        alert(error);
      }
    }
  });

  $('#btnSubmit').click(function(){
    var cate = {
      name: $name.val(),
      gender: $gender.val()
    };

    $.ajax({
      type: 'POST',
      url: api + 'cate/insert',
      data: convertIntoJson(cate),
      success: function(data) {
        var cate = getData(data)[0];
        $cates.append(
          '<li><a href="/ajax/cate/update?id=' + 
          cate.id + '"> '+ cate.name + '</a></li>'
          );
      },
      error: function() {
        alert('Insert cate error');
      }
    });
  })
});