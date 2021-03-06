<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', __('transfer.number') . ':') !!}
    {!! Form::number('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', __('transfer.amount') . ':') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_id', __('transfer.bank') . ':') !!}
    {!! Form::text('bank_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_id', __('bill.label') . ':') !!}
    {!! Form::text('bill_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    {!! Form::submit(__('form.save') , ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transfers.index') !!}" class="btn btn-default">{!! __('form.cancel') !!}</a>
</div>
