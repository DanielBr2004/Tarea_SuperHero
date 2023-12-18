<!doctype html>
<html lang="en">
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

  <body>
  <div class="container">
        <div class="card mt-2">
        <div class="card-header bg-primary">
            <br>
            <span class="text-light"><h1><center>BUSCAR HEROES</center></h1></span>
            <br>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="card-body">
          <form action="" method="POST" id="formbusqueda" autocomplete="off">
            <div class="mb-3">
              <label for=""clas="form-label">Publicher:</label>
              <br>
              <br>
              <select select name="" id="publicher" class="form-control" required>
                <option value="">Selecicione ....</option>
              </select>
            </div>
          </form>

        </div>
            
  </div>

  <script>
    document.addEventListener("DOMContentLoaded",()=>{
      function $(id){
                  return document.querySelector(id)
      }
      (function(){
          fetch(`../controllers/publisher.controlller.php?operacion=listar`)
          .then(respuesta =>respuesta.json())
          .then(datos=>{
              console.log(datos)
              datos.forEach(element => {
              const tagoption=document.createElement("option")
              tagoption.value=element.id
              tagoption.innerHTML=element.publisher_name
              $("#publicher").appendChild(tagoption)
            });
          })
          .catch(e=>{
                console.error(e)
          })
        })();


    })
  </script>
  </body>
</html>
