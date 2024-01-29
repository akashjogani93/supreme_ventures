<!DOCTYPE html>
<html>
  <head>
    <title>Dynamic Fill Trading View</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
   .container {
  margin-top: 50px;
  text-align: center;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 50px;
}

canvas {
  max-width: 100%;
}


  </style>
  <body>
  <div class="container">
  <h1>Colorful Line Graph</h1>
  <canvas id="chart"></canvas>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script src="script.js"></script> -->
    <script>
   $(document).ready(function () {
  // Get canvas element and set its width and height
  const canvas = document.getElementById("chart");
  canvas.width = 800;
  canvas.height = 400;

  // Create chart object and set its properties
  const chart = new Chart(canvas, {
    type: "line",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [
        {
          label: "Sales",
          data: [40, 50, 30, 70, 45, 65],
          borderColor: "rgba(255, 99, 132, 1)",
          borderWidth: 2,
          backgroundColor: "rgba(255, 99, 132, 0.5)",
          fill: false,
        },
        {
          label: "Revenue",
          data: [50, 60, 40, 80, 55, 75],
          borderColor: "rgba(54, 162, 235, 1)",
          borderWidth: 2,
          backgroundColor: "rgba(54, 162, 235, 0.5)",
          fill: false,
        },
        {
          label: "Profit",
          data: [20, 30, 10, 50, 25, 45],
          borderColor: "rgba(255, 206, 86, 1)",
          borderWidth: 2,
          backgroundColor: "rgba(255, 206, 86, 0.5)",
          fill: false,
        },
      ],
    },
    options: {
      legend: {
        display: true,
        position: "top",
        labels: {
          fontColor: "black",
          fontSize: 14,
        },
      },
      scales: {
        xAxes: [
          {
            ticks: {
              fontColor: "black",
              fontSize: 14,
            },
            gridLines: {
              color: "rgba(0, 0, 0, 0.1)",
              lineWidth: 1,
            },
          },
        ],
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              fontColor: "black",
              fontSize: 14,
            },
            gridLines: {
              color: "rgba(0, 0, 0, 0.1)",
              lineWidth: 1,
            },
          },
        ],
      },
    },
  });
});

    </script>
</body>
</html>
