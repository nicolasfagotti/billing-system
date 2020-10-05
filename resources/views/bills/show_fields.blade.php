<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <!-- Id Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('id', __('bill.id') . ':') !!}
                <p>{!! $bills->id !!}</p>
            </div>

            <!-- Client Id Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('client_id', __('client.label') . ':') !!}
                <p>{!! $bills->getClient()->full_name !!}</p>
            </div>

            <!-- Amount Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('amount', __('bill.amount') . ':') !!}
                <p>{!! $bills->getFormatedAmount() !!}</p>
            </div>

            <!-- Created At Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('created_at', __('bill.created') . ':') !!}
                <p>{!! $bills->created_at !!}</p>
            </div>

            <!-- Updated At Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('updated_at', __('bill.updated') . ':') !!}
                <p>{!! $bills->updated_at !!}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-body">
                <!-- Cash Field -->
                <div class="form-group">
                    {!! Form::label('id', __('bill.cash') . ':') !!}
                    <table class="table">
                        <tr>
                            <td class="text-right">{!! $bills->getFormatedCash() !!}</td>
                        </tr>
                    </table>
                </div>

                <!-- Checks -->
                @if(count($bills->getChecks()) > 0)
                <div class="form-group">
                    {!! Form::label('checks', __('check.label_plural') . ':') !!}
                    <table class="table">
                        @foreach($bills->getChecks() as $check)
                        <tr>
                            <td>{!! $check->number !!}</td>
                            <td>{!! $check->getBank()->name !!}</td>
                            <td class="text-right">{!! $check->getFormatedAmount() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif

                <!-- Transfers -->
                @if(count($bills->getTransfers()) > 0)
                <div class="form-group">
                    {!! Form::label('transfers', __('transfer.label_plural') . ':') !!}
                    <table class="table">
                        @foreach($bills->getTransfers() as $transfer)
                        <tr>
                            <td>{!! $transfer->number !!}</td>
                            <td>{!! $transfer->getBank()->name !!}</td>
                            <td class="text-right">{!! $transfer->getFormatedAmount() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-body">
                <!-- Concepts -->
                <div class="form-group">
                    {!! Form::label('concepts', __('concept.label_plural') . ':') !!}
                    <table class="table">
                        @foreach($bills->getConcepts() as $concept)
                        <tr>
                            <td>{!! $concept->detail !!}</td>
                            <td class="text-right">{!! $concept->getFormatedAmount() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
