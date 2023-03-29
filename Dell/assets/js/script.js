var contadorCidades = 3;
var contadorItens = 1
function adicionarCidades(event) {
    event.preventDefault();

    var novaDiv = document.createElement("div");
    novaDiv.classList.add("row");

    var novaLabel = document.createElement("label");
    novaLabel.classList.add("form-label");
    novaLabel.textContent = "Cidade " + contadorCidades;
    novaDiv.appendChild(novaLabel);

    var novoInput = document.createElement("input");
    novoInput.classList.add("form-control");
    novoInput.setAttribute("type", "text");
    novoInput.setAttribute("id", "cidade" + contadorCidades);
    novoInput.setAttribute("name", "cidades[]");
    novaDiv.appendChild(novoInput);

    var novoIcone = document.createElement("i");
    novoIcone.classList.add("bi", "bi-x-circle", "icon");
    novoIcone.addEventListener("click", function() {
        novaDiv.remove();
    });

    var novoSpan = document.createElement("span");
    novoSpan.classList.add("input-group-text");
    novoSpan.appendChild(novoInput);
    novoSpan.appendChild(novoIcone);
    novaDiv.appendChild(novoSpan);
    novaDiv.setAttribute("id", "cidade" + contadorCidades + "Div");
    
    var divNovasCidades = document.getElementsByClassName("novasCidades");
    divNovasCidades[0].appendChild(novaDiv);
    contadorCidades++;
}

function adicionarItens(event) {
    event.preventDefault(); 
    console.log("sexona13")

    var divPai =  document.createElement("div");
    divPai.classList.add("row");
    divPai.classList.add("row", "justify-content-start", "border", "border-danger", "my-2", "p-3", "d-flex", "align-items-center");

    var divNome = document.createElement("div");
    divNome.classList.add("col-3");

    var divQuantidade = document.createElement("div");
    divQuantidade.classList.add("col-3");
    divQuantidade.classList.add("mx-auto");

    var divPeso = document.createElement("div");
    divPeso.classList.add("col-3");

    var divIcons = document.createElement("div");
    divIcons.classList.add("col-3");


    //Cria toda a div dos nomes dos itens
    var novaLabel = document.createElement("label");
    novaLabel.classList.add("col-form-label");
    novaLabel.textContent = "Nome do item " + contadorItens;
    divNome.appendChild(novaLabel);

    var novoInputDiv = document.createElement("div");
    novoInputDiv.classList.add("mx-auto");

    var novoInput = document.createElement("input");
    novoInput.classList.add("form-control");
    novoInput.setAttribute("type", "text");
    novoInput.setAttribute("name", "itensNome[]");
    novoInput.setAttribute("id", "item" + contadorItens);
    novoInputDiv.appendChild(novoInput);

    divNome.appendChild(novoInputDiv);

    //Cria toda a div das quantidades dos itens
    var novaLabelQuantidade = document.createElement("label");
    novaLabelQuantidade.classList.add("col-form-label");
    novaLabelQuantidade.textContent = "Quantidade " + contadorItens;
    divQuantidade.appendChild(novaLabelQuantidade);

    var novoQuantidadeDiv = document.createElement("div");
    novoQuantidadeDiv.classList.add("mx-auto");

    var novoInputQuantidade = document.createElement("input");
    novoInputQuantidade.classList.add("form-control");
    novoInputQuantidade.setAttribute("type", "number");
    novoInputQuantidade.setAttribute("name", "itensQuantidade[]");
    novoInputQuantidade.setAttribute("id", "quantidade" + contadorItens);
    novoQuantidadeDiv.appendChild(novoInputQuantidade);

    divQuantidade.appendChild(novoQuantidadeDiv);

    //Cria toda a div dos pesos dos itens
    var novaLabelPeso = document.createElement("label");
    novaLabelPeso.classList.add("mx-auto", "col-form-label");
    novaLabelPeso.textContent = "Peso do item " + contadorItens;
    divPeso.appendChild(novaLabelPeso);

    var novoPesoDiv = document.createElement("div");
    novoPesoDiv.classList.add("mx-auto");

    var novoInputPeso = document.createElement("input");
    novoInputPeso.classList.add("form-control");
    novoInputPeso.setAttribute("type", "number");
    novoInputPeso.setAttribute("name", "itensPeso[]");
    novoInputPeso.setAttribute("id", "Peso" + contadorItens);
    novoPesoDiv.appendChild(novoInputPeso);

    divPeso.appendChild(novoPesoDiv);

    var novoIcone = document.createElement("i");
    novoIcone.classList.add("bi", "bi-x-circle", "icon", "ms-auto", "me-3"); 
    novoIcone.addEventListener("click", function() {
        divPai.remove();
    });

    divIcons.appendChild(novoIcone);

    divNome.setAttribute("id", "nomeItem" + contadorItens);
    divQuantidade.setAttribute("id", "quantidadeItem" + contadorItens);
    
    divPai.appendChild(divNome);
    divPai.appendChild(divQuantidade);
    divPai.appendChild(divPeso);
    divPai.appendChild(divIcons);
 

    var divContainer = document.querySelector(".novosItens");
    divContainer.appendChild(divPai);
    contadorItens ++
}
