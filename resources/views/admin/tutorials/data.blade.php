@if(!empty($data) && count($data) > 0)
    @foreach($data as $key => $value)
    <tr>
        <td class="id-width">{{ ++$i }}</td>
        <td>{{ $value->languageName }}</td>
        <td>{{ $value->topic_name }}</td>
        <td>
            <a href="{{ !empty($value->slug) ? route('tutorialDetails',[$value->languageSlug,$value->slug]) : route('tutorial') }}" class="btn btn-sm btn-flat btn-primary" target="_blank"><i class="fa fa-eye"></i> View</a>

            <a href="{{ route('tutorials.edit',[$value->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-pencil"></i> Edit</a>

            <button class="btn btn-danger btn-sm btn-flat remove-crud" data-id="{{ $value->id }}" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="Delete" data-action="{{ route('tutorials.destroy',[$value->id]) }}"><i class="fa fa-trash" ></i> Delete</button>
        </td>
    </tr>
    @endforeach
@else
    <td class="text-center" colspan="6">There Are No Tutorials.</td>
@endif

