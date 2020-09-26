@extends('layouts.app')

@section('content')
    <section class="content-header clearfix">
        <h1 class="pull-left">{!! __('transfer.label_plural') !!}</h1>
        <a class="btn btn-primary pull-right" href="{!! route('checks.create') !!}">{!! __('form.add_new_transfer') !!}</a>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('transfers.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
