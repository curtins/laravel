@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List</div>

                <div class="panel-body">
                <li>    
                    @foreach($newsheader as $header)
                        {{ $header['feed'] }}
                    @endforeach
                </li>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
