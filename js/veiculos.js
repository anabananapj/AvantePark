

        /* FUNCAO DE BUSCA */

var search = document.getElementById('search');

search.addEventListener("keydown", function(event){
    if (event.key === "Enter")
{
    searchData();
}

});

function searchData()
{
    window.location = 'veiculos.php?search='+search.value;
}





        /* CHECAR VINCULACAO */

function vinculacao(nome_cliente, cpf_cliente){
            $('#nome_cliente').val(nome_cliente);
            $('#cpf_cliente').val(cpf_cliente);

    }

    $('#form-vinculacao').submit(function(evento){
        evento.preventDefault();
        $.ajax({
            type:'POST',
            data: $('#form-vinculacao').serialize(),
            success: function(resposta){
                var jsonData = JSON.parse(resposta);

                if(jsonData.sucesso == 1){
                    alert('Sucesso!');
                    $("#modal-mensagem3").modal('hide');
                window.location.reload(); 
                } else {
                    alert('Erro!');
                    $("#modal-mensagem3").modal('hide');
                }
            }
        });
    });

    $(".btn-mensagem2").on("click", () => {
        $("#modal-mensagem3").modal('show');
    });
