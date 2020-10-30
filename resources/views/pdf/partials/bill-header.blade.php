{{ Html::image('img/logo.png', 'Estudio Michaud', array( 'width' => '100px', 'height' => '100px' )) }}

<div style="position: absolute; top: 0; right: 0; text-align: right;">
    <div>Nº {!! $bill->id !!}</div>
    <br />
    <div>{!! $date !!}</div>
</div>

<p style="padding-left: 4px; padding-bottom: 5px; line-height: 20pt;">
    Recibí de {!! $clientName !!} la cantidad de pesos {!! $amountText !!}.
</p>
