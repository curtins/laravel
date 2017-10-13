@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <table width="100%" class="table table-bordered table-striped">

                    
						 @foreach($detail as $details)

                            <tr><td><td>{{$details->feed}} </td>
                            
                            <td><a href="{{$details->title}}">{{$details->itemid}}</a></td>
                            
                            </tr> 
                    
                        @endforeach 
                    

                   </table>

                 
                </div>

        </div>
    </div>
</div>
@endsection
