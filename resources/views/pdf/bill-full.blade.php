@extends('pdf.layout')

@section('content')
		<div style="position: relative; height: 50%;">
    		@include('pdf.partials.bill-header')
				@include('pdf.partials.bill-body')
				@include('pdf.partials.bill-footer')
		</div>
		<div style="position: relative;">
				@include('pdf.partials.bill-header')
				@include('pdf.partials.bill-body')
				@include('pdf.partials.bill-footer')
		</div>
@stop
