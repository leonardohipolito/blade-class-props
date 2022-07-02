@props(['size'=>false])
<button {{$attributes
    ->classProps([
        'xs'=>fn($c)=>$c->has('outline')?'button-xs-outline':'button-xs',
        'md'=>'button-md'
    ],'md')
    ->classProps([
        'outline'=>'bg-transparent'
    ])
}}>
    {{$slot}}
</button>
