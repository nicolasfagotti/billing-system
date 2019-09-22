<div class="table-responsive">
    <table class="table" id="checks-table">
        <thead>
            <tr>
                <th>{!! __('bill.label') !!}</th>
                <th>{!! __('check.number') !!}</th>
                <th>{!! __('check.bank') !!}</th>
                <th>{!! __('check.amount') !!}</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($checks as $checks)
            <tr>
                <td>{!! $checks->bill_id !!}</td>
                <td>{!! $checks->number !!}</td>
                <td>{!! $checks->bank_id !!}</td>
                <td>{!! $checks->amount !!}</td>
                <td class="text-right">
                    {!! Form::open(['route' => ['checks.destroy', $checks->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('checks.show', [$checks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('checks.edit', [$checks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
