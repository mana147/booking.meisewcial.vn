<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- calendar -->
<link href='fullcalendar-scheduler/lib/main.css' rel='stylesheet' />
<script src='fullcalendar-scheduler/lib/main.js'></script>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://booking.meisewcial.vn/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Booking<sup>0.1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="https://booking.meisewcial.vn/dashboard">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <i class="fas fa-fw fa-table"></i>
                    <span>Calendar Booking</span>
                </a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="template/img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li style="display: none;" class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li style="display: none;" class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="template/img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="template/img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="template/img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $info_user_nicename ?></span>
                                <img class="img-profile rounded-circle" src="template/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Booking - Pole Dancing</h1>
                    </div>

                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Open modal
                    </button>

                    <!-- Calendar full -->
                    <style>
                    </style>

                    <div id='calendar'></div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');

                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                                initialView: 'resourceTimeGridTwoDay',
                                initialDate: '2020-09-07',
                                editable: true,
                                selectable: true,
                                dayMaxEvents: true, // allow "more" link when too many events
                                dayMinWidth: 200,
                                headerToolbar: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'resourceTimeGridTwoDay,resourceTimeGridDay,resourceTimeGridWeek,dayGridMonth'
                                },
                                views: {
                                    resourceTimeGridTwoDay: {
                                        type: 'resourceTimeGrid',
                                        duration: {
                                            days: 7
                                        },
                                        buttonText: '7 days',
                                    }
                                },

                                //// uncomment this line to hide the all-day slot
                                //allDaySlot: false,

                                resources: [{
                                        id: 'a',
                                        title: 'Room - Pole Dancing - Hồ Chí Minh City'
                                    },
                                    // { id: 'b', title: 'Room - Pole Dancing - Hà Nội City' },
                                ],

                                events: [{
                                    id: '2',
                                    resourceId: 'a',
                                    start: '2020-09-07T09:00:00',
                                    end: '2020-09-07T14:00:00',
                                    title: 'event 2'
                                }, ],

                                select: function(arg) {

                                    $("#myModal").modal();

                                    console.log(
                                        'select',
                                        arg.startStr,
                                        arg.endStr,
                                        arg.resource ? arg.resource.id : '(no resource)'
                                    );
                                },
                                dateClick: function(arg) {
                                    $("#myModal").modal();

                                    // console.log(
                                    //     'dateClick',
                                    //     arg.date,
                                    //     arg.resource ? arg.resource.id : '(no resource)'
                                    // );
                                }
                            });

                            calendar.render();
                        });
                    </script>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- booking Modal -->
    <div class="modal" id="myModal">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header modal-frm-header">

                    <h3 class="modal-title modal-frm-title">
                        <span>Thêm lịch tập </span>
                        <span style="color: dimgray;"> - Phòng A</span>
                        <div class="title-warning-isbook"></div>
                    </h3>

    
                </div>

                <div class="modal-body modal-frm-book-body">
                    <form novalidate="" class="ng-pristine ng-invalid ng-touched" data-an-count="1" data-an-form-handler="2el4n">
                        <div class="form-group"><input autocomplete="off" autofocus="true" class="form-control custom-input ng-pristine ng-invalid ng-touched" name="tieude" placeholder="Tiêu đề" required="" type="text">
                            <div class="has-danger">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="m-demo__preview m-demo__preview--btn gr-btn-check">
                                <!---->
                                <!---->
                                <!----><a class="btn btn-sm m-btn m-btn--icon ng-star-inserted btn-check-nhom active" href="javascript:;"><span><span>Họp nhóm</span></span></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a class="btn btn-sm m-btn m-btn--icon ng-star-inserted btn-check-daotao" href="javascript:;"><span><span>Đào tạo</span></span></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a class="btn btn-sm m-btn m-btn--icon ng-star-inserted btn-check-phongvan" href="javascript:;"><span><span>Phỏng vấn</span></span></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a class="btn btn-sm m-btn m-btn--icon btn-check-conference ng-star-inserted" href="javascript:;"><span class="btn-khac"><span>Họp khác</span></span></a>
                                <!---->
                            </div>
                        </div>
                        <div class="form-group form-left-img"><img alt="time" class="ng-star-inserted " src="/assets/common/images/icon-book/phuongthuchop.svg">
                            <div class="notification-book" style="justify-content: space-between;"><span>Hình thức họp <span style="color: red;">*</span> :</span><span class="mr-3"><label class="check-custom ant-checkbox-wrapper ng-untouched ng-pristine ng-valid" name="online" nz-checkbox=""><span class="ant-checkbox"><input class="ant-checkbox-input ng-untouched ng-pristine ng-valid" type="checkbox"><span class="ant-checkbox-inner"></span></span><span style="display: none;"></span></label> Họp Offline </span><span class="mr-3"><label class="check-custom ant-checkbox-wrapper ng-untouched ng-pristine ng-valid" name="offline" nz-checkbox=""><span class="ant-checkbox"><input class="ant-checkbox-input ng-untouched ng-pristine ng-valid" type="checkbox"><span class="ant-checkbox-inner"></span></span><span style="display: none;"></span></label> Họp Online </span></div>
                            <div class="has-danger mb-2">
                                <!---->
                            </div>
                            <div class="notification-book mb-2">
                                <ng-select bindlabel="ten" bindvalue="id" class="custom-select disable-icon ng-select-focused ng-select ng-select-multiple ng-select-searchable ng-untouched ng-pristine ng-valid" multiple="true" name="hinhThucHop" placeholder="Chọn phương thức họp *" role="listbox" style="outline: none; ">
                                    <div class="ng-select-container">
                                        <div class="ng-value-container">
                                            <div class="ng-placeholder">Chọn phương thức họp *</div>
                                            <!---->
                                            <!---->
                                            <div class="ng-input"><input role="combobox" type="text" autocomplete="a33ce6dc73ff" autocorrect="off" autocapitalize="off" aria-expanded="false"></div>
                                        </div>
                                        <!---->
                                        <!----><span class="ng-arrow-wrapper"><span class="ng-arrow"></span></span>
                                    </div>
                                    <!---->
                                </ng-select>
                            </div>
                            <div class="mb-3 mt-1">
                                <!---->
                            </div>
                            <!---->
                            <div class="has-danger">
                                <!---->
                            </div>
                        </div>
                        <div class="form-group form-left-img"><img alt="time" class="ng-star-inserted " src="/assets/common/images/icon-book/time.svg">
                            <div class="option-time"><a href="javascript:void(0);">
                                    <nz-date-picker class="date-time-select ant-calendar-picker ng-untouched ng-pristine ng-valid" name="ngaydat" nzformat="EEEE, dd/MM/yyyy">
                                        <nz-picker class="ng-tns-c23-30"><span class="ant-calendar-picker  " cdkoverlayorigin="" tabindex="0">
                                                <!---->
                                                <!----><input readonly="" class="ant-calendar-picker-input ant-input ng-star-inserted" placeholder="Chọn thời điểm">
                                                <!---->
                                                <!----><span class="ant-calendar-picker-icon ng-star-inserted"><i class="anticon ng-tns-c23-30 anticon-calendar" nz-icon="" type="calendar"><svg viewBox="64 64 896 896" fill="currentColor" width="1em" height="1em" class="ng-tns-c23-30" data-icon="calendar" aria-hidden="true">
                                                            <path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z">
                                                            </path>
                                                        </svg></i></span>
                                                <!---->
                                                <!---->
                                            </span>
                                            <!---->
                                            <!---->
                                            <!---->
                                        </nz-picker>
                                    </nz-date-picker>
                                </a>
                                <div class="time-select">
                                    <ng-select bindlabel="tenKhung" bindvalue="id" class="custom-select disable-icon ng-select ng-select-single ng-select-searchable ng-pristine ng-valid ng-select-bottom ng-touched" name="starttime" placeholder="Từ" role="listbox">
                                        <div class="ng-select-container ng-has-value">
                                            <div class="ng-value-container">
                                                <div class="ng-placeholder">Từ</div>
                                                <!---->
                                                <!---->
                                                <!---->
                                                <div class="ng-value ng-star-inserted">
                                                    <!---->
                                                    <!----><span aria-hidden="true" class="ng-value-icon left ng-star-inserted">×</span><span class="ng-value-label ng-star-inserted">08 AM</span>
                                                </div>
                                                <!---->
                                                <!---->
                                                <div class="ng-input"><input role="combobox" type="text" autocomplete="a47bf3a6b55d" autocorrect="off" autocapitalize="off" aria-expanded="false"></div>
                                            </div>
                                            <!---->
                                            <!----><span class="ng-arrow-wrapper"><span class="ng-arrow"></span></span>
                                        </div>
                                        <!---->
                                    </ng-select>
                                </div><span class="line">-</span>
                                <div class="time-select">
                                    <ng-select bindlabel="tenKhung" bindvalue="id" class="custom-select disable-icon ng-select ng-select-single ng-select-searchable ng-untouched ng-pristine ng-valid" name="endtime" placeholder="Đến" required="" role="listbox">
                                        <div class="ng-select-container ng-has-value">
                                            <div class="ng-value-container">
                                                <div class="ng-placeholder">Đến</div>
                                                <!---->
                                                <!---->
                                                <!---->
                                                <div class="ng-value ng-star-inserted">
                                                    <!---->
                                                    <!----><span aria-hidden="true" class="ng-value-icon left ng-star-inserted">×</span><span class="ng-value-label ng-star-inserted">09 AM</span>
                                                </div>
                                                <!---->
                                                <!---->
                                                <div class="ng-input"><input role="combobox" type="text" autocomplete="a24ed784db85" autocorrect="off" autocapitalize="off" aria-expanded="false"></div>
                                            </div>
                                            <!---->
                                            <!----><span class="ng-arrow-wrapper"><span class="ng-arrow"></span></span>
                                        </div>
                                        <!---->
                                    </ng-select>
                                </div>
                            </div>
                            <!---->
                            <!---->
                            <div class="">
                                <div class="begin-meeting"><span>Chọn giờ bắt đầu vào họp:</span>
                                    <nz-time-picker class="input-start-meeting ng-tns-c25-29 ant-time-picker ng-untouched ng-pristine ng-valid" nzformat="hh:mm" nzplaceholder=" "><input class="ant-time-picker-input ng-untouched ng-pristine ng-valid" readonly="readonly" type="text" placeholder=" "><span class="ant-time-picker-icon"><i class="anticon ng-tns-c25-29 anticon-clock-circle" nz-icon="" type="clock-circle"><svg viewBox="64 64 896 896" fill="currentColor" width="1em" height="1em" class="ng-tns-c25-29" data-icon="clock-circle" aria-hidden="true">
                                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z">
                                                    </path>
                                                    <path d="M686.7 638.6L544.1 535.5V288c0-4.4-3.6-8-8-8H488c-4.4 0-8 3.6-8 8v275.4c0 2.6 1.2 5 3.3 6.5l165.4 120.6c3.6 2.6 8.6 1.8 11.2-1.7l28.6-39c2.6-3.7 1.8-8.7-1.8-11.2z">
                                                    </path>
                                                </svg></i></span>
                                        <!----><i class="anticon anticon-close-circle ant-time-picker-clear ng-tns-c25-29 ng-star-inserted" nz-icon="" tabindex="-1" theme="fill" type="close-circle" aria-label="clear" title="clear"><svg viewBox="64 64 896 896" fill="currentColor" width="1em" height="1em" class="ng-tns-c25-29" data-icon="close-circle" aria-hidden="true">
                                                <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4-66.1.3c-4.4 0-8-3.5-8-8 0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 0 1-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4 66-.3c4.4 0 8 3.5 8 8 0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2 0 4.4-3.6 8-8 8z">
                                                </path>
                                            </svg></i>
                                        <!---->
                                    </nz-time-picker><span class="sp-time-start">08:00 AM</span>
                                </div>
                            </div>
                            <div class="has-danger">
                                <!---->
                            </div>
                            <div class="has-danger">
                                <!---->
                            </div>
                            <!---->
                        </div>
                        <!---->
                        <!---->
                        <div class="form-group form-left-img ng-star-inserted"><img alt="ghe" class="ng-star-inserted " src="/assets/common/images/icon-book/address-fff.svg">
                            <ng-select bindlabel="tenPhong" bindvalue="id" class="custom-select disable-icon ng-select ng-select-single ng-select-searchable ng-pristine ng-valid ng-select-bottom ng-touched" name="phonghop" placeholder="Chuyển phòng" required="" role="listbox">
                                <div class="ng-select-container ng-has-value">
                                    <div class="ng-value-container">
                                        <div class="ng-placeholder">Chuyển phòng</div>
                                        <!---->
                                        <!---->
                                        <!---->
                                        <div class="ng-value ng-star-inserted">
                                            <!---->
                                            <!----><span class="ng-star-inserted">Phòng A | Tầng 17, Tòa Hapulico, Hà Nội
                                            </span>
                                        </div>
                                        <!---->
                                        <!---->
                                        <div class="ng-input"><input role="combobox" type="text" autocomplete="aceded0376f9" autocorrect="off" autocapitalize="off" aria-expanded="false"></div>
                                    </div>
                                    <!---->
                                    <!----><span class="ng-arrow-wrapper"><span class="ng-arrow"></span></span>
                                </div>
                                <!---->
                            </ng-select>
                            <!---->
                        </div>
                        <div class="form-group form-left-img"><img alt="ghe" class="ng-star-inserted " src="/assets/common/images/icon-book/user.svg">
                            <ng-select bindlabel="tenNhanVien" class="custom-select disable-icon ng-select ng-select-single ng-select-typeahead ng-select-searchable ng-pristine ng-valid ng-select-bottom ng-touched" name="nhansu" placeholder="Thêm người tham gia" role="listbox">
                                <div class="ng-select-container">
                                    <div class="ng-value-container">
                                        <div class="ng-placeholder">Thêm người tham gia</div>
                                        <!---->
                                        <!---->
                                        <div class="ng-input"><input role="combobox" type="text" autocomplete="a17509b15266" autocorrect="off" autocapitalize="off" aria-expanded="false"></div>
                                    </div>
                                    <!---->
                                    <!----><span class="ng-arrow-wrapper"><span class="ng-arrow"></span></span>
                                </div>
                                <!---->
                            </ng-select>
                        </div>
                        <div class="form-group ">
                            <ul class="list-users">
                                <!---->
                            </ul>
                        </div>
                        <div class="form-group form-left-img"><img alt="ghe" class="ng-star-inserted " src="/assets/common/images/icon-book/note.svg"><textarea class="form-control ng-pristine ng-valid ng-touched" name="LyDo" placeholder="Nội dung" rows="3" spellcheck="false"></textarea></div>
                        <div class="warper-inform form-group form-left-img"><img alt="ghe" class="ng-star-inserted " src="/assets/common/images/icon-book/thong-bao.svg">
                            <div class="notification-book"><label class="check-custom ant-checkbox-wrapper ng-untouched ng-pristine ng-valid" name="checkthongbao" nz-checkbox=""><span class="ant-checkbox"><input class="ant-checkbox-input ng-untouched ng-pristine ng-valid" type="checkbox"><span class="ant-checkbox-inner"></span></span><span style="display: none;"></span></label><span>Thông báo </span><input autocomplete="off" class="input-inform form-control number-select text-right mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine" matinput="" min="1" name="thoigianthongbao" type="text" id="mat-input-4" aria-invalid="false" aria-required="false" value="" disabled=""><span> phút trước cuộc
                                    họp</span></div>
                            <div class="has-danger">
                                <!---->
                            </div>
                            <div class="notification-book"><label class="check-custom ant-checkbox-wrapper ng-untouched ng-pristine ng-valid" name="checkSendMail" nz-checkbox=""><span class="ant-checkbox ant-checkbox-disabled"><input class="ant-checkbox-input ng-untouched ng-pristine" type="checkbox" disabled=""><span class="ant-checkbox-inner"></span></span><span style="display: none;"></span></label><span>Gửi email cho người tham gia</span></div>
                        </div>
                        <div class="warper-inform form-group form-left-img">
                            <div><img alt="thiet-bi" class="ng-star-inserted " src="/assets/common/images/icon-book/icon-thietbi.svg">
                                <div class="notification-book"><a class="title-thietbi" href="javascript:;"> Thiết bị hỗ trợ
                                    </a>
                                    <div class="img-hotro"><img alt="" class="img-tamgiac" src="/assets/common/images/icon-book/icon-tamgiac.svg"></div>
                                </div>
                                <div class="popup-thietbi" hidden="">
                                    <ul class="thietbi-phu flex-wrap">
                                        <!---->
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/01_TypeC_to_HDMI_VGA.png"><span>Type
                                                C to HDMI, VGA</span></li>
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/Mini_Port.png"><span>Mini Display
                                                port to HDMI, VGA</span></li>
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/03_HDMI_to_VGA.png"><span>HDMI to
                                                VGA</span></li>
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/Loa_va_Mic.png"><span>Loa &amp; MIC
                                                họp Online</span></li>
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/O_dien_mang.png"><span>Ổ điện
                                                mạng</span></li>
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/05_USB_to_LAN.png"><span>USB to
                                                LAN</span></li>
                                        <li class="li-thietbiphu pb-3 mr-3 ng-star-inserted"><img alt="" class="position-relative mw-100 mr-3" style="top: auto; left: auto;" src="https://erp.admicro.vn/bookphong/icon/04_TypeC_to_LAN.png"><span>Type C to
                                                LAN</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-group-button">
                            <!---->
                            <!----><button class="btn btn-success m-btn m-btn--icon m-btn--pill ng-star-inserted" type="submit"><span><span>Tạo lịch họp</span></span></button>
                            <!---->
                            <!---->
                            <!----><button class="btn btn-secondary m-btn m-btn--icon m-btn--pill ng-star-inserted" type="button"><span><span>Quay lại</span></span></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



</body>