@extends('layouts.master2')

@section('titulo')
	Vista Inicio
@endsection

@section('contenido')

	{{-- dd(get_defined_vars()) --}}
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
			</tr>
		</thead>
		<tbody>
			@foreach($personas as $row)
			<tr>
				<td>{{ $row['id'] }}</td>
				<td>{{ $row['nombre'] }}</td>
				<td>{{ $row['apellido'] }}</td>
			</tr>
			<tr>
				@if ($loop->last)
					Ultimo registro
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>

	@for ($i=0 ; $i < 10 ; $i++)
		Numero {{$i}}
	@endfor

	<select>
		<option value="" disabled selected>Seleccione una opción</option>
		@foreach($tipo_documento as $row)
			<option value="{{$row['id']}}">{{$row['sigla']}}</option>
		@endforeach
	</select>
@endsection