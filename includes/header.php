<!-- Box do lado com as opções. -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>




<div class="botoes" style="display:flex;">

            <div class="boxmov" >
                <div class="container-bemvindo">
                    <p class="bemvindo">Bem-vindo(a), <?php echo ucwords(strtok($_SESSION['nome'], " ")); ?>
                    <a href="logout.php" id='sair'><z style="padding-left:4px;color:red;" class='bx bx-log-out bx-sm'></z></a></p>
                    
                    <script>
                        $(function(){
                            $('#sair').on('click', function(event){
                                
                                if (!confirm('Pressione "OK" se deseja realmente sair.'))
                                    event.preventDefault();
                            });
                            });
                    </script>
                </div> 
                <div>
                <a href="../paginas/paginaprincipal.php" class="avantepark">AvantePark</a>
                <img src="../img/logo2.png" alt="img" style="position:absolute; margin:15px; width: 5rem; top: 14px;left:12px; " />
                <form method="POST">

                    <ul style="margin-left:-2.5rem; list-style:none;">
                    <li style="margin-bottom:30px;">
                    <a  href="check-in.php" class="moviment">
                        <i style="position: relative; top:3px;left:-5px;" class='bx bxs-door-open'></i>CHECK-IN E CHECK-OUT</a>
                    </li>

                    <div class="dropdown">

                    <li style="font-size:20px !important; margin-top:-10px !important" class=" moviment" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i  style="margin-left:-12px;"class='bx bx-file'></i>
                     RELATÓRIOS
                        </li>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../paginas/relat-check.php">CHECK-IN E CHECK-OUT</a></li>

                    </ul>
                    </div>

                    <li style="margin-bottom:30px;margin-top:1.2rem !important;">
                    <a class="moviment" href="../paginas/vagas.php">
                        <i style="position: relative; top:3px;left:-5px" class='bx bxs-direction-left bx-sm'></i>VAGAS</a>
                    </li>


                    <li style="margin-bottom:30px;">
                    <a class="moviment" href="../paginas/veiculos.php">
                        <i style="position: relative; top:3px;left:-5px" class='bx bxs-car bx-sm'></i>VEÍCULOS</a>
                    </li>

                    <li style="margin-bottom:30px;">
                        <a class="moviment" href="../paginas/clientes.php">
                        <i style="position: relative; top:3px;left:-5px" class='bx bx-user bx-sm'></i>CLIENTES</a>
                    </li>

                    <?php
                        if (@$_SESSION['userperm'] == 1) {
                        ?>
                            <li style="margin-bottom:30px;">
                                <a href="../paginas/gerenciamento.php" class="moviment">
                                    <i style="position: relative; top:3px;left:-5px;" class='bx bxs-cog bx-sm'></i>GERENCIAMENTO</a>
                            </li>
                            
                        <?php
                        }
                        ?>
                        </div>

                    </li>
                </ul>
            </form>
        </div>

        <?php
        include "../includes/todososdireitos.php"
        ?>