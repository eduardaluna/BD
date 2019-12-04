function criarFornecedor(){

    $.post(
            "../../require/trans/newFornecedor.php",
        {
            nome:             $("#nome").val(),
            documento:        $("#documento").val(),
            localidade:       $("#localidade").val(),
            tipoDeFornecedor: $("#tipoDeFornecedor").val(),
        }
        ).done(function( data ) {
            if(data == 'ok'){
              $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Fornecedor cadastrado!");
              setTimeout(function(){location.href='fornecedores'}, 1200);
            }else{
              $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
            }
        });
    }
    
    function editarFornecedor(){
    
      $.post(
              "../../require/trans/newFornecedor.php",
          {
              nome:             $("#nome").val(),
              documento:        $("#documento").val(),
              localidade:       $("#localidade").val(),
              tipoDeFornecedor: $("#tipoDeFornecedor").val(),
          }
          ).done(function( data ) {
              if(data == 'ok'){
                $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Fornecedor alterado!");
                setTimeout(function(){location.href='fornecedores'}, 1200);
              }else{
                $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
              }
          });
      }
    
      function removerFornecedor(){
    
        $.post(
                "../../require/trans/deleteFornecedor.php",
            {
                documento:         $("#documento").val()
            }
            ).done(function( data ) {
                if(data == 'ok'){
                  $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-success").text("Fornecedor removido com sucesso!");
                  setTimeout(function(){location.href='armazens'}, 1200);
                }else{
                  $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text(data);
                }
            });
        }
      