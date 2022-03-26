@if(!empty($data) && count($data) > 0)
    @foreach($data as $key => $value)
    <tr>
        <td class="id-width">{{ ++$i }}</td>
        <td>{{ $value->title }}</td>
        <td>
            <a href="{{ route('post.clear.cache',$value->slug) }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-times"></i> Clear Cache</a>

            <a href="{{ route('post.tag.create',$value->id) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-tag"></i> Tags</a>

            <a href="{{ route('post.detail',$value->slug) }}" class="btn btn-info btn-sm btn-flat"><i class="fa fa-eye"></i> View</a>

            <a href="{{ route('posts.edit',[$value->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</a>

            <button class="btn btn-danger btn-sm btn-flat remove-crud" data-id="{{ $value->id }}" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="Delete" data-action="{{ route('posts.destroy',[$value->id]) }}"><i class="fa fa-trash" ></i> Delete</button>
        </td>
    </tr>
    @endforeach
@else
    <td class="text-center" colspan="6">There Are No Posts.</td>
@endif

