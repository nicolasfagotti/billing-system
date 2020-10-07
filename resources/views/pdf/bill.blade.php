<!DOCTYPE html>
<html>
<head>
		<title>{!! $title !!}</title>
		<style>
				th, td {
						padding: 4px;
						vertical-align: top;
				}
  			table.content th, table.content td {
						border: solid 1px black;
				}
				table.content th {
					  background-color: #ddd;
				}
				table {
					  width: 100%;
    				border-spacing: 0;
    				border-collapse: collapse;
				}
		</style>
</head>
<body>
		<!-- HEADER -->
  	{{ Html::image('img/logo.png', 'Estudio Michaud', array( 'width' => '100px', 'height' => '100px' )) }}

		<div style="position: absolute; top: 0; right: 0; text-align: right;">
			  <div>Nº {!! $bill->id !!}</div>
				<br />
				<div>{!! $date !!}</div>
		</div>

    <p style="padding-left: 50px; padding-bottom: 20px;">
				Recibí de {!! $clientName !!} la cantidad de pesos {!! $amountText !!}.
		</p>

		<!-- BODY -->
		<table>
				<tr>
						<td>
								<div style="width: 350px; font-size: 0.85em;">
										<table class="content">
												<thead>
													  <tr>
																<th style="width: 40%;">{!! __('check.number') !!}</th>
																<th style="width: 30%;">{!! __('check.bank') !!}</th>
																<th>{!! __('check.amount') !!}</th>
														</tr>
												</thead>
												<tbody>
										        @foreach($checks as $check)
										        <tr>
										            <td>{!! $check->number !!}</td>
																<td>{!! $check->getBank()->name !!}</td>
										            <td style="text-align: right;">{!! $check->getFormatedAmount() !!}</td>
										        </tr>
										        @endforeach
												</tbody>
								    </table>
										<table class="content" style="margin-top: 10px;">
												<thead>
														<tr>
																<th style="width: 40%;">{!! __('transfer.number') !!}</th>
																<th style="width: 30%;">{!! __('transfer.bank') !!}</th>
																<th>{!! __('transfer.amount') !!}</th>
														</tr>
												</thead>
												<tbody>
										        @foreach($transfers as $transfer)
										        <tr>
										            <td>{!! $transfer->number !!}</td>
																<td>{!! $transfer->getBank()->name !!}</td>
										            <td style="text-align: right;">{!! $transfer->getFormatedAmount() !!}</td>
										        </tr>
										        @endforeach
												</tbody>
								    </table>
										<p style="padding: 5px 10px; font-size: 1.15em; background-color: #ddd; border-radius: 2px; text-align: right;">
												{!! __('bill.cash') !!}: {!! $bill->getFormatedCash() !!}
										</p>
								</div>
						</td>
						<td>
								<div style="width: 350px; font-size: 0.85em;">
										<table class="content">
												<thead>
														<tr>
																<th style="width: 70%;">{!! __('concept.label') !!}</th>
																<th>{!! __('concept.amount') !!}</th>
														</tr>
												</thead>
												<tbody>
														@foreach($concepts as $concept)
														<tr>
																<td>{!! $concept->detail !!}</td>
																<td style="text-align: right;">{!! $concept->getFormatedAmount() !!}</td>
														</tr>
														@endforeach
												</tbody>
										</table>
								</div>
						</td>
				</tr>
		</table>

		<!-- FOOTER -->
    <div style="position: absolute; top: 40%;">
				<p style="float: right; margin-top: 50px; width: 200px; font-size: 0.8em; border-top: 1px dashed black; text-align: center;">
						p/ Estudio Michaud
				</p>
			  <p style="font-size: 1.2em;">
						Total: <b>{!! $bill->getFormatedAmount() !!}</b>
				</p>
		</div>
</body>
</html>
