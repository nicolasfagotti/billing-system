<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('concept.amount') . ':') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'step' => '0.01']) !!}
</div>

<!-- Bill Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('bill.label') . ':') !!}
    {!! Form::text('bill_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('concept.detail') . ':') !!}
    {!! Form::text('detail', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    {!! Form::submit(__('form.save') , ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('concepts.index') !!}" class="btn btn-default">{!! __('form.cancel') !!}</a>
</div>
