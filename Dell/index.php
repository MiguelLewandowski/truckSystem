<?php
    include 'func/consulta.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta trechos X modalidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form  class="mt-4" action="">
            <p class="display-4"> Consultar trechos x modalidades</p>
            <div class="mb-3">
                <label for="primeiraCidade" class="form-label">Primeira cidade</label>
                <input type="text" name="cidades[]" class="form-control" id="primeiraCidade" placeholder="">
            </div>
            <div class="mb-3">
                <label for="segundaCidade" class="form-label">Segunda cidade</label>
                <input type="text" name="cidades[]" class="form-control" id="segundaCidade" placeholder="">
            </div>
            <div class="mb-3">
                <label class="form-label">Informe o meio de transporte dentre as opções a seguir:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioCaminhoes" id="pequenoPorte" value="0">
                    <label class="form-check-label" for="pequenoPorte">
                        Caminhão de pequeno porte | R$ 4,87/km
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioCaminhoes" id="medioPorte" value="1">
                    <label class="form-check-label" for="medioPorte">
                        Caminhão de médio porte | R$ 11,92/km
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="radioCaminhoes" id="grandePorte" value="2">
                    <label class="form-check-label" for="grandePorte">
                        Caminhão de grande porte | R$ 27,44/km
                    </label>
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-success" value="Enviar">
        </form>

        <hr>
        <p class="display-6">Deseja cadastrar o seu transporte?</p>

        <a href="paginas/cadastroTransportes.php">
            <button class="btn btn-danger">Cadastrar Transporte</button>
        </a>
    </div>
    
    <script src="script.js"></script>
</body>

</html>