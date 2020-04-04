@if(session()->has('flash_message'))
 <div class="alert alert-info alert-dismissable">
     {{session('flash_message')}}
 </div>
@endif