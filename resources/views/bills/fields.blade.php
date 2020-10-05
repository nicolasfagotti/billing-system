<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <!-- Client Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('client_id', __('client.label') . ':') !!}
                {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

@if(isset($bills))
<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('cash', __('bill.cash') . ':') !!}
                    {!! Form::number('cash', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('checks', __('check.label_plural') . ':') !!}
                    <table class="table">
                        @foreach($bills->getChecks() as $check)
                        <tr>
                            <td>{!! $check->number !!}</td>
                            <td>{!! $check->getBank()->name !!}</td>
                            <td class="text-right">{!! $check->getFormatedAmount() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="form-group">
                    {!! Form::label('transfers', __('transfer.label_plural') . ':') !!}
                    <table class="table">
                        @foreach($bills->getTransfers() as $transfer)
                        <tr>
                            <td>{!! $transfer->number !!}</td>
                            <td>{!! $transfer->getBank()->name !!}</td>
                            <td class="text-right">{!! $transfer->getFormatedAmount() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group col-sm-12">
                    {!! Form::label('concepts', __('concept.label_plural') . ':') !!}
                    <table class="table">
                        @foreach($bills->getConcepts() as $concept)
                        <tr>
                            <td>{!! $concept->detail !!}</td>
                            <td class="text-right">{!! $concept->getFormatedAmount() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('cash', __('bill.cash') . ':') !!}
                {!! Form::number('cash', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
            </div>

            <div class="form-group col-sm-6 text-right">
                <div class="cash-btn-group">
                    <button id="add-check-button" class="btn btn-success btn-sm">{!! __('form.add_new_check') !!}</button>
                    <button id="add-transfer-button" class="btn btn-success btn-sm">{!! __('form.add_new_transfer') !!}</button>
                </div>
            </div>
        </div>

        <!-- Checks -->
        <div class="row">
            <div class="form-group col-sm-4" id="column-check-number">
                <!-- {!! Form::label('check_number', __('check.number') . ':') !!} -->
                <!-- {!! Form::number('check_number[]', null, ['class' => 'form-control', 'required' => 'required']) !!} -->
            </div>
            <div class="form-group col-sm-4" id="column-check-bank">
                <!-- {!! Form::label('check_bank', __('check.bank') . ':') !!} -->
                <!-- {!! Form::select('check_bank[]', $banks, null, ['class' => 'form-control']) !!} -->
            </div>
            <div class="form-group col-sm-4" id="column-check-amount">
                <!-- {!! Form::label('check_amount', __('concept.amount') . ':') !!} -->
                <!-- {!! Form::number('check_amount[]', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!} -->
            </div>
        </div>

        <!-- Transfers -->
        <div class="row">
            <div class="form-group col-sm-4" id="column-transfer-number">
                <!-- {!! Form::label('transfer_number', __('transfer.number') . ':') !!} -->
                <!-- {!! Form::number('transfer_number[]', null, ['class' => 'form-control', 'required' => 'required']) !!} -->
            </div>
            <div class="form-group col-sm-4" id="column-transfer-bank">
                <!-- {!! Form::label('transfer_bank', __('transfer.bank') . ':') !!} -->
                <!-- {!! Form::select('transfer_bank[]', $banks, null, ['class' => 'form-control']) !!} -->
            </div>
            <div class="form-group col-sm-4" id="column-transfer-amount">
                <!-- {!! Form::label('transfer_amount', __('transfer.amount') . ':') !!} -->
                <!-- {!! Form::number('transfer_amount[]', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!} -->
            </div>
        </div>
    </div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <!-- Concepts -->
            <div class="form-group col-sm-6" id="column-detail">
                {!! Form::label('detail', __('concept.detail') . ':') !!}
                {!! Form::text('detail[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group col-sm-4" id="column-amount">
                {!! Form::label('amount', __('concept.amount') . ':') !!}
                {!! Form::number('amount[]', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
            </div>
            <div class="form-group col-sm-2 text-right">
                <div class="concept-btn">
                    <button id="add-concept-button" class="btn btn-success btn-sm">{!! __('form.add_new_concept') !!}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Submit Field -->
<div class="box box-primary">
    <div class="box-body">
        <div class="form-group col-sm-12 text-right">
            {!! Form::submit(__('form.save'), ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('bills.index') !!}" class="btn btn-default">{!! __('form.cancel') !!}</a>
        </div>
    </div>
</div>

@if(!isset($bills))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var maxFields = 10;                                    // Maximum input boxes allowed
        var cDetail = $('#column-detail');                     // Fields wrapper
        var cAmount = $('#column-amount');                     // Fields wrapper
        var addConceptButton = $('#add-concept-button');       // Add Concept button ID

        var y = 0;
        $(addConceptButton).click(function(e) {
        e.preventDefault();
            if (y < maxFields) {
                y++;
                $('#rm').remove();
                $(cDetail).append('<input class="form-control column-detail-item" required="required" name="detail[]" type="text">');
                $(cAmount).append('<input class="form-control column-amount-item" required="required" step="0.01" name="amount[]" type="number">')
                    .append('<a href="#" id="rm" class="remove-field">{!! __('form.delete_concept') !!}</a>');
            }
        });

        $(cAmount).on('click', '.remove-field', function(e) {
            e.preventDefault();
            $('.column-detail-item').last().remove();
            $('.column-amount-item').last().remove();
            if (y === 1) {
                $('#rm').remove();
            }
            y--;
        });

        function enableExtraPayment(id, numberLabel, amountLabel, deleteLabel) {
            var cBank = $('#column-' + id + '-bank');     // Fields wrapper
            var cNumber = $('#column-' + id + '-number'); // Fields wrapper
            var cAmount = $('#column-' + id + '-amount'); // Fields wrapper
            var addButton = $('#add-' + id + '-button');  // Add button ID

            var x = 0;
            $(addButton).click(function(e) {
            e.preventDefault();
                if (x < maxFields) {
                    x++;
                    $('#' + id + '-rm').remove();
                    $(cNumber).append('<input class="form-control column-' + id + '-number-item" required="required" name="' + id + '_number[]" type="number" placeholder="' + numberLabel + '">');
                    $(cBank).append(getBankSelect(id));
                    $(cAmount).append('<input class="form-control column-' + id + '-amount-item" required="required" step="0.01" name="' + id + '_amount[]" type="number" placeholder="' + amountLabel + '">')
                        .append('<a href="#" id="' + id + '-rm" class="remove-' + id + '-field">' + deleteLabel + '</a>');
                }
            });

            $(cAmount).on('click', '.remove-' + id + '-field', function(e) {
                e.preventDefault();
                $('.column-' + id + '-number-item').last().remove();
                $('.column-' + id + '-bank-item').last().remove();
                $('.column-' + id + '-amount-item').last().remove();
                if (x === 1) {
                    $('#' + id + '-rm').remove();
                }
                x--;
            });
        }

        // TODO: Replace with an Ajax call
        function getBankSelect(id) {
            return '<select class="form-control column-' + id + '-bank-item" name="' + id + '_bank[]">' +
                '<option value="1">Banco BBVA</option>' +
                '<option value="2">Banco Galicia</option>' +
                '<option value="3">Banco HSBC</option>' +
                '<option value="4">Banco ICBC</option>' +
                '<option value="6">Banco Nación</option>' +
                '<option value="5">Banco Macro</option>' +
                '<option value="7">Banco Patagonia</option>' +
                '<option value="8">Banco Provincia</option>' +
                '<option value="9">Banco Santander</option>' +
                '</select>';
        }

        enableExtraPayment('check', '{!! __('check.number') !!}', '{!! __('check.amount') !!}', '{!! __('form.delete_check') !!}');
        enableExtraPayment('transfer', '{!! __('transfer.number') !!}', '{!! __('transfer.amount') !!}', '{!! __('form.delete_transfer') !!}');
    });
</script>
@endif
