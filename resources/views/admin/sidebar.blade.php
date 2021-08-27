 <!-- Left Panel -->

 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">

            <a class="navbar-brand" href="./admin"><img src="{{ asset('images/logo1.png') }}" alt="Logo"></a>

        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <h3 class="menu-title"> Admin Dashboard</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="/categories">Add New </a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/showcategories">Allowed Categories</a></li>
                        <li><i class="fa fa-bars"></i><a href="/hidecategories">Hidden Categories</a></li>
                        <li><i class="fa fa-bars"></i><a href="/frequentcategories">Frequently asked Categories</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Questions</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="/addquestions">Add New </a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/hiddenquestions">Hidden Questions</a></li>
                        <li><i class="fa fa-bars"></i><a href="/questions">All Questions</a></li>
                        <li><i class="fa fa-bars"></i><a href="/questions">Frequently Asked Questions</a></li>

                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Orders</a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="fa fa-id-badge"></i><a href="/orders">All Orders</a></li>
                        <li><i class="fa fa-bars"></i><a href="/pendingorders">Pending Orders</a></li>
                        <li><i class="fa fa-bars"></i><a href="/completedorders">completed Orders</a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Messages</a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="fa fa-id-badge"></i><a href="/messages">All messages</a></li>


                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Search</a>
                    <ul class="sub-menu children dropdown-menu">

                        <li><i class="fa fa-id-badge"></i><a href="/searches">Searchs</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/missing">Missing search</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="/browsers">Browsers</a></li>
                  

                    </ul>
             
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Paypal</a>
                    <ul class="sub-menu children dropdown-menu">

                     
                        <li><i class="fa fa-id-badge"></i><a href="/account">Change Account</a></li>
                      
                  

                    </ul>
               
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
