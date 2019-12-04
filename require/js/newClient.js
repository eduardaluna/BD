function criarUsuario(){

$.post(
        "../../require/trans/newClient.php",
    {
        nome:         $("#nome").val(),
        cpf:          $("#cpf").val(),
        phone:     $("#phone").val(),
        email:        $("#email").val(),
        limite:       $("#limite").val(),
        pais:         $("#pais").val(),
        estado:       $("#estado").val(),
        cidade:       $("#cidade").val(),
    }
    ).done(function( data ) {
        if(data == 'ok'){
          $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Usuário cadastrado!");
          setTimeout(function(){location.href='clientes'}, 1200);
        }else{
          $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
        }
    });
}

function edtarUsuario(){

  $.post(
          "../../require/trans/newClient.php",
      {
          id:         $("#id").val(),
          nome:         $("#nome").val(),
          cpf:          $("#cpf").val(),
          limite:       $("#limite").val(),
          pais:         $("#pais").val(),
          estado:       $("#estado").val(),
          cidade:       $("#cidade").val(),
      }
      ).done(function( data ) {
          if(data == 'ok'){
            $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Usuário cadastrado!");
            setTimeout(function(){location.href='clientes'}, 1200);
          }else{
            $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
          }
      });
  }

  function removerUsuario(){

    $.post(
            "../../require/trans/deleteCliente.php",
        {
            id:         $("#id").val()
        }
        ).done(function( data ) {
            if(data == 'ok'){
              $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text("Usuário removido com sucesso!");
              setTimeout(function(){location.href='clientes'}, 1200);
            }else{
              $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text(data);
            }
        });
    }
  