<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('bill.id') . ':') !!}
    <p>{!! $bills->id !!}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', __('client.label') . ':') !!}
    <p>{!! $bills->getClient()->full_name !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', __('bill.amount') . ':') !!}
    <p>{!! $bills->formatedAmount() !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('bill.created') . ':') !!}
    <p>{!! $bills->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('bill.updated') . ':') !!}
    <p>{!! $bills->updated_at !!}</p>
</div>
