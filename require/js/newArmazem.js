function criarArmazem(){

    $.post(
            "../../require/trans/newArmazem.php",
        {
            nome:         $("#nome").val(),
            endereco:     $("#endereco").val(),
            tamanho :     $("#tamanho").val(),
        }
        ).done(function( data ) {
            if(data == 'ok'){
              $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Armazém cadastrado!");
              setTimeout(function(){location.href='armazens'}, 1200);
            }else{
              $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
            }
        });
    }
    
    function editarArmazem(){
    
      $.post(
              "../../require/trans/newArmazem.php",
          {
              id:         $("#id").val(),
              nome:         $("#nome").val(),
              endereco:     $("#endereco").val(),
              tamanho :     $("#tamanho").val(),
          }
          ).done(function( data ) {
              if(data == 'ok'){
                $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Armazém alterado!");
                setTimeout(function(){location.href='armazens'}, 1200);
              }else{
                $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
              }
          });
      }
    
      function removerArmazem(){
    
        $.post(
                "../../require/trans/deleteArmazem.php",
            {
                id:         $("#id").val()
            }
            ).done(function( data ) {
                if(data == 'ok'){
                  $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-success").text("Armazém removido com sucesso!");
                  setTimeout(function(){location.href='armazens'}, 1200);
                }else{
                  $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text(data);
                }
            });
        }
      