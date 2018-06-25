<div class="row">
<div class="col-md-8 col-md-offset-2">
    <form class="form-horizontal" id="fLoginRol" data-route="{{route('loginAjax')}}" data-method="POST">
                        
    {{ csrf_field() }}

    <input type="hidden" name="correo_electrónico" value="{{$u->email}}">
    <input type="hidden" name="contraseña" value="{{$password}}">
    
    <div class="form-group">
        <label for="nombre" class="col-md-4 control-label">Roles</label>

        <div class="col-md-6">
            <select class="form-control" name="rol">
                @foreach($roles as $row)
                    <option value="{{$row['id']}}">{{$row['rol']}}</option>
                @endforeach
            </select>
        
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="button" class="btn btn-primary btnAjax" data-form="fLoginRol">
                Confirmar
            </button>
        </div>
    </div>
    </form>
</div>
</div>