<?php
if (isset($_GET['submit'])) {
//função que carrega os dados do arquivo csv e armazena em distances
//além de criar array de cidades para manipulação
function carregaDistancias() {
    $distances = [];
    $linhas = array_map('str_getcsv', file('../assets/distancias.csv'));
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
function calculaDistancias($cidades, $distances) {
  $cidades = array_map('strtoupper', $cidades);
  $distanciaTotal = [];

  for ($i = 0; $i < count($cidades) - 1; $i++) {
      $cidadeAtual = $cidades[$i];
      $proximaCidade = $cidades[$i+1];

      if (isset($distances[$cidadeAtual][$proximaCidade])) {
          $distancia = $distances[$cidadeAtual][$proximaCidade];
          array_push($distanciaTotal, $distancia);

          echo "<div class='alert alert-success' role='alert'> " . $i+3 . " - De " . $cidadeAtual . " para " . $proximaCidade .
              ", a distância a ser percorrida é de " . $distancia . " km.</div>";
      } else {
          echo "<div class='alert alert-danger' role='alert'>Não foi possível calcular a distância entre " . $cidadeAtual .
              " e " . $proximaCidade . ".</div>";
      }
  }

  $distanciaTotal = array_sum($distanciaTotal); 
  echo "<div class='alert alert-success' role='alert'> 5 - A distância total percorrida é de " . $distanciaTotal . " km.</div>";
  return $distanciaTotal; 
}

// Dados dos caminhões
$caminhoes = [
  ["nome" => "Pequeno", "capacidade" => 1000, "custo_km" => 4.87],
  ["nome" => "Medio", "capacidade" => 4000, "custo_km" => 11.92],
  ["nome" => "Grande", "capacidade" => 10000, "custo_km" => 27.44],
];


// Cria um array com os itens informados pelo usuário
$nomes = $_GET['itensNome'];
$quantidades = $_GET['itensQuantidade'];
$pesos = $_GET['itensPeso'];
$arrItens = array();

for ($i = 0; $i < count($nomes); $i++) {
  $arrItens[] = array(
    'nome' => $nomes[$i],
    'quantidade' => $quantidades[$i],
    'peso' => $pesos[$i]
  );
}

// Calcula o peso total dos itens
$pesoTotal = 0;
for ($i = 0; $i < count($arrItens); $i++) {
  $pesoTotal += $arrItens[$i]['peso'] * $arrItens[$i]['quantidade'];
}
echo "<div class='alert alert-success' role='alert'>1 - O peso total dos itens é de " . $pesoTotal . " KILOS <br></div>" ;



// Array para armazenar os modelos de caminhão adequados
$modelosAdequados = array();

// Loop para selecionar os modelos de caminhão adequados
while ($pesoTotal > 0) {
  $modeloAdequado = null;
  foreach ($caminhoes as $caminhao) {
    if ($caminhao['capacidade'] >= $pesoTotal) {
      $modeloAdequado = $caminhao;
      break;
    }
  }
  if ($modeloAdequado != null) {
    $modelosAdequados[] = $modeloAdequado;
    $pesoTotal = 0; // Interrompe o loop, caso  o peso todo for transportado
  } else {
    // Caso não haja modelo adequado, adiciona o caminhão de maior capacidade
    $modeloAdequado = end($caminhoes);
    $modelosAdequados[] = $modeloAdequado;
    $pesoTotal -= $modeloAdequado['capacidade'];
  }
}
echo "<div class='alert alert-success' role='alert'>";
// Imprime os modelos de caminhão adequados
foreach ($modelosAdequados as $modelo) {
  echo  "2 - Será necessário usar os seguintes modelos de caminhão: " . $modelo['nome'] . ", Capacidade: " . $modelo['capacidade'] . ", Custo por km: " . $modelo['custo_km'] . "<br>" ;
}echo "</div>";


  //Imprime o preço total e as distancias
  $distances = carregaDistancias();
  $cidades = $_GET['cidades'];
  $distanciaPreco = calculaDistancias($cidades, $distances);
  $total = $modelo['custo_km'] * count($modelosAdequados) * $distanciaPreco;
  echo "<div class='alert alert-success' role='alert'>6 - O preço total será de: ". $total . "R$</div>";
  



  
}