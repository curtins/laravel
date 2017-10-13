@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <table width="100%" class="table table-bordered table-striped">

                   @foreach($heads as $head)

                        @if($heads->id == $details->header_id)
                        <tr><td width="90%">{{$detail->title}} - {{$detail->itemid}}</td></tr>
                        @endif

                   @endforeach

                   </table>

                 
                </div>

        </div>
    </div>
</div>
@endsection
