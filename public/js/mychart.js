import Chart from "chart.js/auto";

const labels = [
    'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
];

const data = {
    labels: labels,
    datashets: [{
        label: 'Grafico Teste',
        backgroundColor: '#c1c1c1',
        borderColor: '#b0b0b0',
        data: [0, 10, 5, 2, 20, 30, 45]
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

new Chart(
    document.getElementById('myChart'),
    config
);
