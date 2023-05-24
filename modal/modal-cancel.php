
<!-- MODAL DE CANCELAMENTO -->


<div class="modal fade" id="modal-mensagem">

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Cancelamento</h4>
        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>

        </div>
        <div class="modal-body">
        <form id="form-cancelar" method="post">
                
        <input type="hidden" name="idveiculo" id="idveiculo">

        <label for="modelo" style="color:black;"><div class="label"style="margin-left:-3rem;">Modelo:</div>
        <input type="text" disabled="disabled" name="modelo" id="modelo" style="margin-left:-3rem;width:10rem;"></label>

        <label for="placa" style="color:black;"><div class="label"style="margin-left:-55px;">Placa:</div>
        <input type="text" disabled="disabled" name="placa" id="placa" style="margin-left:-60px;width:5rem;"></label>


        <label for="setor2" style="color:black;"><div class="label"style="margin-left:-50px;">Setor:</div>
        <input type="text" disabled="disabled" name="setor2" id="setor2" style="margin-left:-50px;width:8rem;"></label>s


        <div class="form-group purple-border">
        <label for="motivo" class="textarea" id="motivo" for="exampleFormControlTextarea4">Motivo do Cancelamento:</label>
        <textarea name="motivo" id="motivo" style="resize:none;"class="form-control" rows="8" required></textarea>

        <input type="hidden" name="idvaga2" id="idvaga2">
       
        </div>

        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal" style="color:white;">Fechar</button>
            <button class="btn btn-default" id="editar" style="color:white;">Enviar</button>
        </form>
        </div>
    </div>
</div>
</div>
</html>