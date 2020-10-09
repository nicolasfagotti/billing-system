<table>
    <tr>
        <td style="width: 50%;">
            <table class="content">
                <thead>
                    <tr>
                        <th style="width: 40%;">{!! __('check.number') !!}</th>
                        <th style="width: 30%;">{!! __('check.bank') !!}</th>
                        <th>{!! __('check.amount') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checks as $check)
                    <tr>
                        <td>{!! $check->number !!}</td>
                        <td>{!! $check->getBank()->name !!}</td>
                        <td style="text-align: right;">{!! $check->getFormatedAmount() !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="content" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="width: 40%;">{!! __('transfer.number') !!}</th>
                        <th style="width: 30%;">{!! __('transfer.bank') !!}</th>
                        <th>{!! __('transfer.amount') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transfers as $transfer)
                    <tr>
                        <td>{!! $transfer->number !!}</td>
                        <td>{!! $transfer->getBank()->name !!}</td>
                        <td style="text-align: right;">{!! $transfer->getFormatedAmount() !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="padding: 5px 10px; font-size: 1.05em; background-color: #ddd; border-radius: 2px; text-align: right;">
                {!! __('bill.cash') !!}: {!! $bill->getFormatedCash() !!}
            </p>
        </td>
        <td>
            <table class="content">
                <thead>
                    <tr>
                        <th style="width: 70%;">{!! __('concept.label') !!}</th>
                        <th>{!! __('concept.amount') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($concepts as $concept)
                    <tr>
                        <td>{!! $concept->detail !!}</td>
                        <td style="text-align: right;">{!! $concept->getFormatedAmount() !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>
