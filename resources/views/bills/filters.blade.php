<div class="filter-box">
    <form class="form-inline" action="{{ route('bills.index') }}">
        {!! Form::label('to_date', __('form.filters.client') . ':') !!}
        @if(isset($filters['client_id']))
        {!! Form::select('client_id', $clients, $filters['client_id'], ['class' => 'form-control', 'placeholder' => __('form.filters.placeholder_all')]) !!}
        @else
        {!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'placeholder' => __('form.filters.placeholder_select')]) !!}
        @endif

        {!! Form::label('from_date', __('form.filters.from_date') . ':') !!}
        @if(isset($filters['from_date']))
        {!! Form::date('from_date', $filters['from_date'], ['class' => 'form-control']) !!}
        @else
        {!! Form::date('from_date', null, ['class' => 'form-control']) !!}
        @endif

        {!! Form::label('to_date', __('form.filters.to_date') . ':') !!}
        @if(isset($filters['to_date']))
        {!! Form::date('to_date', $filters['to_date'], ['class' => 'form-control']) !!}
        @else
        {!! Form::date('to_date', null, ['class' => 'form-control']) !!}
        @endif

        {!! Form::submit(__('form.filters.submit'), ['class' => 'btn btn-sm btn-info']) !!}
    </form>
</div>
