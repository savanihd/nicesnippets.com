<div class="panel panel-primary filter-panel {{Request::get("filter",false)?'filter-in':'filter-out'}}">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>Searching</strong></h3>
    </div>
    <div class="panel-body">
        {!! Form::open(array('method'=>'get','class'=>'form-filter form-inline')) !!}
        <ul class="search">
            <li>
                <div class='form-group'>
                    {!! Form::label('filter[title][value]', 'Title:',array('class'=>'control-label')) !!}
                    {!! Form::text('filter[title][value]',Request::get('filter.title.value'),array('class'=>'form-control','placeholder' => 'Title')) !!}{!! Form::hidden('filter[title][type]','7') !!}
                </div>
            </li>
            <li>
                <div class='form-group'>
                    {!! Form::label('filter[slug][value]', 'Slug:',array('class'=>'control-label')) !!}
                    {!! Form::text('filter[slug][value]',Request::get('filter.slug.value'),array('class'=>'form-control','placeholder' => 'Slug')) !!}{!! Form::hidden('filter[slug][type]','7') !!}
                </div>
            </li>
            <li>
                <div class='form-group'>
                    <br/>
                    <button class="btn btn-success btn-flat" style="margin-top:5px;"><i aria-hidden="true" class="fa fa-search"></i> Search</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-danger btn-flat" style="margin-top:5px;"><i aria-hidden="true" class="fa fa-times"></i> Cancel</a>
                </div>
            </li>
        </ul>
        {!! Form::close() !!}
    </div>
</div>