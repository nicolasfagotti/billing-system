@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{!! __('bill.label') !!}</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        {!! Form::model($bills, ['route' => ['bills.update', $bills->id], 'method' => 'patch', 'class' => 'main-form']) !!}

            @include('bills.fields')

        {!! Form::close() !!}
    </div>
@endsection
