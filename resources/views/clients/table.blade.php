<div class="table-responsive">
    <table class="table" id="clients-table">
        <thead>
            <tr>
                <th>{!! __('client.name') !!}</th>
                <th>{!! __('client.email') !!}</th>
                <th>{!! __('client.address') !!}</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $clients)
            <tr>
                <td>{!! $clients->name !!}</td>
                <td>{!! $clients->email !!}</td>
                <td>{!! $clients->address !!}</td>
                <td class="text-right">
                    {!! Form::open(['route' => ['clients.destroy', $clients->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clients.show', [$clients->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clients.edit', [$clients->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
