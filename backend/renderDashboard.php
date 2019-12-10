<?php
    require_once('dbConnection.php');

    
    //Connect to the database
    $db = Database::getConnection();

    //End the program if there was a connection error
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    function renderDashboardType() {
        if(isset($_SESSION["is_user"]) && $_SESSION["is_user"]) {
            echo "User Dashboard";
        } else if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
            echo "Administrator Dashboard";
        } else {
            echo "Veterinarian DashBoard";
            echo var_dump($_SESSION);
        }
    }

    function renderFaciltiyName() {
        global $db;
        if(isset($_SESSION["is_admin"]) || isset($_SESSION["is_veterinarian"])) {
            if(isset($_SESSION["facility_name"])) {
                echo $_SESSION["facility_name"];
            } else {
                $id = $_SESSION["facility_id"];
                echo "<script>alert('$id')</script>";

                $result = $db->query(" SELECT name FROM facility WHERE id = '$id' ");
                if($result) {
                    $row = MySQLi_fetch_row($result);  
                    $_SESSION["facility_name"] = $row[0];
                    echo $row[0];
                }
            }
        } else {
            echo "";
        }
    }

    function renderAdminSection() {
        //DISPLAY THE ADMINISTRATOR SECTION IN THE SIDE PANEL
        if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
            echo 
            '<li class="app-sidebar__heading">Administrators</li>
            <li>
                <a href="addEmployee.php" class="mm-active">
                    <i class="metismenu-icon pe-7s-add-user"></i>
                    Add Employee
                </a>
            </li>
            <li>
                <a href="index.html">
                    <i class="metismenu-icon pe-7s-plus"></i>
                    Add Drug
                </a>
            </li>';
        }
    }

    function renderVeterinarianSection() {
        //DISPLAY THE VETERINARIAN SECTION IN THE SIDE PANEL
        if(isset($_SESSION["is_veterinarian"]) && $_SESSION["is_veterinarian"]) {
            echo 
            '<li class="app-sidebar__heading">Veterinarians</li>
            <li>
                <a href="forms-controls.html">
                    <i class="metismenu-icon pe-7s-clock"></i>
                    My Appointments
                </a>
            </li>
            <li>
                <a href="forms-validation.html">
                    <i class="metismenu-icon pe-7s-bandaid"></i>
                    My Cases
                </a>
            </li>
            <li>
                <a href="dashboard-boxes.html">
                    <i class="metismenu-icon pe-7s-look"></i>
                    View Drug Information
                </a>
            </li>';
        } else {

        }
    }

    function renderAnalyticsSection() {
        if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
            echo '
            <li class="app-sidebar__heading">Analytics</li>
                            <li>
                                <a href="#Appointment statistics">
                                    <i class="metismenu-icon pe-7s-graph"></i>
                                    Appointment statistics
                                </a>
                                <a href="#Staff report">
                                    <i class="metismenu-icon pe-7s-graph2"></i>
                                    Staff report
                                </a>
                                <a href="#Drug report">
                                    <i class="metismenu-icon pe-7s-graph3"></i>
                                    Drug report
                                </a>
                                <a href="#Site metrics">
                                    <i class="metismenu-icon pe-7s-display1"></i>
                                    Site metrics
                                </a>
                            </li>
            ';
        }
    }

    function renderDashboardBoxes() {

        if(isset($_SESSION["is_user"]) && $_SESSION["is_user"]) {

                echo
                '<div class="row">
                <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Visits</div>
                                        <div class="widget-subheading">Your visits this year</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>23</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Pets</div>
                                        <div class="widget-subheading">Your number of pets</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>3</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Missed appointments</div>
                                        <div class="widget-subheading">Total missed appointmetns</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>1</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div> ';
            
        } else if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
 
            echo
            '<div class="row">
            <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Clients</div>
                                    <div class="widget-subheading">Facility client this year</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span>123</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Satisfaction rate</div>
                                    <div class="widget-subheading">Total satisfaction rate</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span>97%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card mb-3 widget-content bg-grow-early">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Growth expectancy</div>
                                    <div class="widget-subheading">Total growth expectancy for next year</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span>5%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>';
            
        } else {
            echo
                '<div class="row">
                <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-midnight-bloom">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Cases</div>
                                        <div class="widget-subheading">Your total cases this year</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>321</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Satisfaction rate</div>
                                        <div class="widget-subheading">Total satisfaction rate</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>97%</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-grow-early">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Pets helped</div>
                                        <div class="widget-subheading">Number of happy pets</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>321</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
        }
    }

    function renderStaffCalendar() {
        if(isset($_SESSION["is_admin"]) || isset($_SESSION["is_veterinarian"])) {
            echo
            '<div class="main-card mb-3 card">
            <div class="card-body">
                <div id="calendar-list" class="fc fc-bootstrap4 fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="btn-group"><button type="button" class="fc-prev-button btn btn-primary" aria-label="prev"><span class="fa fa-chevron-left"></span></button><button type="button" class="fc-next-button btn btn-primary" aria-label="next"><span class="fa fa-chevron-right"></span></button></div><button type="button" class="fc-today-button btn btn-primary">today</button></div><div class="fc-right"><div class="btn-group"><button type="button" class="fc-listDay-button btn btn-primary ">list day</button><button type="button" class="fc-listWeek-button btn btn-primary active">list week</button><button type="button" class="fc-month-button btn btn-primary ">month</button></div></div><div class="fc-center"><h2>Mar 11 – 17, 2018</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-listWeek-view fc-list-view card card-primary" style=""><div class="fc-scroller" style="overflow: hidden auto; height: 1126px;"><table class="fc-list-table table"><tbody><tr class="fc-list-heading" data-date="2018-03-11"><td class="table-active" colspan="3"><a class="fc-list-heading-main" data-goto="{&quot;date&quot;:&quot;2018-03-11&quot;,&quot;type&quot;:&quot;day&quot;}">Sunday</a><a class="fc-list-heading-alt" data-goto="{&quot;date&quot;:&quot;2018-03-11&quot;,&quot;type&quot;:&quot;day&quot;}">March 11, 2018</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">all-day</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Conference</a></td></tr><tr class="fc-list-heading" data-date="2018-03-12"><td class="table-active" colspan="3"><a class="fc-list-heading-main" data-goto="{&quot;date&quot;:&quot;2018-03-12&quot;,&quot;type&quot;:&quot;day&quot;}">Monday</a><a class="fc-list-heading-alt" data-goto="{&quot;date&quot;:&quot;2018-03-12&quot;,&quot;type&quot;:&quot;day&quot;}">March 12, 2018</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">all-day</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Conference</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">10:30am - 12:30pm</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Meeting</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">12:00pm</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Lunch</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">2:30pm</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Meeting</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">5:30pm</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Happy Hour</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">8:00pm</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Dinner</a></td></tr><tr class="fc-list-heading" data-date="2018-03-13"><td class="table-active" colspan="3"><a class="fc-list-heading-main" data-goto="{&quot;date&quot;:&quot;2018-03-13&quot;,&quot;type&quot;:&quot;day&quot;}">Tuesday</a><a class="fc-list-heading-alt" data-goto="{&quot;date&quot;:&quot;2018-03-13&quot;,&quot;type&quot;:&quot;day&quot;}">March 13, 2018</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">7:00am</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Birthday Party</a></td></tr><tr class="fc-list-heading" data-date="2018-03-16"><td class="table-active" colspan="3"><a class="fc-list-heading-main" data-goto="{&quot;date&quot;:&quot;2018-03-16&quot;,&quot;type&quot;:&quot;day&quot;}">Friday</a><a class="fc-list-heading-alt" data-goto="{&quot;date&quot;:&quot;2018-03-16&quot;,&quot;type&quot;:&quot;day&quot;}">March 16, 2018</a></td></tr><tr class="fc-list-item"><td class="fc-list-item-time ">4:00pm</td><td class="fc-list-item-marker "><span class="fc-event-dot"></span></td><td class="fc-list-item-title "><a>Repeating Event</a></td></tr></tbody></table></div></div></div></div>
            </div>
        </div>';
        }
    }
?>