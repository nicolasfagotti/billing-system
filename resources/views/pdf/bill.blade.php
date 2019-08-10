<!DOCTYPE html>
<html>
<head>
		<title>{!! $title !!}</title>
</head>
<body>
  	{{ Html::image('img/logo.png', 'Estudio Michaud', array( 'width' => '100px', 'height' => '100px' )) }}
    <div style="margin: 20px 0 60px 0; text-align: right;">{!! $date !!}</div>
    <p>Recibí de {!! $clientName !!} la cantidad de pesos {!! $amountText !!}.</p>
    <div style="margin-top: 80px; text-align: right;"><b>{!! $amount !!}</b></div>
</body>
</html>