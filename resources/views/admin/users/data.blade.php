@if(!empty($data) && count($data) > 0)
    @foreach($data as $key => $value)
    <tr>
        <td class="id-width">{{ ++$i }}</td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->email }}</td>
        <td>
            @if($value->is_admin == 1)
                <span class="label label-success">Admin</span>
            @else
                <span class="label label-primary">User</span>
            @endif
        </td>
        <td>
            <a href="{{ route('users.show',[$value->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i> View</a>

            <a href="{{ route('users.edit',[$value->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</a>

            <button class="btn btn-danger btn-sm btn-flat remove-crud" data-id="{{ $value->id }}" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="Delete" data-action="{{ route('users.destroy',[$value->id]) }}"><i class="fa fa-trash" ></i> Delete</button>
        </td>
    </tr>
    @endforeach
@else
    <td class="text-center" colspan="6">There Are No Users.</td>
@endif

