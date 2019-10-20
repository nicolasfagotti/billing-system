@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{!! __('bill.label_plural') !!}</h1>
    </section>
    <div class="content">
        @include('bills.show_fields')
        <div class="box box-primary">
            <div class="box-body">
                <div class="text-right">
                    <a href="{!! route('bills.index') !!}" class="btn btn-default btn-right">{!! __('form.back') !!}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
