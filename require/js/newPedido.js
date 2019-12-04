function criarPedido(){

    $.post(
            "../../require/trans/newPedido.php",
        {
            cliente:   $("#cliente").val(),
            dataPedido:   $("#dataPedido").val(),
            dataEntrega:  $("#dataEntrega").val(),
            modoEncomenda:$("#modoEncomenda").val(),
            status:0,
        }
        ).done(function( data ) {
            if(data == 'ok'){
              $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Pedido cadastrado!");
              setTimeout(function(){location.href='pedidos'}, 1200);
            }else{
              $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
            }
        });
    }
    
    function editarPedido(){
    
      $.post(
              "../../require/trans/newPedido.php",
          {
              id:         $("#id").val(),
              cliente:   $("#cliente").val(),
              dataPedido:   $("#dataPedido").val(),
              dataEntrega:  $("#dataEntrega").val(),
              modoEncomenda:$("#modoEncomenda").val(),
              status:       $("#status").val(),
          }
          ).done(function( data ) {
              if(data == 'ok'){
                $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-success").text("Pedido alterado!");
                setTimeout(function(){location.href='pedidos'}, 1200);
              }else{
                $("#ErrorLog").removeClass("hideAll alert-success").addClass("alert-danger").text(data);
              }
          });
      }
    
      function removerPedido(){
    
        $.post(
                "../../require/trans/deletePedido.php",
            {
                id:         $("#id").val()
            }
            ).done(function( data ) {
                if(data == 'ok'){
                  $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text("Pedido removido com sucesso!");
                  setTimeout(function(){location.href='pedidos'}, 1200);
                }else{
                  $("#ErrorLog").removeClass("hideAll alert-danger").addClass("alert-danger").text(data);
                }
            });
        }
      