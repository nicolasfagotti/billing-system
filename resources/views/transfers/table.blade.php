<div class="table-responsive">
    <table class="table" id="transfers-table">
        <thead>
            <tr>
                <th>{!! __('bill.label') !!}</th>
                <th>{!! __('transfer.number') !!}</th>
                <th>{!! __('transfer.bank') !!}</th>
                <th>{!! __('transfer.amount') !!}</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($transfers as $transfers)
            <tr>
                <td>{{ $transfers->number }}</td>
                <td>{{ $transfers->amount }}</td>
                <td>{{ $transfers->bank_id }}</td>
                <td>{{ $transfers->bill_id }}</td>
                <td class="text-right">
                    {!! Form::open(['route' => ['transfers.destroy', $transfers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transfers.show', [$transfers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('transfers.edit', [$transfers->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
