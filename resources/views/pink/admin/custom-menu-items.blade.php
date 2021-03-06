@foreach($items as $item)

    <tr>
        <td style="text-align: left">{{ $paddingLeft }} {!! Html::link(route('menus.edit', ['menus' => $item->id]), $item->title) !!}</td>
        <td>{{ $item->url() }}</td>
        <td>
            {!! Form::open(['url' => route('menus.destroy', ['menus' => $item->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                {{ method_field('DELETE') }}
                {!! Form::button('Удалить', ['class' => 'btn btn-french-5', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        </td>
    </tr>

    @if($item->hasChildren())
        <ul class="sub-menu">
            @include(env('THEME').'.admin.custom-menu-items', ['items' => $item->children(), 'paddingLeft' => $paddingLeft.'--'])
        </ul>
    @endif

@endforeach