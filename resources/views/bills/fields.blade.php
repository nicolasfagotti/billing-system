<!-- Client Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('client_id', __('client.label') . ':') !!}
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('cash', __('bill.cash') . ':') !!}
    {!! Form::number('cash', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
</div>

<!-- Concepts -->
@if(isset($bills))
<div class="form-group col-sm-12">
    {!! Form::label('concepts', __('concept.label_plural') . ':') !!}
    <table class="table">
        @foreach($bills->getConcepts() as $concept)
        <tr>
            <td>{!! $concept->detail !!}</td>
            <td>{!! $concept->getFormatedAmount() !!}</td>
        </tr>
        @endforeach
    </table>
</div>
@else
<div class="form-group col-sm-12">
    <button id="add-concept-button" class="btn btn-success btn-sm">{!! __('form.add_new_concept') !!}</button>
</div>
<div class="form-group col-sm-8" id="column-detail">
    {!! Form::label('detail', __('concept.detail') . ':') !!}
    {!! Form::text('detail[]', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group col-sm-4" id="column-amount">
    {!! Form::label('detail', __('concept.amount') . ':') !!}
    {!! Form::number('amount[]', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var maxFields = 10;                       // Maximum input boxes allowed
        var cDetail = $('#column-detail');        // Fields wrapper
        var aDetail = $('#column-amount');        // Fields wrapper
        var addButton = $('#add-concept-button'); // Add button ID

        var x = 0;
        $(addButton).click(function(e) {
        e.preventDefault();
            if (x < maxFields) {
                x++;
                $('#rm').remove();
                $(cDetail).append('<input class="form-control column-detail-item" required="required" name="detail[]" type="text">');
                $(aDetail).append('<input class="form-control column-amount-item" required="required" step="0.01" name="amount[]" type="number">')
                    .append('<a href="#" id="rm" class="remove-field">{!! __('form.delete_concept') !!}</a>');
            }
        });

        $(aDetail).on('click', '.remove-field', function(e) {
            e.preventDefault();
            $('.column-detail-item').last().remove();
            $('.column-amount-item').last().remove();
            if (x === 1) {
                $('#rm').remove();
            }
            x--;
        })
    });
</script>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    {!! Form::submit(__('form.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bills.index') !!}" class="btn btn-default">{!! __('form.cancel') !!}</a>
</div>
