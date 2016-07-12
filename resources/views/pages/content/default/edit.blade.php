<div id="create" class="create-page-wrapper col-md-offset-1 col-md-3 margin-right jumbotron">

    {{--CONTENT EDIT --}}
    <div class="create-content-wrapper">
        <a href="#close" class="close-btn">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>

        <h2 class="title text-uppercase text-center">create/edit page</h2>

        <div class="form">

            <div id="info-create" class="content-info">

                {{--CONTROLLER PART--}}
                <aside class="col-md-4 pull-right">

                    <div class="controller-n-url">

                        {{ Form::open(['url'=>'#','action'=>'POST']) }}

                        {{--controller--}}
                        <div class="form-group col-md-6 no-padding-right">

                            <label for="controller" class="text-capitalize">controller</label>

                            <select name="controller" id="controller"
                                    class="form-control text-capitalize full-width controller-input">
                                <option value="">Select Controller</option>

                                @include('pages._partials._controller-select-box')

                            </select>
                        </div>

                        {{--url--}}
                        <div class="form-group col-md-6 no-padding-right">
                            {{Form::label('url')}}
                            {{Form::text('url','',['class'=>'form-control friendlyUrl','name'=>'url','placeholder'=>'set friendly url...'])}}
                        </div>

                        {{--submit-btn--}}
                        <div class="form-group col-md-12 no-padding-right">
                            {{Form::submit('Update Controller',['class'=>'full-width form-control btn-warning controller-btn text-uppercase','name'=>'pageMaze[head][controller-btn]'])}}
                        </div>

                        {{Form::close()}}

                    </div>

                    {{--scripts and head title--}}
                    <div class="form-group col-md-12">
                        <h2 class="text-uppercase">head & Scripts</h2>
                    </div>

                    {{Form::open()}}

                    <div class="form-group col-md-12 no-padding-right">
                        {{Form::label('title')}}
                        {{Form::text('title','',['class'=>'form-control','placeholder'=>'write the page title...','name'=>'pageMaze[head][title]'])}}

                    </div>

                    <div class="form-group text-capitalize col-md-12 no-padding-right">
                        {{Form::label('Css Tags')}}
                        {{Form::textarea('css','',['class'=>'form-control','placeholder'=>'add css tag / meta / description and more...','name'=>'pageMaze[head][css]'])}}
                    </div>

                    <div class="form-group text-capitalize col-md-12 no-padding-right">
                        {{Form::label('Script tags')}}
                        {{Form::textarea('script','',['class'=>'form-control','placeholder'=>'add script tag / google analyst etc ... ','name'=>'pageMaze[head][script]','rows'=>'10' ,'required'=>'required'])}}
                    </div>

                    {{Form::close()}}

                </aside>


                {{Form::open()}}

                    <div class="col-md-8 page-content">

                        <div class="form-group  text-capitalize">
                            {{Form::label('pageName','page name')}}
                            {{Form::text('pageName','',['placeholder'=>'enter page name','class'=>'col-md-12 form-group pageName','required'=>'required'])}}
                        </div>


                        <div class="form-group">
                            {{Form::label('header')}}
                            {{Form::text('header','',['class'=>'form-control','placeholder'=>'describe your content in few word...','name'=>'pageMaze[content][header]','required'=>'required'])}}

                        </div>

                        <div class="form-group">
                            {{Form::label('body')}}
                            {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'put the page content here...','name'=>'pageMaze[content][body]'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('footer')}}
                            {{Form::textarea('footer','',['class'=>'form-control','placeholder'=>'bottom-text','name'=>'pageMaze[content][footer]'])}}

                        </div>
                        <div class="form-group">
                            {{Form::label('other shit')}}
                            {{Form::text('shit','',['class'=>'form-control','placeholder'=>'bottom-text','name'=>'pageMaze[content][shit]'])}}

                        </div>

                        <div class="form-group">
                            {{Form::submit('add',['class'=>'text-uppercase center-block btn-info btn-lg create-btn form-group full-width','required'=>'required'])}}
                        </div>
                    </div>

                {{Form::close()}}

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>




@section('bottom-scripts')

    <script>
        $('.controller-btn').on('click',function(e){
            e.prevenetDefault();
            console.log(123);
        })

    </script>

@stop