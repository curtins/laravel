@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List</div>

                <div class="panel-body">

                <p>  

                    @foreach ($headers as $header)
                        <p>{{ $header->feed }}{{ $header->created_at }}</p>
                    @endforeach
                    
                </p>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
