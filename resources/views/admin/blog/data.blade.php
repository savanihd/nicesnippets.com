@if(!empty($data) && count($data) > 0)
    @foreach($data as $key => $value)
    <tr>
        <td class="id-width">{{ ++$i }}</td>
        <td>{{ $value->title }}</td>
        <td>
            <?php $hasComma = false; ?>
            @foreach($value->blogCategoryConnect as $categoryKey => $categoryValue)
                @if ($hasComma)
                     
                @endif
               <label class="label label-primary" > {{ $categoryValue->name }}</label> 
                <?php  $hasComma=true; ?>
            @endforeach
        </td>
        <td>
            @if($value->is_publish == 1)
                <label class="label label-success">Yes</label>
            @else
                <label class="label label-danger">No</label>
            @endif
        </td>
        <td>
            @if($value->publish_date)
                {{  \Carbon\Carbon::createFromFormat('Y-m-d', $value->publish_date)->format('d-m-Y') }}
            @else
                -
            @endif
        </td>
        <td><label class="label label-success" >{{ $value->total_view }}</label></td>
        <td>{{  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d-m-Y') }}</td>

        <td>
            <a class="btn btn-info btn-sm btn-flat" data-toggle="tooltip" title="View" {{ $value->is_publish == 0 ? 'disabled' : "href=".route("blog.detail",$value->slug) }}><i class="fa fa-eye"></i></a>
            
            <a href="{{ route('blogs.edit',[$value->id]) }}" class="btn btn-success btn-sm btn-flat"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>

            <a href="{{ route('admin.related.blogs',[$value->id]) }}" class="btn btn-primary btn-sm btn-flat" data-toggle="tooltip" title="Related"><i class="fa fa-file" aria-hidden="true"></i></a>

            <button class="btn btn-danger btn-sm btn-flat remove-crud" data-id="{{ $value->id }}" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="Delete" data-toggle="tooltip" title="Delete" data-action="{{ route('blogs.destroy',[$value->id]) }}"><i class="fa fa-trash" ></i></button>
        </td>
    </tr>
    @endforeach
@else
    <td class="text-center" colspan="6">There Are No Blog.</td>
@endif

