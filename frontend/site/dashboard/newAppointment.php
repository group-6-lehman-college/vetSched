<!doctype html>
<html lang="en">

<head>
    <?php 
        require_once("../../../backend/checkSession.php");	//Check if the user is logged in
        require_once("../../../backend/renderDashboard.php");   //Renders the dashboard's side panel sections
        
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="./main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
            <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-link-icon fa pe-7s-home"> </i>
                                Home
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg"
                                                alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">MY
                                                Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Help</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item" onclick="location.href='../../../backend/logout.php';">Log Out</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <?php
                                            //Display the user's name
                                            if(isset($_SESSION["first_name"], $_SESSION["last_name"])) {
                                                echo $_SESSION["first_name"] . " " . $_SESSION["last_name"];      
                                            } else {
                                                echo "No display name";
                                            }
                                        ?>
                                    </div>
                                    <div class="widget-subheading">
                                        <?php
                                            renderFaciltiyName();
                                        ?>
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button"
                                        class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <?php
                                //DISPLAY THE ADMINISTRATOR SECTION IN THE SIDE PANEL
                                renderAdminSection();
                            ?>
                            <li class="app-sidebar__heading">Pets</li>
                              <li>
                                  <a href="#pets">
                                      <i class="metismenu-icon pe-7s-piggy"></i>
                                      My pets
                                  </a>
                              </li>
                            <li class="app-sidebar__heading">APPOINTMENTS</li>
                            <li>
                                <a href="dashboard-boxes.html">
                                    <i class="metismenu-icon pe-7s-date"></i>
                                    New Appointment
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-boxes.html">
                                    <i class="metismenu-icon pe-7s-look"></i>
                                    View appointments
                                </a>
                            </li>
                            <?php
                                //DISPLAY THE VETERINARIAN SECTION IN THE SIDE PANEL
                                renderVeterinarianSection();
                            ?>
                            <?php
                                //DISPLAY THE ANALYTICS SECTION IN THE SIDE PANEL
                                renderAnalyticsSection();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
            <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph text-success">
                                        </i>
                                    </div>
                                    <div>New Appointment
                                        <div class="page-title-subheading">Build whatever layout you need with our Architect framework.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Example Tooltip">
                                        <i class="fa fa-star"></i>
                                    </button>
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Buttons
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Inbox
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            Book
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-picture"></i>
                                                        <span>
                                                            Picture
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a disabled="" href="javascript:void(0);" class="nav-link disabled">
                                                        <i class="nav-link-icon lnr-file-empty"></i>
                                                        <span>
                                                            File Disabled
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>    </div>
                        </div>            
                        <div class="tab-content">
                            
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Grid</h5>
                                        <form class="" action="../../../backend/addAppointmentBackend.php" method="POST">
                                            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Doctor</label>
                                                <div class="col-sm-10"><select name="doctor" id="exampleSelect" class="form-control">
                                                <option value="8">Rachel Parker</option>
                                                <option value="9">Ian Smith</option>
                                                <option value="10">Alicia Henderson</option>
                                                <option value="14">John Doe</option>
                                                </select></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Location</label>
                                                <div class="col-sm-10"><select name="location_id" id="exampleSelect" class="form-control">
                                                <option value="1">James Herriot Veterinary Clinic</option>
                                                <option value="1">Debbye Turner Veterinary Clinic</option>
                                                <option value="1">Louis J. Camuti Veterinary Clinic</option>
                                                <option value="1">Harry Cooper Veterinary Clinic</option>
                                                </select></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10"><input name="date" type="date"" id="exampleSelect"
                                                value="2019-12-09" min="2019-12"  max="2020-1"class="form-control"></div>
                                            </div>
                                            
                                            <div class="position-relative row form-group"><label for="exampleSelect" class="col-sm-2 col-form-label">Time</label>
                                                <div class="col-sm-10"><select name="time" id="exampleSelect" class="form-control">
                                                <option value="09:00:00">9:00 AM</option>
                                                <option value="09:30:00">9:30 AM</option>
                                                <option value="10:00:00">10:00 AM</option>
                                                <option value="10:30:00">10:30 AM</option>
                                                <option value="11:30:00">11:00 AM</option>
                                                <option value="11:30:00">11:30 AM</option>
                                                <option value="12:00:00">12:00 PM</option>
                                                <option value="12:30:00">12:30 PM</option>
                                                <option value="13:00:00">1:00 PM</option>
                                                <option value="13:30:00">1:30 PM</option>
                                                <option value="14:00:00">2:00 PM</option>
                                                <option value="14:30:00">2:30 PM</option>
                                                <option value="15:00:00">3:00 PM</option>
                                                <option value="15:30:00">3:30 PM</option>
                                                <option value="16:00:00">4:00 PM</option>
                                                <option value="16:30:00">4:30 PM</option>
                                                <option value="17:00:00">5:00 PM</option>
                                                <option value="17:30:00">5:30 PM</option>
                                                <option value="18:00:00">6:00 PM</option>
                                                <option value="18:30:00">6:30 PM</option>
                                                <option value="19:00:00">7:00 PM</option>
                                                <option value="19:30:00">7:30 PM</option>
                                                <option value="20:00:00">8:00 PM</option>

                                                </select></div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-secondary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
            <script type="text/javascript" src="./assets/scripts/main.js"></script>
        </div>
    </div>
    
    
</body>

</html>