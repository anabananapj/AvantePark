
   /* FUNCAO BUSCAR */

var search = document.getElementById('search');

search.addEventListener("keydown", function(event){
    if (event.key === "Enter")
{
    searchrelat();
}

});

function searchrelat()
{
    window.location = 'relat-check.php?search='+search.value;
}



                    /* CHECAR MOTIVO DO CANCELAMENTO */

            function motivo_cancel(motivo){
                $('#motivo').val(motivo);


                }

                $('#form-motivo_cancel').submit(function(evento){
                    evento.preventDefault();
                    $.ajax({
                        url:'../ajax/motivo-cancel.php',
                        type:'POST',
                        data: $('#form-motivo_cancel').serialize(),
                        success: function(resposta){
                            var jsonData = JSON.parse(resposta);

                            if(jsonData.sucesso == 1){
                                alert('Sucesso!');
                                $("#modal-mensagem7").modal('hide');
                            window.location.reload(); 
                            } else {
                                alert('Erro!');
                                $("#modal-mensagem7").modal('hide');
                            }
                        }
                    });
                });

                $(".btn-mensagem7").on("click", () => {
                    $("#modal-mensagem7").modal('show');
                });
