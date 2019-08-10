<div class="filter-box">
    <form class="form-inline" action="{{ route('bills.index') }}">
        {!! __('form.filters.label') !!}:
        @if(isset($filters['client_id']))
        {!! Form::select('client_id', $clients, $filters['client_id'], ['class' => 'form-control', 'placeholder' => __('form.filters.placeholder_all')]) !!}
        @else
        {!! Form::select('client_id', $clients, null, ['class' => 'form-control', 'placeholder' => __('form.filters.placeholder_select')]) !!}
        @endif

        {!! Form::submit(__('form.filters.submit'), ['class' => 'btn btn-sm btn-info']) !!}
    </form>
</div>
