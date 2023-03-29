<?php
if (isset($_GET['submit'])) {

//Pega as cidades informadas    
$cidades = $_GET['cidades'];

// Define a distância entre as cidades
$distances = carregaDistancias();

// Cria um array com os modelos de caminhões, suas capacidades máximas de carga e custo por km
$caminhoes = [
    ["nome" => "pequeno", "capacidade" => 1000, "custo_km" => 4.87],
    ["nome" => "medio", "capacidade" => 4000, "custo_km" => 11.92],
    ["nome" => "grande", "capacidade" => 10000, "custo_km" => 27.44],
];

//Atribui a radio button escolhido o devido modelo do caminhão
    if(isset($_GET['radioCaminhoes'])){
        $caminhaoRadio = $_GET['radioCaminhoes'];
         if($caminhaoRadio == 0){
             $caminhao = $caminhoes[0];
        }if($caminhaoRadio == 1){
             $caminhao = $caminhoes[1];
        }if($caminhaoRadio == 2){
            $caminhao = $caminhoes[2];
        }
        // Calcula a distancia total e o preço caso o usuário tenha informado o tipo de caminhão
            $distancia = calculaDistancias($cidades, $distances, $caminhao);
            $valorTotal = $distancia * $caminhao['custo_km'];

            echo "<div class='alert alert-success' role='alert'>O custo total do transporte será de R$" . $valorTotal . "</div>";
    }else{
        //Caso não tenha informado o tipo, ele mostra esse alert
        echo "<div class='alert alert-danger' role='alert'>Por favor, escolher o tipo de caminhão</div>";
    }

}
//Função que carrega o arquivo csv e cria arrays para manipulação
function carregaDistancias() {
    $distances = [];
    $linhas = array_map('str_getcsv', file('assets/distancias.csv'));
    $arrCidades = array_shift($linhas);
    $arrCidades = explode(';', $arrCidades[0]);
  
    for ($i=0; $i < count($arrCidades); $i++) {
        $linha = explode(';', $linhas[$i][0]);
        $distance = array_combine($arrCidades, $linha);
        $distances[$arrCidades[$i]] = $distance; 
    }
  
    return $distances;
  }

//função que calcula a distancia das cidades
function calculaDistancias($cidades, $distances, $caminhao) {
  $cidades = array_map('strtoupper', $cidades);
  $distanciaTotal = [];

  for ($i = 0; $i < count($cidades) - 1; $i++) {
      $cidadeAtual = $cidades[$i];
      $proximaCidade = $cidades[$i+1];

      if (isset($distances[$cidadeAtual][$proximaCidade])) {
          $distancia = $distances[$cidadeAtual][$proximaCidade];
          array_push($distanciaTotal, $distancia);
          $valorTotal = $caminhao['custo_km'] * array_sum($distanciaTotal);
          echo "<div class='alert alert-success' role='alert'>De " . $cidadeAtual . " para " . $proximaCidade . ", utilizando um caminhão de porte " . $caminhao['nome'] .
                 ", a distância é de " . $distancia . "km e o custo será de R$" . $valorTotal . "</div>";
      } else {
          echo "<div class='alert alert-danger' role='alert'>Não foi possível calcular a distância, verifique se informou os dados corretamente</div>";
      }
  }

  $distanciaTotal = array_sum($distanciaTotal); 
  echo "<div class='alert alert-success' role='alert'> A distância total percorrida é de " . $distanciaTotal . " km.</div>";
  return $distanciaTotal; 
}

?>

