


           
  </div>
    <div class="header_box">
@if(isset($logos) && is_object($logos))
@foreach($logos as $logo) 
      <div class="logo">
        <a href="{{ url ('/') }}"></a>

         <script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
     <div class=" scype animated bounceIn wow delay-02s" id="SkypeButton_Call_innadanylevska_1"><a href="javascript:void(0)">
 <script type="text/javascript">
 Skype.ui({
 "name": "chat",
 "element": "SkypeButton_Call_innadanylevska_1",
 "participants": ["innadanylevska"],
 "imageSize": 32
 });
 </script>
 
</a></div>
      </div>
          <a href="{{ url ('/') }}">{!! Html::image('assets/img/'.$logo->images) !!}</a>
@endforeach
@endif

     

   




      <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>

        
              
          
         
        
        <div id="main-nav" class="collapse navbar-collapse navStyle">
            <ul class="nav navbar-nav" id="mainNav">
              
            
            <li><a href="#" class="scroll-link"></a></li>
            
              
              
            </ul>
      </div>
     </nav>

     
      
    </div>
  </div>
