@extends($adminTheme)

@section('title')
 Auto Post
@endsection

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-md-6">
            <h2>Auto Generate Post</h2>
        </div>
    </div>
</section>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Auto Generate Post</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          {!! Form::textarea('body', Request::get('body'), array('placeholder' => 'Description','required' => 'required','class' => 'form-control user-name-edit ckeditor','style'=>'height:150px;')) !!}
                        </div>      
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success text-center">Submit</button>
            </div>
        </form>
        <br/>
        @if(!empty($dec1))
            <p style="padding:10px;">{{ $dec1 }}</p>
        @endif
    </div>
</section>
@endsection