<?php
     include '../func/cadastro.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de transportes</title>
        <!-- CSS padrão da página -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <!-- Bootstrap web -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
         <!--Icones Bootstrap-->
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    
</head>
<body>
    <div class="container mt-4">
        <form action="">

        <p class="display-4"> Cadastrar transportes</p>
        
            <!-- Onde o usuário cadastra as cidades. -->
            <div class="cadastroCidades">
                <p class="h4">Cadastro de cidades:</p>
                <hr>
                <div class="mb-3">
                    <label for="primeiraCidade" class="form-label">Primeira cidade</label>
                    <input type="text" name="cidades[]" class="form-control" id="cidade1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="segundaCidade" class="form-label">Segunda cidade</label>
                    <input type="text" name="cidades[]" class="form-control" id="cidade2" placeholder="">
                </div>
                
                <button class="btn btn-dark" onclick="adicionarCidades(event)" id="addCidades">   
                    <i class="bi bi-plus-circle-fill icon"> Adicionar cidades</i>
                </button>
                <div class="novasCidades">

                </div>
            </div>
            
            <hr>

            <!-- Onde o usuário cadastra os itens. -->
            <div class="cadastroItens">
                <p class="h4 mt-3">Cadastro de itens:</p>

                <button class="btn btn-dark" onclick="adicionarItens(event)" id="addItens">   
                    <i class="bi bi-plus-circle-fill icon"> Adicionar itens</i>
                </button>
                <div class="container text-center novosItens">
                    
                </div>
            </div>

            
                <input type="submit" name="submit" value="Enviar" class="btn btn-secondary mt-5">
            

        </form>
    </div>
    <!-- Link javascript -->
    <script src="../assets/js/script.js"></script>
</body>
</html>