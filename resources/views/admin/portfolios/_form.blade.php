<div class="form-group">
	{!!Form::label('name', 'Name') !!}	
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::label('filter', 'Filter') !!}
    {!!Form::text('filter', null, ['class' => 'form-control']) !!}    
    {!!Form::label('link', 'Link') !!}
    {!!Form::text('link', null, ['class' => 'form-control']) !!}    
    
    {!!Form::label('images', 'Image') !!}
    {!!Form::file('images', null, ['class' => 'form-control']) !!}
</div>

