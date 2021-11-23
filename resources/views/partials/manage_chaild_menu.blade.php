
<ul class="nav nav-treeview">
    @foreach($childs as $child)
{{--        <pre>
            @php
                print_r($child->childs)
            @endphp
        </pre>--}}
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
                {{$child->title ?? ''}}
                @if($child->childs->count()>0)
                    <i class="right fas fa-angle-left"></i>
                @endif
            </p>
        </a>
        @include('partials.manage_chaild_menu', ['childs'=>$child->childs])
    </li>
    @endforeach
</ul>
