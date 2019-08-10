@extends('layouts.app')

@section('content')
    <section class="content-header clearfix">
        <h1 class="pull-left">{!! __('bill.label_plural') !!}</h1>
        <a class="btn btn-primary pull-right" href="{!! route('bills.create') !!}">{!! __('form.add_new_bill') !!}</a>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('bills.filters')
        <div class="box box-primary">
            <div class="box-body">
                @if(count($bills) > 0)
                @include('bills.table')
                @else
                {!! __('form.filters.no_results_message') !!}
                @endif
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
