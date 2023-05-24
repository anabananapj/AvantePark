
                    /* AJAX DE CANCELAMENTO */

                function preencher(idveiculo, modelo, placa, setor, idvaga){
                        $('#idveiculo').val(idveiculo);
                        $('#modelo').val(modelo);
                        $('#placa').val(placa); 
                        $('#setor2').val(setor); 
                        $('#idvaga2').val(idvaga);


                }

                $('#form-cancelar').submit(function(evento){
                    evento.preventDefault();
                    $.ajax({
                        type:'POST',
                        url:"../ajax/cancel.php",
                        data: $('#form-cancelar').serialize(),
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






                /* AJAX DO CHECKOUT */


            function checkout(idveiculo, placa, setor, idvaga){
                $('#idveiculo2').val(idveiculo);
                $('#veiculosaindo').val(placa);
                $('#setor3').val(setor);
                $('#idvaga').val(idvaga);

            }

            $('#form-check').submit(function(evento){
                evento.preventDefault();

                $.ajax({
                    type:'POST',
                    url:"../ajax/checkout.php",
                    data: $('#form-check').serialize(),
                    success: function(resposta){
                        var jsonData = JSON.parse(resposta);

                        if(jsonData.sucesso == 1){
                            alert('Sucesso!');
                            $("#modal-mensagem2").modal('hide');
                            window.location.reload(); 
                        } else {
                            alert('Erro!');
                            $("#modal-mensagem2").modal('hide');
                        }
                    }
                });
            });

            $(".btn-mensagem2").on("click", () => { 
                $("#modal-mensagem2").modal('show');
            });





        /* FUNCAO DE BUSCAR VAGAS */


        $("#select").on("change", function(){
            $.ajax({
                type:'POST',
                url:'../ajax/vagas.php',
                data: { setor: $("#select").val() },
                success: function(resposta){
                    var json = JSON.parse(resposta);
                    $("#vaga").html('');
                    json.map(function(item){
                        $("#vaga").append("<option value="+item.id_vaga+">"+item.setor+item.vaga+"</option>");
                    })
                }
            })
        })






            /* FUNCAO DE CALCULAR TEMPO NO ESTACIONAMENTO */


        $("#horasaida").on("blur", function(){
            var c1 = new Date($("#dataentrada").val()+" "+$("#horaentrada").val());
            var c2 = new Date($("#datasaida").val()+" "+$("#horasaida").val());


            var diff = Math.abs(c1 - c2);

            diffMM = Math.abs(Math.floor(diff/1000/60));
            diffHH = Math.abs(Math.floor(diff/1000/60/60));
        

            $("#total").val(diffHH+":"+diffMM);
            
            if(diffMM <= 15 && diffHH === 0){
                $("#totalpag").val("R$ 5,00");
            } else
            if(diffHH >= 1 && diffHH <= 3){
                $("#totalpag").val("R$ 20,00");
            }
            if(diffHH >= 4 && diffHH <= 6){
                $("#totalpag").val("R$ 30,00");
            }
        })

        function calcular(horaentrada){
            $('#horaentrada').val(horaentrada);
        }





                /* BUSCA DA TABELA DE CHECK-IN*/



            var search = document.getElementById('search');

                search.addEventListener("keydown", function(event){
                    if (event.key === "Enter")
                {
                    searchData();
                }

                });

                function searchData()
                {
                    window.location = 'check-in.php?search='+search.value;
                }




                
        /* FUNCAO DE BUSCAR CLIENTE */


        $("#cpf").on("change", function(){
            $.ajax({
                type:'POST',
                url:'../ajax/buscar_clientes.php',
                data: { cpf: $("#cpf").val() },
                success: function(resposta){
                    var json = JSON.parse(resposta);
                    $("#nome_cliente").html('');
                    $("#nome_cliente").append("<option value="+json.id_cliente+">"+json.nome_cliente+"</option>");
                }
            })
            })
