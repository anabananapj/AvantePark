
            /* EDITAR FUNCIONARIOS */

        function preencher(idpf, nome, telefone, nascimento, rua, numero, bairro) {
            $('#idpf').val(idpf);
            $('#nome').val(nome);
            $('#telefone').val(telefone);
            $('#nascimento').val(nascimento);
            $('#rua').val(rua);
            $('#numero').val(numero);
            $('#bairro').val(bairro);
        }
            $('#form-editar').submit(function(evento) {
                evento.preventDefault();
            
            $.ajax({
                type: 'POST',
                url: "../ajax/edit_func.php",
                data: $('#form-editar').serialize(),
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

        

        /* BUSCA NA TABELA DE FUNCIONARIOS */
  
        var search = document.getElementById('search');

        search.addEventListener("keydown", function(event){
            if (event.key === "Enter")
        {
            searchData();
        }
        
        });

        function searchData()
        {
            window.location = 'tabelagerente.php?search='+search.value;
        }
