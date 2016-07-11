<section class="user-info-wrapper container">
    <div class="col-md-12 col-sm-12 col-xs-12  user-info">
        <header>
            <h1 class="text-uppercase text-lg-center">{{session('userInfo.fName').' '. session('userInfo.lName')}}</h1>
        </header>
        <div class="content text-lg-center">
            <h4 class="user-role text-capitalize col-md-3 col-sm-3 col-xs-12 no-padding"><strong>role:</strong> admin</h4>
            <h4 class="user-email text-capitalize col-md-5 col-sm-5 col-xs-12 no-padding"><strong>email: </strong> {{session('userInfo.email')}}</h4>
            <h4 class="status text-capitalize col-md-4 col-sm-4  col-xs-12 no-padding"><strong>status:</strong> approved </h4>
            <h3 class="log-out pull-right text-uppercase"><a href="{{route('logout')}}">log-out</a></h3>
        </div>

    </div>
</section>
<div class="clearfix"></div>