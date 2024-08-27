<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" width="22" height="22">
            </span>
            <span class="logo-lg">
                <img class="rounded-circle mt-3" src="<?php echo e(URL::asset('build/images/MFC-Logo.jpg')); ?>" alt=""
                    height="80" width="80">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
        <p class="text-white mt-1">MFC Portal</p>
    </div>

    

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(preg_match('/^dashboards$/', Request::path()) ? 'active' : ''); ?>"
                        href="<?php echo e(route('dashboards.index')); ?>">
                        <i class="ri-dashboard-2-line"></i> <span><?php echo app('translator')->get('translation.dashboards'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(preg_match('/^dashboard\/announcement/', Request::path()) ? 'active' : ''); ?>"
                        href="<?php echo e(route('announcements.index')); ?>">
                        <i class="ri-megaphone-line"></i> <span><?php echo app('translator')->get('translation.announcements'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(preg_match('/^dashboard\/directory/', Request::path()) ? 'active' : 'false'); ?>"
                        href="#directory" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="directory">
                        <i class="ri-map-pin-user-line"></i><span><?php echo app('translator')->get('translation.directory'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown <?php echo e(preg_match('/^dashboard\/directory/', Request::path()) ? 'show' : ''); ?>"
                        id="directory">
                        <ul class="nav nav-sm flex-column">
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/directory\/kids/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users.index', ['section' => 'kids'])); ?>"
                                    class="nav-link <?php echo e(preg_match('/^dashboard\/directory\/kids/', Request::path()) ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.kids'); ?></a>
                            </li>
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/directory\/youth/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users.index', ['section' => 'youth'])); ?>"
                                    class="nav-link <?php echo e(preg_match('/^dashboard\/directory\/youth/', Request::path()) ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.youth'); ?></a>
                            </li>
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/directory\/singles/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users.index', ['section' => 'singles'])); ?>"
                                    class="nav-link <?php echo e(preg_match('/^dashboard\/directory\/singles/', Request::path()) ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.singles'); ?></a>
                            </li>
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/directory\/servants/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users.index', ['section' => 'servants'])); ?>"
                                    class="nav-link <?php echo e(preg_match('/^dashboard\/directory\/servants/', Request::path()) ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.servants'); ?></a>
                            </li>
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/directory\/handmaids/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users.index', ['section' => 'handmaids'])); ?>"
                                    class="nav-link <?php echo e(preg_match('/^dashboard\/directory\/handmaids/', Request::path()) ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.handmaids'); ?></a>
                            </li>
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/directory\/couples/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('users.index', ['section' => 'couples'])); ?>"
                                    class="nav-link <?php echo e(preg_match('/^dashboard\/directory\/couples/', Request::path()) ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.couples'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(preg_match('/^dashboard\/events/', Request::path()) ? 'active' : ''); ?>"
                        href="#events" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="events">
                        <i class="ri-calendar-check-line"></i> <span><?php echo app('translator')->get('translation.event_management'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown <?php echo e(preg_match('/^dashboard\/events/', Request::path()) ? 'show' : ''); ?>"
                        id="events">
                        <ul class="nav nav-sm flex-column">
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/events/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('events.index')); ?>"
                                    class="nav-link <?php echo e('dashboard/events' === Request::path() ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.list'); ?></a>
                            </li>
                            <li
                                class="nav-item <?php echo e(preg_match('/^dashboard\/events/', Request::path()) ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('events.calendar')); ?>"
                                    class="nav-link <?php echo e('dashboard/events/calendar' === Request::path() ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.calendar'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link <?php echo e(preg_match('/^dashboard\/tithes/', Request::path()) ? 'active' : ''); ?>"
                        href="<?php echo e(route('tithes.index')); ?>">
                        <i class="ri-bubble-chart-line"></i> <span><?php echo app('translator')->get('translation.tithes'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="ri-folder-user-line"></i> <span><?php echo app('translator')->get('translation.attendance_report'); ?></span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span><?php echo app('translator')->get('translation.management'); ?></span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="ri-shield-user-line"></i> <span><?php echo app('translator')->get('translation.roles'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="ri-body-scan-line"></i> <span><?php echo app('translator')->get('translation.permissions'); ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>