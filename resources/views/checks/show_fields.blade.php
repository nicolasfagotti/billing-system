<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('check.id') . ':') !!}
    <p>{!! $checks->id !!}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', __('check.number') . ':') !!}
    <p>{!! $checks->number !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', __('check.amount') . ':') !!}
    <p>{!! $checks->amount !!}</p>
</div>

<!-- Bank Id Field -->
<div class="form-group">
    {!! Form::label('bank_id', __('check.bank') . ':') !!}
    <p>{!! $checks->bank_id !!}</p>
</div>

<!-- Bill Id Field -->
<div class="form-group">
    {!! Form::label('bill_id', __('bill.label') . ':') !!}
    <p>{!! $checks->bill_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('check.created') . ':') !!}
    <p>{!! $checks->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('check.updated') . ':') !!}
    <p>{!! $checks->updated_at !!}</p>
</div>
