
@if(session('type') && session('message'))
<div>
    <div class="alert alert-{{session('type')}} alert-dismissible" role="alert">
{{--        <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--        <div class="alert-icon">--}}
{{--            <i class="fa fa-{{session('icon')}}"></i>--}}
{{--        </div>--}}
        <div class="alert-message">
            <span>{{session('message')}}</span>
        </div>
    </div>
</div>
@endif

