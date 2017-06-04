Hi {{ $user->username  }}
@if($user->is_enabled)
    <div> you accont is enabled</div>
@endif
@if(!$user->is_enabled)
    <div> you accont is disabled</div>
@endif