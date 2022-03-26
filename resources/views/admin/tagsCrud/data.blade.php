@if(!empty($data) && count($data) > 0)
    @foreach($data as $key => $value)
    <tr>
        <td class="id-width">{{ ++$i }}</td>
        <td>{{ $value->tag }}</td>
        <td>{{ $value->totalPost }}</td>
        <td>
            <a href="{{ route('tags-crud.edit',[$value->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</a>

            <button class="btn btn-danger btn-sm btn-flat remove-crud" data-id="{{ $value->id }}" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="Delete" data-action="{{ route('tags-crud.destroy',[$value->id]) }}"><i class="fa fa-trash" ></i> Delete</button>
        </td>
    </tr>
    @endforeach
@else
    <td class="text-center" colspan="6">There Are No Tag.</td>
@endif

