<!DOCTYPE html>
<html>
<head>
		<title>{!! $title !!}</title>
</head>
<body>
  	{{ Html::image('img/logo.png', 'Estudio Michaud', array( 'width' => '100px', 'height' => '100px' )) }}
    <div style="margin: 0 0 60px 0; text-align: right;">{!! $date !!}</div>
    <p>Recibí de {!! $clientName !!} la cantidad de pesos {!! $amountText !!}.</p>
		<table style="width: 100%; margin-top: 80px; border: solid 1px black;">
        @foreach($concepts as $concept)
        <tr>
            <td style="width: 70%; border: solid 1px black;">{!! $concept->detail !!}</td>
            <td style="width: 30%; border: solid 1px black; text-align: right;">{!! $concept->getFormatedAmount() !!}</td>
        </tr>
        @endforeach
    </table>
    <div style="margin-top: 80px; text-align: right;">Total: <b>{!! $amount !!}</b></div>
</body>
</html>
