<div class="row">
    <div class="form-group">
        <label for="nombre" class="col-md-4 control-label">Nombre</label>

        <div class="col-md-6">
            <input id="nombre" type="text" class="form-control" name="nombre" required autofocus value="{{$u->name}}">
        
        </div>
    </div>

    <div class="form-group">
        <label for="correo" class="col-md-4 control-label">Correo Electrónico</label>

        <div class="col-md-6">
            <input id="correo" type="email" class="form-control" name="email" required value="{{$u->email}}">
            
        </div>
    </div>
</div>