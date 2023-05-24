
<div class="modal fade" id="modal-mensagem">

        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar<i style="position:relative;margin-left:5px;margin-top:-5px;cursor:inherit;" class='bx bxs-edit-alt'></i></h4>
                        <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>

                    </div>
                    <div class="modal-body">
                        <form id="form-editar" method="post">

                            <input type="hidden" name="idpf" id="idpf">

                            <label for="Nome" style="color:black;">
                                <div class="label" style="margin-left:0px;">Nome:</div>
                                <input type="text" name="nome" id="nome" style="width:20rem;">
                            </label>

                            <label for="nascimento" style="color:black;">
                                <div class="label" style="margin-left:0px;">Nascimento:</div>
                                <input type="date" name="nascimento" id="nascimento">
                            </label>

                            <label for="telefone" style="color:black;">
                                <div class="label" style="margin-left:0px;margin-left:-4rem;">Telefone:</div>
                                <input type="text" name="telefone" id="telefone" style="width:10.2rem;margin-left:-4rem;">
                            </label>

                            <label for="rua" style="color:black;">
                                <div class="label" style="margin-left:0px;">Rua:</div>
                                <input type="text" name="rua" id="rua" style="width:20rem;">
                            </label>

                            <label for="numerocasa" style="color:black;">
                                <div class="label" style="margin-left:0px;">Número:</div>
                                <input type="text" name="numerocasa" id="numero" style="width:5rem;">
                            </label>

                            <label for="bairro" style="color:black;">
                                <div class="label" style="margin-left:-4rem;">Bairro:</div>
                                <input type="text" name="bairro" id="bairro" style="margin-left:-4rem;width:14.2rem;">
                            </label>

                    </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fechar</button>
                    <button class="btn btn-default">Aplicar</button>
                 </form>
            </div>
        </div> 
    </div>
</div>