
jQuery(document).on('submit','#formLg',function(event){
  event.preventDefault();
  jQuery.ajax({
      url:'include/login.php',
      type:'POST',
      dataType:'json',
      data:$(this).serialize(),
      beforeSend:function(){
        $('.btn-login').val('Validando...');
      }
    })
    .done(function(respuesta){
      console.log(respuesta);
      if (!respuesta.error) {
        if (respuesta.tipo=='admin') {
          location='main_app/admin/inventory.php';
        }else if (respuesta.tipo=='user') {
          location='main_app/user/user.php';
        }
      }else {
        $('.error').slideDown('slow');
        setTimeout(function(){
        $('.error').slideUp('slow');
      },2500);
      $('.btn-login').val('Iniciar Sesión');
      }
    })
    .fail(function(resp){
      console.log(resp.responseText);
    })
    .always(function(){
      console.log("complete");
  });
});