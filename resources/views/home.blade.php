@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($products as $key => $value)
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $value->name }}
                        <span class="label label-info pull-right">{{ $value->category }}</span>
                    </div>
                    <div class="panel-body text-center">
                        <img src="{{ url($value->image) }}" style="width: 250px; height: 200px; max-width: 250px; max-height: 200px;" />
                        <p style="margin-top: 10px; text-align: left">
                            {{ $value->description }}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <button onclick="javascript:alert('Botão ilustrativo')" class="btn btn-default">R$ {{ $value->price }}</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
