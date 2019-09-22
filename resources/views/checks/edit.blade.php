@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Checks
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($checks, ['route' => ['checks.update', $checks->id], 'method' => 'patch']) !!}

                        @include('checks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection