<div class="table-responsive">
    <table class="table" id="bills-table">
        <thead>
            <tr>
                <th>{!! __('client.created') !!}</th>
                <th>{!! __('client.label') !!}</th>
                <th class="text-right">{!! __('bill.amount') !!}</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($bills as $bills)
            <tr>
                <td>{!! $bills->created_at !!}</td>
                <td>{!! $bills->getClient()->full_name !!}</td>
                <td class="text-right">{!! $bills->formatedAmount() !!}</td>
                <td class="text-right">
                    {!! Form::open(['route' => ['bills.destroy', $bills->id], 'method' => 'delete']) !!}
                    <div class="btn-group">
                        <a title="PDF" href="/pdf/bill/{!! $bills->id !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-file"></i></a>
                        <a href="{!! route('bills.show', [$bills->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('bills.edit', [$bills->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
