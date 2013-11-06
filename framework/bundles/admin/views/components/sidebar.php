<div id="sidebar">
    <div id="sidebar-shortcuts">
        <div id="sidebar-shortcuts-large">
            <button class="btn btn-small btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-small btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-small btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-small btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!--#sidebar-shortcuts-->

    <ul class="nav nav-list">
        <li class="active">
            <a href="index.html">
                <i class="icon-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-home"></i>
                <span>Villa</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo URL::to_route('VillaHome');?>">
                        <i class="icon-plus"></i>
                        View/Edit
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL::to_route('VillaAdd');?>">
                        <i class="icon-plus"></i>
                        Add New
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-home"></i>
                <span>Home</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo URL::to_route('Posts');?>">
                        <i class="icon-plus"></i>
                        Post
                    </a>
                </li>
            </ul>
        </li>
        <li> <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-location-arrow"></i>
                <span>Locations</span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo URL::to_route('LocationAdd');?>">
                        <i class="icon-plus"></i>
                        Add Location
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL::to_route('LocationView'); ?>">
                        <i class="icon-plus"></i>
                        Edit Location
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-picture"></i>
                <span>Gallery</span>
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">

                <li>
                    <a href="<?php echo URL::to_route('CreateAlbum') ?>">
                        <i class="icon-plus"></i>
                        Add Album
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL::to_route('ViewAlbum') ?>">
                        <i class="icon-plus"></i>
                        View Albums
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-picture"></i>
                <span>Vacation Idea</span>
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php  echo URL::to_route('vacation_category'); ?>">
                        <i class="icon-plus"></i>
                        Category
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-plus"></i>

                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!--/.nav-list-->

				