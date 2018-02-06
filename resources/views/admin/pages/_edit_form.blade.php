<div class="form-group">
	
    
    {!!Form::label('old_images', 'Image') !!}	
    {!!Html::image('assets/img/'.$page['images']) !!}
    {!!Form::hidden('old_images', $page['images'], ['file'=>'true','class' => 'form-control', 'filestyle', 'data-buttonText'=>'Chose immage', 'enctype'=>'multipart/form-data']) !!}
    	
    
</div>

