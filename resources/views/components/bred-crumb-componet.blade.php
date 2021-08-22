<div>
    <div class="app-title">
        <div>
          <h1>{{ $title }}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('student.index') }}"><i class="fa fa-home fa-lg"></i></a></li>
          @foreach ($links as $linkName=>$route)
            @if($route === '')
                <li class="breadcrumb-item active">{{ $linkName }}</li>
            @else
                <li class="breadcrumb-item active"><a href="{{ $route }}">{{ $linkName }}</a></li>
            @endif

          @endforeach

        </ul>
      </div>
</div>
