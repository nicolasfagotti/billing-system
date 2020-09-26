@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{!! __('transfer.label') !!}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transfers.show_fields')
                    <div class="text-right">
                        <a href="{!! route('transfers.index') !!}" class="btn btn-default btn-right">{!! __('form.back') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
