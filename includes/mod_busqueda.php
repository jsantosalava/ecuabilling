<div class="card border-primary mb-3">
  <div class="card-header">Busqueda</div>
  <div class="card-body text-primary">
    
            <form class="row" id='infoCliente'>
        
        <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Ingresar Cedula" aria-label="Recipient's username" aria-describedby="button-addon2" id="cedulaCliente" value="<?php echo $cedula;?>">
  <button class="btn btn-outline-danger" type="submit" id="button-addon2">Buscar</button>
</div>
      </form>
    
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Datos
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="">
          <div class="mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="nombreCliente" placeholder="Password">
              <label for="nombreCliente">Cliente</label>
            </div>
          </div>
          <div class="mb-3">
            
            <div class="form-floating">
              <input type="text" class="form-control" id="cedCliente" placeholder="Password">
              <label for="cedCliente">Cedula</label>
            </div>
          </div>
          <div class="mb-3">
            
            <div class="form-floating">
              <input type="text" class="form-control" id="contratoCliente" placeholder="Password">
              <label for="contratoCliente">Contrato</label>
            </div>
          </div>
          <div class="mb-3">
            
            <div class="form-floating">
              <input type="text" class="form-control" id="sucursalCliente" placeholder="Password">
              <label for="sucursalCliente">Sucursal</label>
            </div>
          </div>
          <div class="mb-3">
            
            <div class="form-floating">
              <input data-column="correo_info" type="text" class="form-control update1" id="correoCliente" placeholder="Password">
              <label for="correoCliente">Correo</label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Información
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <form action="">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="directorCliente" placeholder="name@example.com">
            <label for="directorCliente">Director</label>
          </div>
            <div class="form-floating mb-3">
            <input type="email" class="form-control" id="gerenteCliente" placeholder="name@example.com">
            <label for="gerenteCliente">Gerente</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="supervisorCliente" placeholder="name@example.com">
            <label for="supervisorCliente">Supervisor</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="asesorCliente" placeholder="name@example.com">
            <label for="asesorCliente">Asesor</label>
          </div>
          <div class="form-floating mb-3">
            <input  data-column="rango_info" type="email" class="update1 form-control" id="rangoCliente" placeholder="name@example.com">
            <label for="rangoCliente">Rango</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="fechaCliente" placeholder="name@example.com">
            <label for="fechaCliente">Fecha Suscripcion</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="mesCliente" placeholder="name@example.com">
            <label for="mesCliente">Mes</label>
          </div>
          <!-- <div class="mb-3">
           
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Director">
          </div>
          <div class="mb-3">
            
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Gerente">
          </div>
          <div class="mb-3">
            
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Supervisor">
          </div>
          <div class="mb-3">
            
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Asesor">
          </div>
          <div class="mb-3">
            
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Rango">
          </div>
          <div class="mb-3">
            
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Fecha Suscripcion">
          </div> -->
        </form>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Speech
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
              <p>
              <div id="botonBienvenida"></div>
              <div id="botonCobranza"></div>
            </p>
            <div class="collapse" id="collapseExample1">
              <div class="card card-body">
                <div id="speechBienvenida"></div>
              </div>
            </div>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <div id="speechCobranza"></div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>