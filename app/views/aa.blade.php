{{ Form::open(array('url' => 'add')) }}

<div class="control-group">
	{{ Form::label('title', 'Title') }}
	<div class="controls">
		{{ Form::text('title') }}
	</div>
</div>


{{Form::token()}}
<div class="control-group">
	{{ Form::label('body', 'Content') }}
	<div class="controls">
		{{ Form::textarea('body') }}
	</div>
</div>

<div class="form-actions">
	{{ Form::submit('新增')}}
</div>

{{ Form::close() }}