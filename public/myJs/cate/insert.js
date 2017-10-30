$(document).ready(function() {

  $cates = $('#cates');
  $name = $('#name');
  $gender = $('#gender');
  $loading = $('#loading');
  

  var api = getAPI();
  $loading.show();
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
          $loading.hide();
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

    $loading.show();
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
          $loading.hide();
      },
      error: function() {
        alert('Insert cate error');
      }
    });
  })
});