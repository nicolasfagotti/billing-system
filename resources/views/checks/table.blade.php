<div class="table-responsive">
    <table class="table" id="checks-table">
        <thead>
            <tr>
                <th>Number</th>
        <th>Amount</th>
        <th>Bank Id</th>
        <th>Bill Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($checks as $checks)
            <tr>
                <td>{!! $checks->number !!}</td>
            <td>{!! $checks->amount !!}</td>
            <td>{!! $checks->bank_id !!}</td>
            <td>{!! $checks->bill_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['checks.destroy', $checks->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('checks.show', [$checks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('checks.edit', [$checks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
