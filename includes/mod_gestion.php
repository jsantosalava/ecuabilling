<div class="card border-info mb-3">
  <div class="card-header">Gestión</div>
  <div class="card-body text-primary">
    	<form action="" id="guardarGestion" class="row">
    		<div class="col-4">
    			<div class="row">
    				
    			
    			<div class="col-md-12">
				   <label for="celularGestion" class="form-label">Celular</label>
				   <input type="text" class="form-control" id="celularGestion" value="<?php echo $numero;?>" required>
				</div>
				<div class="col-md-12">
				    <label for="campania" class="form-label">Campaña</label>
				    <select id="campania" class="form-select" required>
				      <option selected>Seleccionar</option>
				      
				    </select>
				  </div>
				  <div class="col-md-12">
				    <label for="contactabilidad" class="form-label">Contactabilidad</label>
				    <select id="contactabilidad" class="form-select" required>
				      <option selected>Seleccionar</option>
				      
				    </select>
				  </div>
				  <div class="col-md-12">
				    <label for="segCalltype" class="form-label">Seg Calltype</label>
				    <select id="segCalltype" class="form-select" required>
				      <option selected>Seleccionar</option>
				      
				    </select>
				  </div>
				  <div class="col-md-12">
				    <label for="callType" class="form-label">Calltype</label>
				    <select id="callType" class="form-select" required>
				      <option selected>Seleccionar</option>
				      
				    </select>
				  </div>
				  <div class="col-md-12">
				    <label for="motivo" class="form-label">Motivo de atraso</label>
				    <select id="motivo" class="form-select">
				      <option value="0" selected>Seleccionar</option>
				      
				    </select>
				 </div>
				 </div>
    		</div>
    		<div class="col-8">
    			<div class="row  mb-3">
    				<div class="col-md-4">
				   <label for="fechaGestion" class="form-label">Fecha</label>
				   <input type="date" class="form-control" id="fechaGestion">
				</div>
				<div class="col-md-4">
				    <label for="calificacionGestion" class="form-label">Calificacion</label>
				    <select id="calificacionGestion" class="form-select">
				      <option value="" selected>Seleccionar</option>
				      <option value="0">0</option>
				      <option value="1">1</option>
				      <option value="2">2</option>
				      <option value="3">3</option>
				      <option value="4">4</option>
				      <option value="5">5</option>
				      <option value="6">6</option>
				      <option value="7">7</option>
				      <option value="8">8</option>
				      <option value="9">9</option>
				      <option value="NO PASA BIENVENIDA">NO PASA BIENVENIDA</option>
				      <option value="NO DA CALIFICACION">NO DA CALIFICACION</option>
				      <option value="PASO REGESTION">PASO REGESTION</option>
				    </select>
				 </div>
				<div class="col-md-4">
				   <label for="valorPagar" class="form-label">Valor Pagar</label>
				   <input type="number" class="form-control" id="valorPagar" step=".01">
				</div>
    			</div>
    			<div class="row  mb-3">
    				
				<div class="col-md-4">
				    <label for="tipoCliente" class="form-label">Tipo de Cliente</label>
				    <select id="tipoCliente" class="form-select">
				      <option selected>Seleccionar</option>
				      <option value="ADJ">ADJ</option>
				      <option value="NADJ">NADJ</option>
				      <option value="INACTIVO">INACTIVO</option>
				      <option value="RES">RES</option>
				      <option value="CONG">CONG</option>
				    </select>
				 </div>
				<div class="col-md-4">
				    <label for="evento" class="form-label">Evento</label>
				    <select id="evento" class="form-select">
				      <option selected>Seleccionar</option>
				      <option value="SI">SI</option>
				      <option value="NO">NO</option>
				    </select>
				 </div>
				 <div class="col-md-4">
				    <label for="contratoGestion" class="form-label">CONTRATO</label>
				    <input type="text" class="form-control" id="contratoGestion">
				 </div>
    			</div>
    			<div class="row">
    				<div class="col-md-12 mb-3">
    					<div class="form-floating">
						  <textarea class="form-control" placeholder="Leave a comment here" id="comentario" style="height: 100px"></textarea>
						  <label for="comentario">Comentarios</label>
						</div>
    				</div>
    				<div class="col-md-3 ">
    				<button type="submit" class="btn btn-primary mb-3">Guardar</button>
    				</div>
    			</div>	
    			
    		</div>

    	</form>
  </div>
</div>