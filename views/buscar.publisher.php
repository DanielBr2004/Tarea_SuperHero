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
        <div class="mb-3">

        </div>
        <br>
        <hr>
        <br>
        <div class="card-body">
          <form action="">
            <div class="mb-3">
              <label for=""clas="form-label">Publicher:</label>
              <br>
              <br>
              <select select name="" id="publicher" class="form-control" required>
                <option value="">Selecicione ....</option>
              </select>
            </div>
            <div class="mb-3">
            <table border='1' class='table table-hover'>
              <thead>
                <tr>
                <th>ID_Hero</th>
                <th>Nombre_Heroe</th>
                <th>Nombre_Persona</th>
                <th>Genero</th>
                <th>Raza</th>
                </tr>
              </thead>
              <tbody id="tbody">

              </tbody>
            </table>
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
        
        const tbody = $("tbody");
        $("#publicher").addEventListener("change", (event) => {
                Seleccion = event.target.value;
                if (Seleccion != "") {
                    const parameters = new FormData();
                    parameters.append("operacion", "BuscarPublicher");
                    parameters.append("publisher_id", Seleccion)
            fetch("../controllers/publisher.controlller.php", {
              method: "POST",
              body: parameters
            })
            .then(respuesta => respuesta.json())
            .then(datos =>{

              datos.forEach(element => {

                const tr = document.createElement("tr");

              const ID_Hero = document.createElement("td");
              ID_Hero.textContent = element.id;
              tr.appendChild(ID_Hero)

              const Nombre_Heroe = document.createElement("td");
              Nombre_Heroe.textContent = element.superhero_name;
              tr.appendChild(Nombre_Heroe)

              const Nombre_Persona = document.createElement("td");
              Nombre_Persona.textContent = element.full_name;
              tr.appendChild(Nombre_Persona)
              
              const Genero = document.createElement("td");
              Genero.textContent = element.gender;
              tr.appendChild(Genero)

              const Raza = document.createElement("tr");
              Raza.textContent = element.race;
              tr.appendChild(Raza)

              tbody.appendChild(tr);
              })



            })
            
            
          
          }
        })
      

    })
  </script>
  </body>
</html>
