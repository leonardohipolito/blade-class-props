@props(['size'=>false])
<button {{$attributes->classProps(['xs'=>'button-xs','md'=>'button-md'],'md')}}>
    {{$slot}}
</button>
