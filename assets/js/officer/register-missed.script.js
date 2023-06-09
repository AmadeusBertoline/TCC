
// seleciona o botão "Adicionar Característica"
var btnAddCaracteristica = document.getElementById("btnAddCaracteristica");
// adiciona um evento "click" ao botão
btnAddCaracteristica.addEventListener("click", function() {
    // seleciona o elemento "camposCaracteristica"
    var camposCaracteristica = document.getElementById("camposCaracteristica");

    // cria um novo elemento "div" com a classe "row"
    var novaCaracteristica = document.createElement("div");
    novaCaracteristica.classList.add("row");
    novaCaracteristica.innerHTML = `
      <div class="row middle-line">
        <div class="col">
          <label>Característica:</label>
          <select id="caracteristica" name="caracteristica[]" class="form-control" style="width:130px; height:30px !important;">
            <option selected>Escolher...</option>
            ${listFeature.map(feature => `
              <option value="${feature.idFeature}">
                ${feature.typeFeature}
              </option>
            `).join('')}
          </select>
          <script>
            $(document).ready(function() {
              $('#caracteristica').select2();
            });
          </script>
        </div>
        <div class="col">
          <label>Descrição:</label>
          <input type="text" name="descricao[]" style="height:26px !important; border-radius: 4px; border: 1px solid rgb(150, 150, 150);">
        </div>  
      </div>
    `;
    
    // adiciona o novo elemento ao final do elemento "camposCaracteristica"
    camposCaracteristica.appendChild(novaCaracteristica);
// ativa o plugin Select2 para o novo elemento "select"
$('#caracteristica', novaCaracteristica).select2();
});
// seleciona o botão "Remover Característica"
var btnRemoverCaracteristica = document.getElementById("btnRemoverCaracteristica");
// adiciona um evento "click" ao botão
btnRemoverCaracteristica.addEventListener("click", function() {
    // seleciona o último elemento filho do elemento "camposCaracteristica"
    var ultimaCaracteristica = document.getElementById("camposCaracteristica").lastElementChild;

    // verifica se há pelo menos uma característica adicionada antes de remover
    if (ultimaCaracteristica) {
        // remove o último elemento filho do elemento "camposCaracteristica"
        document.getElementById("camposCaracteristica").removeChild(ultimaCaracteristica);
    }
});




var btnAddMotivo = document.getElementById("btnAddMotivo");
btnAddMotivo.addEventListener("click", function() {
    var camposMotivo = document.getElementById("camposMotivo");
    var novaMotivo = document.createElement("div");
    novaMotivo.classList.add("row");
    novaMotivo.innerHTML = '<div class="row middle-line">'+
                                        '<div class="col">' +
                                            '<label>Assunto:</label>' +
                                            '<input type="text" name="tipoMotivo[]">' +
                                        '</div>' +
                                        '<div class="col">' +
                                            '<label>Descrição:</label>' +
                                            '<input type="text" name="motivo[]">' +
                                        '</div>'+
                                    '</div>';
    camposMotivo.appendChild(novaMotivo);
});
var btnRemoverMotivo = document.getElementById("btnRemoverMotivo");
btnRemoverMotivo.addEventListener("click", function() {
    var ultimaMotivo = document.getElementById("camposMotivo").lastElementChild;
    if (ultimaMotivo) {
        document.getElementById("camposMotivo").removeChild(ultimaMotivo);
    }
});



const statesAndCities = [{
    AC: ['Rio Branco', 'Cruzeiro do Sul', 'Sena Madureira', 'Tarauacá', 'Feijó', 'Brasiléia', 'Plácido de Castro', 'Xapuri', 'Marechal Thaumaturgo', 'Porto Walter'],
    AL: ['Maceió', 'Arapiraca', 'Rio Largo', 'Palmeira dos Índios', 'Marechal Deodoro', 'Santana do Ipanema', 'Coruripe', 'Penedo', 'Delmiro Gouveia', 'Campo Alegre'],
    AP: ['Macapá', 'Santana', 'Laranjal do Jari', 'Oiapoque', 'Porto Grande', 'Mazagão', 'Tartarugalzinho', 'Pedra Branca do Amapari', 'Amapá', 'Serra do Navio'],
    AM: ['Manaus', 'Parintins', 'Itacoatiara', 'Manacapuru', 'Coari', 'Tefé', 'Tabatinga', 'São Gabriel da Cachoeira', 'Maués', 'Humaitá'],
    BA: ['Salvador', 'Feira de Santana', 'Vitória da Conquista', 'Camaçari', 'Juazeiro', 'Itabuna', 'Lauro de Freitas', 'Ilhéus', 'Jequié', 'Alagoinhas'],
    CE: ['Fortaleza', 'Caucaia', 'Juazeiro do Norte', 'Maracanaú', 'Sobral', 'Crato', 'Itapipoca', 'Maranguape', 'Iguatu', 'Quixadá'],
    DF: ['Brasília', 'Ceilândia', 'Taguatinga', 'Samambaia', 'Paranoá', 'Planaltina', 'Gama', 'Santa Maria', 'São Sebastião', 'Recanto das Emas'],
    ES: ['Vitória', 'Serra', 'Vila Velha', 'Cariacica', 'Cachoeiro de Itapemirim', 'Linhares', 'São Mateus', 'Guarapari', 'Colatina', 'Aracruz'],
    GO: ['Goiânia', 'Aparecida de Goiânia', 'Anápolis', 'Rio Verde', 'Águas Lindas de Goiás', 'Luziânia', 'Valparaíso de Goiás', 'Trindade', 'Formosa', 'Novo Gama'],
    MA: ['São Luís', 'Imperatriz', 'Timon', 'Caxias', 'Codó', 'Paço do Lumiar', 'Açailândia', 'Bacabal', 'Balsas', 'Barra do Corda'],
    MT: ['Cuiabá', 'Várzea Grande', 'Rondonópolis', 'Sinop', 'Tangará da Serra', 'Cáceres', 'Sorriso', 'Barra do Garças', 'Primavera do Leste', 'Alta Floresta'],
    MS: ['Campo Grande', 'Dourados', 'Três Lagoas', 'Corumbá', 'Ponta Porã', 'Naviraí', 'Aquidauana', 'Nova Andradina', 'Sidrolândia', 'Paranaíba'],
    MG: ['Belo Horizonte', 'Uberlândia', 'Contagem', 'Juiz de Fora', 'Betim', 'Montes Claros', 'Ribeirão das Neves', 'Uberaba', 'Governador Valadares', 'Ipatinga'],
    PA: ['Belém', 'Ananindeua', 'Santarém', 'Marabá', 'Parauapebas', 'Castanhal', 'Abaiara', 'Cametá', 'Paragominas', 'Tucuruí'],
    PB: ['João Pessoa', 'Campina Grande', 'Santa Rita', 'Patos', 'Bayeux', 'Sousa', 'Cajazeiras', 'Cabedelo', 'Guarabira', 'Mamanguape'],
    PR: ['Curitiba', 'Londrina', 'Maringá', 'Ponta Grossa', 'Cascavel', 'São José dos Pinhais', 'Foz do Iguaçu', 'Colombo', 'Guarapuava', 'Paranaguá'],
    PE: ['Recife', 'Jaboatão dos Guararapes', 'Olinda', 'Caruaru', 'Petrolina', 'Paulista', 'Cabo de Santo Agostinho', 'Camaragibe', 'Garanhuns', 'Vitória de Santo Antão'],
    PI: ['Teresina', 'Parnaíba', 'Picos', 'Piripiri', 'Floriano', 'Barras', 'Campo Maior', 'José de Freitas', 'Pedro II', 'Miguel Alves'],
    RJ: ['Rio de Janeiro', 'São Gonçalo', 'Duque de Caxias', 'Nova Iguaçu', 'Niterói', 'Belford Roxo', 'Campos dos Goytacazes', 'São João de Meriti', 'Petrópolis', 'Volta Redonda'],
    RN: ['Natal', 'Mossoró', 'Parnamirim', 'São Gonçalo do Amarante', 'Ceará-Mirim', 'Macau', 'Caicó', 'Açu', 'Currais Novos', 'Santa Cruz'],
    RS: ['Porto Alegre', 'Caxias do Sul', 'Canoas', 'Pelotas', 'Santa Maria', 'Gravataí', 'Viamão', 'Novo Hamburgo', 'São Leopoldo', 'Rio Grande'],
    RO: ['Porto Velho', 'Ji-Paraná', 'Ariquemes', 'Vilhena', 'Cacoal', 'Jaru', 'Guajará-Mirim', 'Rolim de Moura', 'Pimenta Bueno', 'Ouro Preto do Oeste'],
    RR: ['Boa Vista', 'Rorainópolis', 'Alto Alegre', 'Caracaraí', 'Mucajaí', 'São Luiz', 'Pacaraima', 'Bonfim', 'São João da Baliza', 'Iracema'],
    SC: ['Florianópolis', 'Joinville', 'Blumenau', 'São José', 'Chapecó', 'Criciúma', 'Itajaí', 'Jaraguá do Sul', 'Palhoça', 'Lages'],
    SE: ['Aracaju', 'Nossa Senhora do Socorro', 'Lagarto', 'Itabaiana', 'São Cristóvão', 'Estância', 'Tobias Barreto', 'Simão Dias', 'Propriá', 'Capela'],
    SP: ['São Paulo', 'Guarulhos', 'Campinas', 'São Bernardo do Campo', 'Osasco', 'Santo André', 'São José dos Campos', 'Ribeirão Preto', 'Sorocaba', 'Santos'],
    TO: ['Palmas', 'Araguaína', 'Gurupi', 'Porto Nacional', 'Paraíso do Tocantins', 'Guaraí', 'Colinas do Tocantins', 'Formoso do Araguaia', 'Miracema do Tocantins', 'Tocantinópolis'],
}]

const states = document.querySelector('#states')
const cities = document.querySelector('#cities')
const wrapperCities = document.querySelector('#wrapper-cities')

const removeChild = (el) => {
	while (el.firstChild) {
  		el.removeChild(el.firstChild);
	}
}

const hideElement = el => el.style.display = 'none'

const showElement = el => el.style.display = ''


states.addEventListener('change', e => {
	removeChild(cities)
	if(e.target.value === states.value){
		statesAndCities.map( data => {			
			data[e.target.value].map( city => {
				const option = document.createElement("option")
				const value = option.text = city;
				cities.add(option);
			})
		})
	}
	
})