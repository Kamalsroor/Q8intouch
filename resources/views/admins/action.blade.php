<td class="project-actions text-right">
    <a class="btn btn-primary btn-sm" href="{{route('admin.show' , $id )}}">
        <i class="fas fa-folder">
        </i>
        View
    </a>
    <a class="btn btn-info btn-sm" href="{{route('admin.edit' , $id )}}">
        <i class="fas fa-pencil-alt">
        </i>
        Edit
    </a>
    <a class="btn btn-danger btn-sm destroyBtn" href="{{route('admin.destroy' , $id)}}">
        <i class="fas fa-trash">
        </i>
        Delete
    </a>
</td>
