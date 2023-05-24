    function preencher(cpf_cliente, nome_cliente, telefone_cliente, nascimento_cliente) {
        $('#cpf_cliente').val(cpf_cliente);
        $('#nome_cliente').val(nome_cliente);
        $('#telefone_cliente').val(telefone_cliente);
        $('#nascimento_cliente').val(nascimento_cliente);
    }
        $('#form-editar-cliente').submit(function(evento) {
            evento.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: "../ajax/edit_cliente.php",
            data: $('#form-editar-cliente').serialize(),
            success: function(resposta){
                var jsonData = JSON.parse(resposta);

                if(jsonData.sucesso == 1){
                    alert('Sucesso!');
                    $("#modal-mensagem").modal('hide');
                window.location.reload(); 
                } else {
                    alert('Erro!');
                    $("#modal-mensagem").modal('hide');
                }
            }
        });
    });

    $(".btn-mensagem").on("click", () => {
        $("#modal-mensagem").modal('show');
    });    