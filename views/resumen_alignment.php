<!doctype html>
<html lang="es">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body style="background-color: rgb(236, 236, 236);">
  <div class="container" style="background-color: rgb(236, 236, 236);">
  <div class="card mt-2" style="background-color: rgb(236, 236, 236);">
  <div class="card-header bg-primary">
      <br>
      <span class="text-light"><h1><center>RESUMEN DE ALIGNMENTS</center></h1></span>
      <br>
    </div>
    <div class="card-body" style="width: 70%; margin: auto;">
      <div class="row">
        <br>
        <hr>
        <h4>Grafico Estadistico</h4>
        <hr>
        <br>
        <div class="col mb-12" style="background-color: white;">
            <canvas id="lienzo"></canvas>
        </div>
        <div>
          <br>
          <hr>
          <h4>Conteo</h4>
          <hr>
          <br>

          <div class="col mb-12">
            <?php include '../controllers/tabla_alignment.php'; ?>
        </div>
        </div>
      </div>
    </div>
  </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const contexto = document.querySelector("#lienzo")
  const grafico = new Chart(contexto, {
    type: 'bar',
    data: {
      labels:[],
      datasets: [{
        label:"alignments",
        data: []
      }]
    }
  });

  (function (){
    fetch(`../controllers/alignments.php?operacion=getresumenAlignment`)
    .then(Respuesta => Respuesta.json())
    .then(datos => {
      grafico.data.labels = datos.map(registro => registro.alignment_id)
      grafico.data.datasets[0].data = datos.map(registro => registro.total)
      grafico.update()
    })
    .catch(e =>{
      console.error(e)
    })
  })();


</script>
  </body>
</html>
