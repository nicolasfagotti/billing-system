<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('transfer.id') . ':') !!}
    <p>{!! $transfers->id !!}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', __('transfer.number') . ':') !!}
    <p>{!! $transfers->number !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', __('transfer.amount') . ':') !!}
    <p>{!! $transfers->amount !!}</p>
</div>

<!-- Bank Id Field -->
<div class="form-group">
    {!! Form::label('bank_id', __('transfer.bank') . ':') !!}
    <p>{!! $transfers->bank_id !!}</p>
</div>

<!-- Bill Id Field -->
<div class="form-group">
    {!! Form::label('bill_id', __('bill.label') . ':') !!}
    <p>{!! $transfers->bill_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('transfer.created') . ':') !!}
    <p>{!! $transfers->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('transfer.updated') . ':') !!}
    <p>{!! $transfers->updated_at !!}</p>
</div>
