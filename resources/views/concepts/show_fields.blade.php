<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('concept.id') . ':') !!}
    <p>{!! $concepts->id !!}</p>
</div>

<!-- Detail Field -->
<div class="form-group">
    {!! Form::label('detail', __('concept.detail') . ':') !!}
    <p>{!! $concepts->detail !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', __('concept.amount') . ':') !!}
    <p>{!! $concepts->amount !!}</p>
</div>

<!-- Bill Id Field -->
<div class="form-group">
    {!! Form::label('bill_id', __('bill.label') . ':') !!}
    <p>{!! $concepts->bill_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('concept.created') . ':') !!}
    <p>{!! $concepts->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('concept.updated') . ':') !!}
    <p>{!! $concepts->updated_at !!}</p>
</div>
