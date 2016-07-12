<div id="create-popup" class="create-popup">
    <div class="create-content-wrapper">
        <div class="container inner-content">

            {{--close btn --}}
            <a href="#close" class="close-btn">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>

            <h2 class="title text-uppercase text-center defaultFontStyle">create page</h2>

            <div id="info-create" class="content-info">

                {{--NAME & URL--}}
                <div class="name-n-url">

                    {{--NAME--}}
                    <div class="form-group">
                        {{Form::text('name','',['class'=>'form-control name','name'=>'name','placeholder'=>'enter page name...','required'=>'required'])}}
                    </div>

                    {{--URL--}}
                    <div class="form-group">
                        {{Form::text('url','',['class'=>'form-control url','name'=>'url','placeholder'=>'set friendly url...','required'=>'required'])}}
                    </div>

                    {{--SUBMIT BTN--}}
                    <div class="form-group submit-name-n-url">
                        <a href="#create" class="createNewPageFirstStep">{{Form::submit('Create New Page',['class'=>'full-width form-control btn-warning submit-name-n-url text-uppercase',
                                                              'name'=>'pageMaze[head][create-new-btn]'])}}</a>
                    </div>

                </div>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>
