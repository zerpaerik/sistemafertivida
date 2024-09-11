<style>
	.row{
		width: 1024px;
		margin: 0 auto;
	}

	.col-12{
		width: 100%;
	}
	
	.col-6{
		width: 49%;
		float: left;
		padding: 8px 5px;
		font-size: 18px;
	}

	.text-center{
		text-align: center;
	}
	
	.text-right{
		text-align: right;
	}

	.title-header{
		font-size: 22px; 
		text-transform: uppercase; 
		padding: 12px 0;
	}
	table{
		width: 100%;
		text-align: center;
		margin: 10px 0;
	}
	
	tr th{
		font-size: 14px;
		text-transform: uppercase;
		padding: 8px 5px;
	}

	tr td{
		font-size: 14px;
		padding: 8px 5px;
	}
</style>

<div class="" style="font-size: 35px; text-align: center;margin-bottom: 15px;">
		<img src="/var/www/html/sistemafertivida/public/logo.png"  style="width: 20%;"/>
	</div>

<div>
	<div class="text-center title-header col-12">
		<center><strong>ORDEN DE ANALISIS</strong> </center>


	</div>
</div>
<div>
	<div class="col-6" >
		Fecha de Impresión: {{ Carbon\Carbon::now()->format('d/m/Y') }}
	</div>
	<div class="col-6 text-right">
		Hora de Impresión: {{ Carbon\Carbon::now('America/Lima')->format('h:i a') }}
	</div> 
</div>

<div style="font-weight: bold; font-size: 14px">
		FECHA CONSULTA:  {{date('d/m/Y', strtotime($orden->created_at))}}
</div>
<div style="font-weight: bold; font-size: 14px">
		PACIENTE:  {{ $paciente->apellidos }} {{ $paciente->nombres }}
</div>

<div style="font-weight: bold; font-size: 14px">
		EDAD:  {{ $edad }} 
</div>


<br>
<br>






<div style="font-weight: bold; font-size: 14px">
		INDICACIONES
</div>
@if($items)
<div style="margin-top:10px; background: #eaeaea;">
	<table style="">
		<tr>
			<th style="padding: 0;width: 5%;text-overflow: ellipsis;">Servicio</th>

		</tr>
		@foreach ($items as $s)
			<tr>
				<td style="padding: 0;width: 5%;text-overflow: ellipsis;">{{ $s->servicio }}</td>
			</tr>
		@endforeach
	
	</table>
</div>
@endif


