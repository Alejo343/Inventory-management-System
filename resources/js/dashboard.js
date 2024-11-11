let optionsVisitorsProfile = {
    series: [70, 30, 50],
    labels: ["Mayorista", "Minorista", "Coorporativo"],
    colors: ["#435ebe", "#55c6e8", "#a855f7"],
    chart: {
        type: "donut",
        width: "100%",
        height: "350px",
    },
    legend: {
        position: "bottom",
    },
    plotOptions: {
        pie: {
            donut: {
                size: "30%",
            },
        },
    },
};

var chartVisitorsProfile = new ApexCharts(
    document.getElementById("chart-visitors-profile"),
    optionsVisitorsProfile
);

chartVisitorsProfile.render();

// Datos de ejemplo (puedes reemplazarlos por los datos de tu sistema)
const productos = [
    { nombre: "Producto A", cantidadVendida: 150 },
    { nombre: "Producto B", cantidadVendida: 100 },
    { nombre: "Producto C", cantidadVendida: 80 },
    { nombre: "Producto D", cantidadVendida: 60 },
    { nombre: "Producto E", cantidadVendida: 50 },
];

// Extraer nombres y cantidades para la gráfica
const nombresProductos = productos.map((producto) => producto.nombre);
const cantidadesVendidas = productos.map(
    (producto) => producto.cantidadVendida
);

// Configuración de la gráfica
const options = {
    chart: {
        type: "bar",
    },
    series: [
        {
            name: "Cantidad Vendida",
            data: cantidadesVendidas,
        },
    ],
    xaxis: {
        categories: nombresProductos,
    },
};

// Crear la gráfica
const chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
