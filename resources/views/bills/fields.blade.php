<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('client.label') . ':') !!}
    {!! Form::select('client_id', $clients, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    {!! Form::submit(__('form.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('bills.index') !!}" class="btn btn-default">{!! __('form.cancel') !!}</a>
</div>
