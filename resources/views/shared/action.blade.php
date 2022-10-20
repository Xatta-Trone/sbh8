<a href={{ route("$route.edit", $row->id) }} class="btn btn-sm btn-primary">Edit</a>

<form method="Delete" action="{{ route("$route.destroy", $row->id) }}" style="cursor: pointer;" class="d-inline" >
    @csrf

    <a class="btn btn-sm btn-danger" :href={{ route("$route.edit", $row->id)}}
        onclick="event.preventDefault();
        this.closest('form').submit();">
        Delete
    </a>
</form>

