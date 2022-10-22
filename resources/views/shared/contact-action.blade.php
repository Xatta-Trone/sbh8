<a href={{ route("$route.edit", $row->id) }} class="btn btn-sm btn-primary">View</a>

<form method="post" action="{{ route("$route.destroy", $row->id) }}" style="cursor: pointer;" class="d-inline" >
    @csrf
 @method('DELETE')
    <a class="btn btn-sm btn-danger" :href={{ route("$route.edit", $row->id)}}
        onclick="event.preventDefault();
        if(confirm('are your sure?')){this.closest('form').submit();}">
        Delete
    </a>
</form>

