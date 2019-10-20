<!DOCTYPE html>
<html>
<head>
		<title>{!! $title !!}</title>
</head>
<body>
  	{{ Html::image('img/logo.png', 'Estudio Michaud', array( 'width' => '100px', 'height' => '100px' )) }}
    <div style="position: absolute; top: 20px; right: 0;">{!! $date !!}</div>
    <p>Recibí de {!! $clientName !!} la cantidad de pesos {!! $amountText !!}.</p>

		<table>
		<tr>
		<td style="width: 50%;">
			  <p style="padding: 5px 10px; background-color: #DDD; border-radius: 2px;">
						{!! __('bill.cash') !!}: {!! $bill->getFormatedAmount() !!}
				</p>
				<table style="width: 100%; border: solid 1px black;">
		        @foreach($checks as $check)
		        <tr>
		            <td style="width: 40%; border: solid 1px black;">{!! $check->number !!}</td>
								<td style="width: 30%; border: solid 1px black; text-align: right;">{!! $check->getBank()->name !!}</td>
		            <td style="width: 30%; border: solid 1px black; text-align: right;">{!! $check->getFormatedAmount() !!}</td>
		        </tr>
		        @endforeach
		    </table>
		</td>
		<td style="width: 50%;">
				<table style="width: 100%; border: solid 1px black;">
						@foreach($concepts as $concept)
						<tr>
								<td style="width: 70%; border: solid 1px black;">{!! $concept->detail !!}</td>
								<td style="width: 30%; border: solid 1px black; text-align: right;">{!! $concept->getFormatedAmount() !!}</td>
						</tr>
						@endforeach
				</table>
		</td>
		</tr>
		</table>

    <div style="margin-top: 80px; font-size: 1.5em; text-align: right;">
			  <p>Total: <b>{!! $bill->getFormatedAmount() !!}</b></p>
		</div>
</body>
</html>
