@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{!! __('bill.label') !!}</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'bills.store', 'class' => 'main-form']) !!}

            @include('bills.fields')

        {!! Form::close() !!}
    </div>
@endsection
