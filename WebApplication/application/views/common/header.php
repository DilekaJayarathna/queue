<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="app-header white box-shadow">
    <div class="navbar">
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link" href="" data-toggle="dropdown"
                   aria-expanded="false"><i class="material-icons"></i> <span
                            class="label label-sm up warn">3</span></a>
                <div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow">
                    <div class="scrollable" style="max-height: 220px">
                        <ul class="list-group list-group-gap m-a-0">
                            <li class="list-group-item black lt box-shadow-z0 b"><span class="pull-left m-r"><img
                                            src="<?php echo base_url() ?>assets/images/a0.jpg" alt="..."
                                            class="w-40 img-circle"></span>
                                <span class="clear block">Use awesome <a href=""
                                                                         class="text-primary">animate.css</a><br><small
                                            class="text-muted">10 minutes ago</small></span>
                            </li>
                            <li class="list-group-item black lt box-shadow-z0 b"><span class="pull-left m-r"><img
                                            src="<?php echo base_url() ?>assets/images/a1.jpg" alt="..."
                                            class="w-40 img-circle"></span>
                                <span class="clear block"><a href=""
                                                             class="text-primary">Joe</a> Added you as friend<br><small
                                            class="text-muted">2 hours ago</small></span>
                            </li>
                            <li class="list-group-item dark-white text-color box-shadow-z0 b"><span
                                        class="pull-left m-r"><img src="<?php echo base_url() ?>assets/images/a2.jpg"
                                                                   alt="..."
                                                                   class="w-40 img-circle"></span> <span
                                        class="clear block"><a href="" class="text-primary">Danie</a> sent you a message<br><small
                                            class="text-muted">1 day ago</small></span></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link p-l b-l" href="" data-toggle="dropdown"><i class="material-icons"></i></a>
                <div class="dropdown-menu dropdown-menu-scale pull-right text-color" role="menu">
                    <a class="dropdown-item" href="">Action</a> <a class="dropdown-item" href="">Another action</a> <a
                            class="dropdown-item" href="">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="">Separated link</a>
                </div>
            </li>
        </ul>
        <div class="collapse navbar-toggleable-sm" id="navbar-5">
            <form class="navbar-form form-inline navbar-item m-l v-m" role="search">
                <div class="form-group l-h m-a-0">
                    <div class="input-group"><input type="text" class="form-control b-a form-control-sm"
                                                    placeholder="Search..."> <span class="input-group-btn"><button
                                    type="submit" class="btn btn-sm btn-default b-a no-shadow"><i
                                        class="fa fa-search"></i></button></span></div>
                </div>
            </form>
        </div>
    </div>
</div>