<div class="table-responsive">
    <table class="table" id="concepts-table">
        <thead>
            <tr>
              <th>{!! __('bill.label') !!}</th>
              <th>{!! __('concept.detail') !!}</th>
              <th>{!! __('concept.amount') !!}</th>
              <th colspan="3"></th>
        </thead>
        <tbody>
        @foreach($concepts as $concept)
            <tr>
                <td>{!! $concept->bill_id !!}</td>
                <td>{!! $concept->detail !!}</td>
                <td>{!! $concept->amount !!}</td>
                <td class="text-right">
                    {!! Form::open(['route' => ['concepts.destroy', $concept->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('concepts.show', [$concept->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('concepts.edit', [$concept->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
