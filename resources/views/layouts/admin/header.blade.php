 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
    

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image" alt="User Image"> -->

                   <?php  $results = DB::select('SELECT * FROM `usersinfo`  WHERE user_id="' . Cookie::get('user_id'). '"');

                    foreach ($results as $v) {
                        $id = $v->name;

                    }?>
                        <span class="hidden-xs">{{ $id}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           

                            <p>
                                {{ $id}}
                                <small></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
    </ul>
  </nav>