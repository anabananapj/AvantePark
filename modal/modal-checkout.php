               
               
<!-- REGISTRO DE CHECK-OUT -->

               <div class="modal fade" id="modal-mensagem2">

<div class="modal-dialog">
    
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Check-Out<i style="margin-left:5px;" class="fa-solid fa-person-running"></i></h4>
            <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>

            </div>
            <div class="modal-body">
            <form id="form-check" method="post">

            <input type="hidden" name="idveiculo" id="idveiculo2">
            <input type="hidden" name="setor3" id="setor3">
                
            <label for="veiculosaindo" style="color:black;"><div class="label"style="margin-left:6rem;margin-top:1rem;">Veículo Saindo:</div>
            <input type="text" name="veiculosaindo" id="veiculosaindo" style="margin-left:5rem;width:10rem;"></label>

            <div>

            <label for="datasaida" style="color:black;"><div class="label"style="margin-left:-1.5rem;">Data de Saída:</div>
            <input type="date" name="datasaida" id="datasaida" style="margin-left:-1rem;width:10rem;"></label>

            <label for="horasaida" style="color:black;"><div class="label"style="margin-left:-1.9rem;">Hora de Saída:</div>
            <input type="time" name="horasaida" id="horasaida" style="margin-left:-2rem;width:10rem;"></label>

            <input type="hidden" name="horaentrada" id="horaentrada">
            <input type="hidden" name="idvaga" id="idvaga">

            </div>
            
            <div>
                
            <label for="total" style="color:black;"><div class="label" style="margin-left:8rem;">Estadia:</div>
            <input type="text" name="total" id="total"  style="margin-left:5rem;width:10rem;"></label>

            <label for="totalpag" style="color:black;"><div class="label" style="margin-left:7rem;color:red;">Total a Pagar:</div>
            <input type="text" name="totalpag" id="totalpag" style="margin-left:5rem;width:10rem;"></label>

            <div for="metodopag" class="label" style="margin-left:9.2rem;">Método de Pagamento:</div>
                    <select name="metodopag" id="metodopag" style="border:2px solid black;border-radius:5px;margin-left:9.5rem;width:10rem;height:2rem;">
                    <option value="Nulo"></option>
                    <option value="Crédito">Crédito</option>
                    <option value="Débito">Débito</option>
                    <option value="Dinheiro">Dinheiro</option>
                    <option value="PIX">PIX</option>

            </select>   

            
        </div>
    </div>

    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal"  style="color:white;">Fechar</button>
                    <button class="btn btn-default" id="concluir" style="color:white;">Concluir</button>
                </form>
                </div>
            </div>
        </div>
    </div>