<h6 class="heading-small text-muted mb-4">Datos del Ejemplo</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="name">Numero de Mesa</label>
                <input type="number" id="table_number" name="table_number" class="form-control form-control-alternative"
                    placeholder="Asignado Automáticamente" value="A1" disabled>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label" for="type_id"><i class="fas fa-graduation-cap"></i> Tipo de
                    Mesa</label>

                <select name="type_id" id="type_id" class="form-control form-control-alternative">
                    <option disabled>Seleccionar un Tipo</option>
                    <option value="pareja">Pareja</option>
                    <option value="amigos">Amigos</option>
                    <option value="solitario">Solitario</option>
                </select>
            </div>
        </div>
    </div>
</div>
<hr class="my-4" />
<!-- Extra -->
<h6 class="heading-small text-muted mb-4">Información Adicional</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <label class="form-control-label" for="status_id"><i class="fas fa-graduation-cap"></i>
            Estado</label>

        <select name="status" id="status" class="form-control form-control-alternative">
            <option value="disponible" selected> Disponible</option>
            <option value="reservador"> Reservador</option>
            <option value="inactivo"> Inactivo</option>
        </select>
    </div>
</div>

<hr class="my-4" />
<!-- Description -->
<h6 class="heading-small text-muted mb-4">Guardar</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar
        </button>
    </div>
</div>
