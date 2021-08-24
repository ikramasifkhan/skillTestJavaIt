<div class="d-flex justify-content-start">
    @foreach ($actions as $actionName => $routeName)
        @if ($actionName == 'active' && $status == 'active')
            <div class="mr-1">
                <form action="{{ $routeName }}" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-success btn-sm" type="submit" title="Inactive Now">
                        {{ bladeIcon('active') }}
                    </button>
                </form>
            </div>
        @endif

        @if ($actionName == 'inactive' && $status == 'inactive')
            <div class="mr-1">
                <form action="{{ $routeName }}" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-warning btn-sm" type="submit" title="Aactive Now">
                        {{ bladeIcon('inactive') }}
                    </button>
                </form>
            </div>
        @endif
        @if ($actionName == 'show')
            <div class="mr-1">
                <a href="{{ $routeName }}" class="btn btn-sm btn-info"
                    title="Show more">{{ bladeIcon('show') }}</a>
            </div>
        @endif
        @if ($actionName == 'edit')
            <div class="mr-1">
                <a href="{{ $routeName }}" class="btn btn-sm btn-info" title="Edit it">{{ bladeIcon('edit') }}</a>
            </div>
        @endif
        @if ($actionName == 'delete')
            <div>
                <form action="{{ $routeName }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm delete" type="submit" title="Delete Now">
                        {{ bladeIcon('delete') }}
                    </button>
                </form>
            </div>
        @endif
    @endforeach
</div>
