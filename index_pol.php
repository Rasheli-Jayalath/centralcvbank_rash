<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CV Bank</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <style>



  </style>


</head>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">CV<span class="text-black fw-bold"> BANK</span></h1>
            <h3 class="welcome-sub-text">Dashboard</h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block">
            <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
              <a class="dropdown-item py-3" >
                <p class="mb-0 font-weight-medium float-left">Select category</p>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle </p>
                  <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
                  <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
                  <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
                  <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
              <i class="icon-mail icon-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-alert m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                  <p class="fw-light small-text mb-0"> Just now </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-settings m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                  <p class="fw-light small-text mb-0"> Private message </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-airballoon m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                  <p class="fw-light small-text mb-0"> 2 days ago </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown"> 
            <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                  <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                  <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                  <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>

      <!-- NAV STARTS -->
      <!-- NAV STARTS -->
      <!-- NAV STARTS -->
      <!-- NAV STARTS -->

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
        
          <!-- <li class="nav-item nav-category">Forms and Datas</li> -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Submit</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pages/cv-bank/search.php" >
              <i class="menu-icon mdi mdi-account-search"></i>
              <span class="menu-title">Search</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/cv-bank/interactive.php">
              <i class="menu-icon mdi mdi-binoculars"></i>
              <span class="menu-title">Interactive Search</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pages/cv-bank/latest-cvs.php?v=latest">
              <i class="menu-icon mdi mdi-autorenew"></i>
              <span class="menu-title">Latest CVs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pages/cv-bank/modified-cvs.php?v=modif" >
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Modified CVs</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="#bdprofile" >
              <i class="menu-icon mdi mdi-collage"></i>
              <span class="menu-title">BD Profile</span>
            </a>
          </li>
          
          
          
        </ul>
      </nav>

      <!-- partial -->

      <!-- NAV ENDS -->
       <!-- NAV ENDS -->
        <!-- NAV ENDS -->
         <!-- NAV ENDS -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
               
                <div class="tab-content tab-content-basic">

                  <!-- CV BANK TABS -->
                   <!-- CV BANK TABS -->
                    <!-- CV bank Search Tab -->

                    <!-- End CV bank Search Tab id="search" -->


                     <!-- CV BANK TABS -->
                   <!-- CV BANK TABS -->
                    <!-- CV BANK TABS -->

                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between" style="text-align: center;">
                          <div >
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                          </div>
                          <div >
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                          </div>
                          <div >
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                          </div>

                          <div style="display: flex; justify-content: center;align-items: center; height: 250px;width: 210px; background-image: linear-gradient(to bottom right, #757F9A, #D7DDE8); padding: 30px;border-radius: 20px;">
                            <div>
                            <!-- <img src="images/cvbank/smecw.png" height="50px"/> -->
                            <!-- <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">...........</p> -->
                            <!-- <h1  style="font-weight: 900;color: white">......</h1> -->
                          </div>
                          </div>

                          <div style="display: flex; justify-content: center;align-items: center; height: 250px;width: 210px; background-image: linear-gradient(to bottom right, #7F7FD5, #91EAE4); padding: 30px;border-radius: 20px;">
                            <div>
                            <img src="images/cvbank/smecw.png" height="50px"/>
                            <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">SMEC India</p>
                            <h1  style="font-weight: 900;color: white">540</h1>
                          </div>
                          </div>
                          <div style="display: flex; justify-content: center;align-items: center;height: 250px;width: 210px; background-image: linear-gradient(to bottom right, #FF5F6D, #FFC371); padding: 30px;border-radius: 20px;">
                            <div>
                            <img src="images/cvbank/smecw.png" height="50px"/>
                            <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">SMEC</p>
                            <h1  style="font-weight: 900;color: white">0</h1>
                          </div>
                          </div>
                          <div style="display: flex; justify-content: center;align-items: center; height: 250px;width: 210px; background-image: linear-gradient(to bottom right, #4e54c8, #8f94fb); padding: 30px;border-radius: 20px;">
                            <div>
                            <img src="images/cvbank/sjw.png" height="50px"/>
                            <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">Surbana Jurong</p>
                            <h1  style="font-weight: 900;color: white">22</h1>
                          </div>
                          </div>

                          <div style="display: flex; justify-content: center;align-items: center; height: 250px;width: 210px; background-image: linear-gradient(to bottom right, #283c86, #45a247); border-radius: 20px;">
                            <img src=""/>
                            <div>
                            <p style="font-size: 20px;color: white;font-weight: 500;">Other</p>
                            <h1  style="font-weight: 900;color: white">1962</h1>
                          </div>
                          </div>
                          
                          <div style="display: flex; justify-content: center;align-items: center; height: 250px;width: 210px; background-image: linear-gradient(to bottom right, #42275a, #734b6d); padding: 30px;border-radius: 20px;">
                            <div>
                            <!-- <img src="images/cvbank/smecw.png" height="50px"/> -->
                            <!-- <p style="font-size: 20px; margin-top: 30px;color: white;font-weight: 500;">...........</p> -->
                            <!-- <h1  style="font-weight: 900;color: white">......</h1> -->
                          </div>
                          </div>

                          <div >
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                          </div>
                          <div >
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                          </div>
                          <div >
                            <p class="statistics-title"></p>
                            <h3 class="rate-percentage"></h3>
                          </div>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="row">

                      <!-- Last 4 week CV Entry -->
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Last 4 Week CV Entry Progress</h4>
                                   <h5 class="card-subtitle card-subtitle-dash"></h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div id="weeklychartid"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Last 4 week CV Entry -->

                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">


                           <!-- CV wise Entries -->
                           <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                      
                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-earth" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2"  style="font-size: 13px;">	Foreigners</p>
                                        <a href="#"><h4 class="mb-0 fw-bold" style="font-size: 25px;color: gold;">411</h4></a>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    
                                      
                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-check-all" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2" style="font-size: 13px;">Verified CVs</p>
                                        <a href="#"><h4 class="mb-0 fw-bold" style="font-size: 30px;color: gold;" >364</h4></a>
                                      </div>
                                  </div>
                                </div>

                                <div class="row" style="margin-top: 10px;">
                                  <div class="col-sm-6">
                                    
                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-tie" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2" style="font-size: 13px;">Ph.D. Doctors</p>
                                        <a href="#"><h4 class="mb-0 fw-bold" style="font-size: 30px;color: gold;">76</h4></a>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">

                                      <div class="bg-primary" style="color: white;padding: 10px;border-radius: 15px;text-align: center;">
                                        <i class="mdi mdi-sync-alert" style="font-size: 30px;"></i>
                                        <p class="text-small mb-2" style="font-size: 13px;">Pending CVs</p>
                                       <a href="#"> <h4 class="mb-0 fw-bold" style="font-size: 30px;color: gold;">108</h4></a>
                                      </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                          <!-- CV wise Entries -->


                          <!-- Todays Entries -->
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded" style="background-image: linear-gradient(to bottom right, #02aab0 , #00cdac );">
                              <div class="card-body pb-0">
                                <h4 class="card-title card-title-dash mb-4" style=" font-size: 25px;text-align: center; color: white;">Today's Entries</h4>
                                
                                <div class="row" style="margin-bottom: 15px;margin-left: 5px;">

                                  <div class="col-sm-3" style="background-color: aliceblue;padding: 5px;border-radius: 15px;text-align: center;">
                                    <p class="status-summary-ight-white mb-1" style="font-size: 16px;color: black;font-weight: 600;margin-top: 12px;">New Entries</p>
                                    <h2 class="text-info" style="margin-top: 10px;">0</h2>
                                  </div>

                                  <div class="col-sm-4" style="background-color: aliceblue;padding: 5px;border-radius: 15px;text-align: center;margin-left: 10px;">
                                    <p class="status-summary-ight-white mb-1" style="font-size: 16px;color: black;font-weight: 600;margin-top: 12px;">Modified Entries</p>
                                    <h2 class="text-info" style="margin-top: 10px;">0</h2>
                                  </div>

                                  <div class="col-sm-4" style="background-color: aliceblue;padding: 5px;border-radius: 15px;text-align: center;margin-left: 10px">
                                    <p class="status-summary-ight-white mb-1" style="font-size: 16px;color: black;font-weight: 600;margin-top: 12px;">Total CVs</p>
                                    <h2 class="text-info" style="margin-top: 10px;">3837</h2>
                                    <!-- <p class="status-summary-ight-white mb-1" style="color: gray;">50% Complete</p> -->
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Todays Entries -->

                         

                          
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-8 d-flex flex-column">

                        <!-- CV Status -->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">CV Status</h4>
                                   <p class="card-subtitle card-subtitle-dash">You have 50+ new CV requests</p>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new CV</button>
                                  </div>
                                </div>
                                <div class="table-responsive  mt-1">
                                  <table class="table select-table">
                                    <thead>
                                      <tr>
                                        
                                        <th>Employee</th>
                                        <th>Sector</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        
                                        <td>
                                          <div class="d-flex ">
                                            <img src="images/faces/face1.jpg" alt="">
                                            <div>
                                              <h6>Chetan Prabhash</h6>
                                              <p>Senior Electrical Engineer</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Electrical</h6>
                                          <p>India</p>
                                        </td>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">79%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td>
                                        <td><button class="btn btn-primary btn-sm" style="color: whitesmoke;">View</button></td>
                                      </tr>
                                      <tr>
                                       
                                        <td>
                                          <div class="d-flex">
                                            <img src="images/faces/face4.jpg" alt="">
                                            <div>
                                              <h6>Mustafa Kamal</h6>
                                              <p>Senior Engineer</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Electrical</h6>
                                          <p>Bangladesh</p>
                                        </td>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td>
                                        <td><button class="btn btn-primary btn-sm" style="color: whitesmoke;">View</button></td>
                                      </tr>
                                      <tr>
                                        
                                        <td>
                                          <div class="d-flex">
                                            <img src="images/faces/face3.jpg" alt="">
                                            <div>
                                              <h6>John Saxon Kepple</h6>
                                              <p>Electrical Engineer</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Electrical</h6>
                                          <p>New Zealand</p>
                                        </td>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-warning">In progress</div></td>
                                        <td><button class="btn btn-primary btn-sm" style="color: whitesmoke;">View</button></td>
                                      </tr>
                                      <tr>
                                       
                                        <td>
                                          <div class="d-flex">
                                            <img src="images/faces/face4.jpg" alt="">
                                            <div>
                                              <h6>Cyril Wijewardana Wijepale Palihawadana</h6>
                                              <p>Electrical Engineer</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Electrical</h6>
                                          <p>Sri Lanka</p>
                                        </td>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-danger">Pending</div></td>
                                        <td><button class="btn btn-primary btn-sm" style="color: whitesmoke;">View</button></td>
                                      </tr>
                                      <tr>
                                        
                                        <td>
                                          <div class="d-flex">
                                            <img src="images/faces/face5.jpg" alt="">
                                            <div>
                                              <h6>Roel Benida Superales</h6>
                                              <p>Electrical Engineer</p>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>Electrical</h6>
                                          <p>Philippines</p>
                                        </td>
                                        <td>
                                          <div>
                                            <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                              <p class="text-success">65%</p>
                                              <p>85/162</p>
                                            </div>
                                            <div class="progress progress-md">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                          </div>
                                        </td>
                                        <td><div class="badge badge-opacity-success">Completed</div></td>
                                        <td><button class="btn btn-primary btn-sm" style="color: whitesmoke;">View</button></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- CV Status -->

                        <!-- CV Sector Wise -->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded" style="background-image: linear-gradient(to bottom right, #e2ebf0 , #e2ebf0 );">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Sectors</h4>
                                   <p class="card-subtitle card-subtitle-dash">View By Sector</p>
                                  </div>
                                  
                                </div>
                                <div class="table-responsive  mt-1">
                                  
                                  <table class="table align-items-center " width="100%">

                                    <tbody>
                                
                                    <tr>
                                
                                      <td width="19%"> 
                                         <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Agriculture</h6>
                                        </div>
                                      </div>
                                        </td>	
                                
                                    <td width="40%" class="align-middle text-center text-sm">
                                    <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=agr">
                                        <span class="text-xs font-weight-bold">		19	</span> </a>
                                
                                    </td>
                                
                                    <td width="22%">
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Hydropower / Dam</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                    <td width="19%" class="align-middle text-center text-sm">
                                        <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=inf">	  
                                    <span class="text-xs font-weight-bold">59</span>
                                    </a>		</td>
                                
                                
                                    </tr>
                                 
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Architect</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                    <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=arc">	  
                                          <span class="text-xs font-weight-bold">79</span></a>
                                      </td>
                                
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Infrastructure</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                    <td class="align-middle text-center text-sm">
                                        <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=inf">	  
                                    <span class="text-xs font-weight-bold">84</span>
                                    </a>
                                      
                                      </td>
                                
                                    </tr>
                                
                                   <tr>
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Contract Specialist</h6>
                                    </div>
                                    </div>
                                    </td>                     
                                
                                    <td class="align-middle text-center text-sm">
                                
                                         <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=con">	  
                                    <span class="text-xs font-weight-bold">63</span>
                                    </a>
                                      
                                    </td>
                                
                                
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Irrigation</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=irr">	  
                                    <span class="text-xs font-weight-bold">35</span>
                                    </a>
                                      </td>
                                
                                    </tr>
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Electrical</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=ele">	  
                                    <span class="text-xs font-weight-bold">158</span>
                                    </a>
                                    </td>
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Mechanical</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                    <td class="align-middle text-center text-sm">
                                        <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=mec">	  
                                    <span class="text-xs font-weight-bold">43</span>
                                    </a>		  </td>
                                
                                    </tr>
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Environment</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=env">	  
                                    <span class="text-xs font-weight-bold">93</span>
                                    </a>		</td>
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Rail &amp; Metro</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=rai">	  
                                    <span class="text-xs font-weight-bold">263</span>
                                    </a>		  </td>
                                
                                
                                    </tr>
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Gender Specialist</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=gen">	  
                                    <span class="text-xs font-weight-bold">6</span>
                                    </a>		  </td>
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Resettlement</h6>
                                    </div>
                                    </div>
                                    </td>   
                                       <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=res">	  
                                    <span class="text-xs font-weight-bold">20</span>
                                    </a>		  </td>
                                
                                
                                    </tr>
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Geologist</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                           <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=geo">	  
                                    <span class="text-xs font-weight-bold">46</span>
                                    </a>		  </td>
                                
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Sociologist</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=soc">	  
                                    <span class="text-xs font-weight-bold">107</span>
                                    </a>		  </td>
                                
                                    </tr>
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">Geotechnical</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=geot">	  
                                    <span class="text-xs font-weight-bold">48</span>
                                    </a>		  </td>
                                
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Structures</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=stru">	  
                                    <span class="text-xs font-weight-bold">1268</span>
                                    </a>		  </td>
                                
                                    </tr>
                                    <tr>
                                      <td>
                                      <div class="d-flex px-2 py-1">                          
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">GIS Expert</h6>
                                        </div>
                                      </div>
                                      </td>                     
                                      <td class="align-middle text-center text-sm">
                                           <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=gi">	  
                                    <span class="text-xs font-weight-bold">7</span>
                                    </a>		  </td>
                                
                                    <td>
                                    <div class="d-flex px-2 py-1">                          
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">Urban</h6>
                                    </div>
                                    </div>
                                    </td>   
                                
                                
                                      <td class="align-middle text-center text-sm">
                                          <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=urb">	  
                                    <span class="text-xs font-weight-bold">159</span>
                                    </a>		  </td>
                                
                                
                                    </tr>
                                  <tr>
                                  <td>
                                  <div class="d-flex px-2 py-1">                          
                                  <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Highway &amp; Roads</h6>
                                  </div>
                                  </div>
                                  </td>                     
                                  <td class="align-middle text-center text-sm">
                                      <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=hi">	  
                                    <span class="text-xs font-weight-bold">1059</span>
                                    </a>	</td>
                                
                                  <td>
                                  <div class="d-flex px-2 py-1">                          
                                  <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Water</h6>
                                  </div>
                                  </div>
                                  </td>   
                                
                                  <td class="align-middle text-center text-sm">
                                      <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=wat">	  
                                    <span class="text-xs font-weight-bold">287</span>
                                    </a>	</td>
                                
                                  </tr>
                                <tr>
                                  <td>
                                  <div class="d-flex px-2 py-1">                          
                                  <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Bridge</h6>
                                  </div>
                                  </div>
                                  </td>                     
                                  <td class="align-middle text-center text-sm">
                                      <a class="mb-0 text-sm" style="font-weight:bold" target="_blank" href="employeeslist.php?v=str&amp;s=bri">	  
                                    <span class="text-xs font-weight-bold">391</span>
                                    </a>	</td>
                                
                                  <td>
                                
                                                  </td></tr></tbody>
                                                </table>



                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- CV Sector Wise -->

                        
                        
                        <div class="row flex-grow">

                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body card-rounded">
                                <h4 class="card-title  card-title-dash">Recent Events</h4>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Change in Directors
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Other Events
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Quarterly Report
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="list align-items-center border-bottom py-2">
                                  <div class="wrapper w-100">
                                    <p class="mb-2 font-weight-medium">
                                      Change in Directors
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="d-flex align-items-center">
                                        <i class="mdi mdi-calendar text-muted me-1"></i>
                                        <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>


                          <!-- Top Statistics -->
                          <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <h4 class="card-title card-title-dash">Todo list</h4>
                                      <div class="add-items d-flex mb-0">
                                      <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                      </div>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">24 June 2020</div>
                                              <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                              <i class="mdi mdi-flag ms-2 flag-color"></i>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">23 June 2020</div>
                                              <div class="badge badge-opacity-success me-3">Done</div>
                                            </div>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">24 June 2020</div>
                                              <div class="badge badge-opacity-success me-3">Done</div>
                                            </div>
                                          </div>
                                        </li>
                                        <li class="border-bottom-0">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3">24 June 2020</div>
                                              <div class="badge badge-opacity-danger me-3">Expired</div>
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Top Statistics -->


                        </div>

                        
                        
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded table-darkBGImg">
                              <div class="card-body">
                                <div class="col-sm-8">
                                  <h3 class="text-white upgrade-info mb-0">
                                    Enhance your <span class="fw-bold">Campaign</span> for better outreach
                                  </h3>
                                  <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="col-lg-4 d-flex flex-column">

                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <h4 class="card-title card-title-dash">CV Entry Progress</h4>
                                    </div>
                                    <div id="cventrychartid"></div>
                                    <!-- <canvas class="my-auto" id="doughnutChart" height="200"></canvas> -->
                                    <!-- <div id="doughnut-chart-legend" class="mt-5 text-center"></div> -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row flex-grow">

                          <!-- Activities -->
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                  <h4 class="card-title card-title-dash">CV Entered</h4>
                                  <p class="mb-0">20 finished, 5 remaining</p>
                                </div>
                                <ul class="bullet-line-list">
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Aman</span> entered</div>
                                      <p>1435</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Abc def</span> entered</div>
                                      <p>1102</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Mayathri</span> entered</div>
                                      <p>459</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Tulika</span> entered</div>
                                      <p>449</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Mustafa</span> entered</div>
                                      <p>28</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Chetan</span> entered</div>
                                      <p>16</p>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="d-flex justify-content-between">
                                      <div><span class="text-light-green">Nishva</span> entered</div>
                                      <p>12</p>
                                    </div>
                                  </li>
                                </ul>
                                <div class="list align-items-center pt-3">
                                  <div class="wrapper w-100">
                                    <p class="mb-0">
                                      <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Activities -->

                        </div>


                        <!-- To do List -->
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Statistics</h4>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-5" src="images/cvbank/educationlogo/doctor.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Ph.D. Doctors</p>
                                            <small class="text-muted mb-0">95</small>
                                          </div>
                                        </div>
                                        <div>
                                          <button class="btn btn-primary btn-sm" style="color: white;">View</button>
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-5" src="images/cvbank/educationlogo/msphil.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">M.Phil/MS</p>
                                            <small class="text-muted mb-0">26</small>
                                          </div>
                                        </div>
                                        <div>
                                          <button class="btn btn-primary btn-sm" style="color: white;">View</button>
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-5" src="images/cvbank/educationlogo/mscmsc.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Masters</p>
                                            <small class="text-muted mb-0">794</small>
                                          </div>
                                        </div>
                                        <div>
                                          <button class="btn btn-primary btn-sm" style="color: white;">View</button>
                                        </div>
                                      </div>
                                      <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                          <img class="img-sm rounded-5" src="images/cvbank/educationlogo/bsc.jpg" alt="profile">
                                          <div class="wrapper ms-3">
                                            <p class="ms-1 mb-1 fw-bold">Bachelors</p>
                                            <small class="text-muted mb-0">1823</small>
                                          </div>
                                        </div>
                                        <div>
                                          <button class="btn btn-primary btn-sm" style="color: white;">View</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- To do List -->

                       

                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                      <div>
                                        <h4 class="card-title card-title-dash">Leave Report</h4>
                                      </div>
                                      <div>
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <h6 class="dropdown-header">week Wise</h6>
                                            <a class="dropdown-item" href="#">Year Wise</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="mt-3">
                                      <canvas id="leaveReport"></canvas>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
 
                      </div>
                    </div>
                  </div>




                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
    
    
    
  <!-- End custom js for this page-->

  <script>


document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('weeklychartid', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['52','32']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'CV Entered/Week',
                data: [52, 32]
            }]
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('cventrychartid', {
            chart: {
                type: 'bar'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Manoj','Lalith','SL_BR6600001','Admin','BD_MN6400120','SS5500023','Neeraj','Seema','Kamraan','Nishva','Chetan','Mustafa','Tulika','Mayathri','ABC','Aman']
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            series: [{
                name: 'CV Entered',
                data: [1,1,1,1,1,2,5,6,11,12,16,28,449,459,1102,1435]
            }]
        });
    });

    
  </script>



</body>

</html>

