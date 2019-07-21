@extends('layouts.app')

@section('content')
    <section class="content-header clearfix">
        <h1 class="pull-left">{!! __('client.label_plural') !!}</h1>
        <a class="btn btn-primary pull-right" href="{!! route('clients.create') !!}">{!! __('form.add_new_client') !!}</a>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('clients.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
