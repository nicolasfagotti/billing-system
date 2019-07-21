<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('client.id') . ':') !!}
    <p>{!! $clients->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('client.name') . ':') !!}
    <p>{!! $clients->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('client.email') . ':') !!}
    <p>{!! $clients->email !!}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('client.address') . ':') !!}
    <p>{!! $clients->address !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('client.created') . ':') !!}
    <p>{!! $clients->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('client.updated') . ':') !!}
    <p>{!! $clients->updated_at !!}</p>
</div>
