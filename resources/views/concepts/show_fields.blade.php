<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('concept.id') . ':') !!}
    <p>{!! $concepts->id !!}</p>
</div>

<!-- Detail Field -->
<div class="form-group">
    {!! Form::label('id', __('concept.detail') . ':') !!}
    <p>{!! $concepts->detail !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('id', __('concept.amount') . ':') !!}
    <p>{!! $concepts->amount !!}</p>
</div>

<!-- Bill Id Field -->
<div class="form-group">
    {!! Form::label('id', __('bill.label') . ':') !!}
    <p>{!! $concepts->bill_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('id', __('concept.created') . ':') !!}
    <p>{!! $concepts->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('id', __('concept.updated') . ':') !!}
    <p>{!! $concepts->updated_at !!}</p>
</div>
