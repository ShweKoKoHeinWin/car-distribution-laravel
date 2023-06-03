@section('title', 'Home')

<x-layout :phone="$data->phone">

<a href="{{url('/')}}" class="btn btn-secondary m-3">Back</a>
<a href="{{url('/noti/clear')}}" class="btn btn-danger mx-auto my-3">Mark as read</a>
<h3 class="text-center">Notifications</h3>
<div class="border w-75 mx-auto my-3">
    @if (count($notifications) > 0)
    @foreach ($notifications as $notification)
    <div class="card w-75 mx-auto p-3 my-3">
        <small class="small">{{$notification->created_at}}</small>
        <h5>{{$notification->data['type']}}</h5>
        <p>{{$notification->data['message']}}</p>
        <div class="d-flex justfy-content-center">
        
         {{-- Lint fot view --}} 
        <a class="btn btn-warning" href="{{url($notification->data['link'])}}">Click Here To View</a>
        </div>   
    </div>
    @endforeach

    @else
    <h4 class="text-center">There is no New Notifications</h4>
    @endif
</div>

</x-layout>