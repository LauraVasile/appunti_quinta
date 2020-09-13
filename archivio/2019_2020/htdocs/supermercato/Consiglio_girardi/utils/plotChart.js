const storico = window.sitescriptdata.storico
const ctx = document.getElementById("chart").getContext("2d")

let presenze = []
let timestamps = []

storico.forEach((evento) => {
  let delta = evento.azione == "+" ? 1 : -1
  let lastValue = presenze.slice(-1)[0] || 0
  presenze.push(lastValue + delta)
  timestamps.push(evento.timestamp)
})

// console.log(presenze) // + - - + - + etc
// console.log(timestamps) // 13:44 13:52 14:01 etc

Chart.defaults.global.defaultFontFamily = "Lato"
Chart.defaults.global.defaultFontSize = 13
Chart.defaults.global.defaultFontColor = "#777"

const drawnChart = new Chart(ctx, {
  type: "line", // bar, horizontal bar, pie, line, donut etc
  data: {
    labels: timestamps,
    datasets: [
      {
        label: "Presenti",
        data: presenze,
        backgroundColor: "#657b83",
        pointRadius: 0,
      },
    ],
  },
  options: {
    tooltips: {
      mode: "index",
      intersect: false,
    },
    hover: {
      mode: "nearest",
      intersect: true,
    },
    borderJoinStyle: "round",
    lineTension: 1.85,
  },
})
