
<div class="card border-success mb-3">
  <div class="card-header">Contacto</div>
  <div class="card-body text-primary">
          <form id="agregarTelefono" class="row g-3 mb-3">
            <input type="hidden" id="idTelefono">
              <div class="col-3">
                <label for="numeroTelefono" class="">Número</label>
                <input type="text" class="form-control" id="numeroTelefono" placeholder="Ingresar">
              </div>
              <div class="col-3">
                <label for="contactoTelefono" class="">Contacto</label>
                <select name="" id="contactoTelefono" class="form-select">
                    <option value="" disabled="" selected="">Seleccionar</option>
                    <option value="TITULAR">TITULAR</option>
                    <option value="TERCERO">TERCERO</option>
                    <option value="EQUIVOCADO">EQUIVOCADO</option>
                    <option value="NO CONTACTADO">NO CONTACTADO</option>

                </select>
              </div>
              <div class="col-3">
                <label for="propietarioTelefono" class="">Propietario</label>
                <select name="" id="propietarioTelefono" class="form-select">
                    <option value="" disabled="" selected="">Seleccionar</option>
                    <option value="TITULAR">TITULAR</option>
                    <option value="FAMILIAR">FAMILIAR</option>
                    <option value="VECINOS">VECINOS</option>
                    <option value="PADRES">PADRES</option>
                    <option value="HIJOS">HIJOS</option>
                    
                </select>
              </div>
              <div class="col-3">
                <label for="nombreTelefono" class="">Nombre</label>
                <input type="text" class="form-control" id="nombreTelefono" placeholder="Ingresar">
              </div>
                <div class="col-3">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <button type="button" id="actualizarNumero" class="btn btn-primary">Actualizar</button>
                </div>
                 </div>
          </form>

          <div class="row">
            <div class="table-responsive">
              <table class="table" id="tablaTelefono">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Numero</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>  
  </div>
</div>