function criarEstoque(){

    $.post(
            "../../require/trans/newEstoque.php",
        {
            codigo:       $("#codigo").val(),
            armazem_id:   $("#armazem").val(),
        }
        ).done(function( data ) {
            if(data == 'ok'){
              $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Estoque cadastrado!");
              setTimeout(function(){location.href='estoques'}, 1200);
            }else{
              $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
            }
        });
    }
    
    function editarEstoque(){
    
      $.post(
              "../../require/trans/newEstoque.php",
          {
              id:         $("#id").val(),
              codigo:       $("#codigo").val(),
              armazem_id:   $("#armazem").val(),
          }
          ).done(function( data ) {
              if(data == 'ok'){
                $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Estoque alterado!");
                setTimeout(function(){location.href='estoques'}, 1200);
              }else{
                $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
              }
          });
      }
    
      function removerEstoque(){
    
        $.post(
                "../../require/trans/deleteEstoque.php",
            {
                id:         $("#id").val()
            }
            ).done(function( data ) {
                if(data == 'ok'){
                  $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text("Estoque removido com sucesso!");
                  setTimeout(function(){location.href='estoques'}, 1200);
                }else{
                  $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text(data);
                }
            });
        }
      