<html>
	<head>

	</head>
	<body>

		
			
			<form>
				<fieldset>
					<legend>Recetas</legend>
					<table>
						<tr>
							<th> Id </th>
							<th> Nombre </th>
							<th> Tipo </th>
						
						</tr>
						@foreach ($datos as $datos)
						<tr>
							<td>{{$datos['food_id']}}</td>
							<td>{{$datos['food_name']}}</td>
							<td>{{$datos['food_type']}}</td>

						</tr>
						@endforeach
					</table>
				</fieldset>
			</form>        
			@yield('content')
	</body>

</html>
