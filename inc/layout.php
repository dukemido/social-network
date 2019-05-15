<?php
session_start();
if($_SESSION["User"] === null)
{
    header("location: login.php");
    return;
}
    
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>
            <?php echo $title ?> - VM Network</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="stylesheet" type="text/css" href="css\animate.css">
        <link rel="stylesheet" type="text/css" href="css\bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css\line-awesome.css">
        <link rel="stylesheet" type="text/css" href="css\line-awesome-font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css\font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css\jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" type="text/css" href="lib\slick\slick.css">
        <link rel="stylesheet" type="text/css" href="lib\slick\slick-theme.css">
        <link rel="stylesheet" type="text/css" href="css\style.css">
        <link rel="stylesheet" type="text/css" href="css\responsive.css">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    </head>


    <body>


        <div class="wrapper">
            <header>
                <div class="container">
                    <div class="header-data">
                        <div class="logo">
                            <a href="index.php" title=""><img src="images\logo.png" alt=""></a>
                        </div>
                        <!--logo end-->
                        <div class="search-bar">
                            <form>
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><i class="la la-search"></i></button>
                            </form>
                        </div>
                        <!--search-bar end-->
                        <nav>
                            <ul>
                                <li>
                                    <a href="index.php" title="">
                                        <span><img src="images\icon1.png" alt=""></span> Home
                                    </a>
                                </li>
                                
                                
                                <li>
                                    <a href="friends.html" title="">
                                        <span><img src="images\icon4.png" alt=""></span> Friends
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="" class="not-box-open">
                                        <span><img src="images\icon6.png" alt=""></span> Messages
                                    </a>
                                    <div class="notification-box msg">
                                        <div class="nt-title">
                                            <h4>Setting</h4>
                                            <a href="#" title="">Clear all</a>
                                        </div>
                                        <div class="nott-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                    <p>Lorem ipsum dolor sit amet.</p>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="messages.html" title="">View All Messsages</a>
                                            </div>
                                        </div>
                                        <!--nott-list end-->
                                    </div>
                                    <!--notification-box end-->
                                </li>
                                <li>
                                    <a href="#" title="" class="not-box-open">
                                        <span><img src="images\icon7.png" alt=""></span> Notification
                                    </a>
                                    <div class="notification-box">
                                        <div class="nt-title">
                                            <h4>Setting</h4>
                                            <a href="#" title="">Clear all</a>
                                        </div>
                                        <div class="nott-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images\resources\ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                                <!--notification-info -->
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="#" title="">View All Notification</a>
                                            </div>
                                        </div>
                                        <!--nott-list end-->
                                    </div>
                                    <!--notification-box end-->
                                </li>
                            </ul>
                        </nav>
                        <!--nav end-->
                        <div class="menu-btn">
                            <a href="#" title=""><i class="fa fa-bars"></i></a>
                        </div>
                        <!--menu-btn end-->
                        <div class="user-account">
                            <div class="user-info">
                            <img src="users/default_m.jpg" height="30px" width="30px" alt="">

                                
                                <a href="#" title="">
                                    Omar</a>
                                <i class="la la-sort-down"></i>
                            </div>
                            <div class="user-account-settingss">
                                <h3>Online Status</h3>
                                <ul class="on-off-status">
                                    <li>
                                        <div class="fgt-sec">
                                            <input type="radio" name="cc" id="c5">
                                            <label for="c5">
                                            <span></span>
                                        </label>
                                            <small>Online</small>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="fgt-sec">
                                            <input type="radio" name="cc" id="c6">
                                            <label for="c6">
                                            <span></span>
                                        </label>
                                            <small>Offline</small>
                                        </div>
                                    </li>
                                </ul>
                                <h3>Custom Status</h3>
                                <div class="search_form">
                                    <form>
                                        <input type="text" name="search">
                                        <button type="submit">Ok</button>
                                    </form>
                                </div>
                                <!--search_form end-->
                                <h3>Setting</h3>
                                <ul class="us-links">
                                    <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                                    <li><a href="#" title="">Privacy</a></li>
                                    <li><a href="#" title="">Faqs</a></li>
                                    <li><a href="#" title="">Terms &amp; Conditions</a></li>
                                </ul>
                                <h3 class="tc"><a href="inc/logout.php" title="">Logout</a></h3>
                            </div>
                            <!--user-account-settingss end-->
                        </div>
                    </div>
                    <!--header-data end-->
                </div>
            </header>
            <!--header end-->
            
                        <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="usr-pic">
                                                    <img src="images/resources/user-pic.png" alt="">
                                                </div>
                                            </div><!--username-dt end-->
                                            <div class="user-specs">
                                                <h3>John Doe</h3>
                                                <span>Graphic Designer at Self Employed</span>
                                            </div>
                                        </div><!--user-profile end-->
                                        <ul class="user-fw-status">
                                            <li>
                                                <h4>Following</h4>
                                                <span>34</span>
                                            </li>
                                            <li>
                                                <h4>Followers</h4>
                                                <span>155</span>
                                            </li>
                                            <li>
                                                <a href="profile.php" title="">View Profile</a>
                                            </li>
                                        </ul>
                                    </div><!--user-data end-->
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3>Suggestions</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s1.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s2.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>John Doe</h4>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s3.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Poonam</h4>
                                                    <span>Wordpress Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s4.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Bill Gates</h4>
                                                    <span>C &amp; C++ Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s5.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s6.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>John Doe</h4>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="view-more">
                                                <a href="#" title="">View More</a>
                                            </div>
                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
                                    <div class="tags-sec full-width">
                                        <ul>
                                            <li><a href="#" title="">Help Center</a></li>
                                            <li><a href="#" title="">About</a></li>
                                            <li><a href="#" title="">Privacy Policy</a></li>
                                            <li><a href="#" title="">Community Guidelines</a></li>
                                            <li><a href="#" title="">Cookies Policy</a></li>
                                            <li><a href="#" title="">Career</a></li>
                                            <li><a href="#" title="">Language</a></li>
                                            <li><a href="#" title="">Copyright Policy</a></li>
                                        </ul>
                                        <div class="cp-sec">
                                            <img src="images/logo2.png" alt="">
                                            <p><img src="images/cp.png" alt="">Copyright 2019</p>
                                        </div>
                                    </div><!--tags-sec end-->
                                </div>
            <?php echo $content ?>


<!--0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000-->

            <div class="post-popup pst-pj">
                <div class="post-project">
                    <h3>Post a project</h3>
                    <div class="post-project-fields">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="title" placeholder="Title">
                                </div>
                                <div class="col-lg-12">
                                    <div class="inp-field">
                                        <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="skills" placeholder="Skills">
                                </div>
                                <div class="col-lg-12">
                                    <div class="price-sec">
                                        <div class="price-br">
                                            <input type="text" name="price1" placeholder="Price">
                                            <i class="la la-dollar"></i>
                                        </div>
                                        <span>To</span>
                                        <div class="price-br">
                                            <input type="text" name="price1" placeholder="Price">
                                            <i class="la la-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <ul>
                                        <li><button class="active" type="submit" value="post">Post</button></li>
                                        <li><a href="#" title="">Cancel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--post-project-fields end-->
                    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
                </div>
                <!--post-project end-->
            </div>
            <!--post-project-popup end-->

            <div class="post-popup job_post">
                <div class="post-project">
                    <h3>Post a job</h3>
                    <div class="post-project-fields">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="title" placeholder="Title">
                                </div>
                                <div class="col-lg-12">
                                    <div class="inp-field">
                                        <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="skills" placeholder="Skills">
                                </div>
                                <div class="col-lg-6">
                                    <div class="price-br">
                                        <input type="text" name="price1" placeholder="Price">
                                        <i class="la la-dollar"></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inp-field">
                                        <select>
                                        <option>Full Time</option>
                                        <option>Half time</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <ul>
                                        <li><button class="active" type="submit" value="post">Post</button></li>
                                        <li><a href="#" title="">Cancel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--post-project-fields end-->
                    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
                </div>
                <!--post-project end-->
            </div>
            <!--post-project-popup end-->



            <div class="chatbox-list" style="right: 366.5px;">
                <div class="chatbox">
                    <div class="chat-mg">
                        <a href="#" title=""><img src="images\resources\usr-img1.png" alt=""></a>
                        <span>2</span>
                    </div>
                    <div class="conversation-box">
                        <div class="con-title mg-3">
                            <div class="chat-user-info">
                                <img src="images\resources\us-img1.png" alt="">
                                <h3>John Doe <span class="status-info"></span></h3>
                            </div>
                            <div class="st-icons">
                                <a href="#" title=""><i class="la la-cog"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                            </div>
                        </div>
                        <div class="chat-hist mCustomScrollbar _mCS_1" data-mcs-theme="dark">
                            <div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
                                <div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: -134px; left: 0px;" dir="ltr">
                                    <div class="chat-msg">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                        <span>Sat, Aug 23, 1:10 PM</span>
                                    </div>
                                    <div class="date-nd">
                                        <span>Sunday, August 24</span>
                                    </div>
                                    <div class="chat-msg st2">
                                        <p>Cras ultricies ligula.</p>
                                        <span>5 minutes ago</span>
                                    </div>
                                    <div class="chat-msg">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                        <span>Sat, Aug 23, 1:10 PM</span>
                                    </div>
                                </div>
                                <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical mCSB_scrollTools_onDrag" style="display: block;">
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger mCSB_dragger_onDrag" style="position: absolute; min-height: 30px; display: block; height: 189px; max-height: 270px; top: 91px;">
                                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                        </div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--chat-list end-->
                        <div class="typing-msg">
                            <form>
                                <textarea placeholder="Type a message here"></textarea>
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                            <ul class="ft-options">
                                <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                                <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                                <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div>
                        <!--typing-msg end-->
                    </div>
                    <!--chat-history end-->
                </div>
                <div class="chatbox">
                    <div class="chat-mg">
                        <a href="#" title=""><img src="images\resources\usr-img2.png" alt=""></a>
                    </div>
                    <div class="conversation-box">
                        <div class="con-title mg-3">
                            <div class="chat-user-info">
                                <img src="images\resources\us-img1.png" alt="">
                                <h3>John Doe <span class="status-info"></span></h3>
                            </div>
                            <div class="st-icons">
                                <a href="#" title=""><i class="la la-cog"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                            </div>
                        </div>
                        <div class="chat-hist mCustomScrollbar _mCS_2" data-mcs-theme="dark">
                            <div id="mCSB_2" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" tabindex="0" style="max-height: none;">
                                <div id="mCSB_2_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                                    <div class="chat-msg">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                        <span>Sat, Aug 23, 1:10 PM</span>
                                    </div>
                                    <div class="date-nd">
                                        <span>Sunday, August 24</span>
                                    </div>
                                    <div class="chat-msg st2">
                                        <p>Cras ultricies ligula.</p>
                                        <span>5 minutes ago</span>
                                    </div>
                                    <div class="chat-msg">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                        <span>Sat, Aug 23, 1:10 PM</span>
                                    </div>
                                </div>
                                <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: block;">
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; display: block; height: 189px; max-height: 270px; top: 0px;">
                                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                        </div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--chat-list end-->
                        <div class="typing-msg">
                            <form>
                                <textarea placeholder="Type a message here"></textarea>
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                            <ul class="ft-options">
                                <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                                <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                                <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div>
                        <!--typing-msg end-->
                    </div>
                    <!--chat-history end-->
                </div>
                <div class="chatbox">
                    <div class="chat-mg bx">
                        <a href="#" title=""><img src="images\chat.png" alt=""></a>
                        <span>2</span>
                    </div>
                    <div class="conversation-box">
                        <div class="con-title">
                            <h3>Messages</h3>
                            <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                        </div>
                        <div class="chat-list">
                            <div class="conv-list active">
                                <div class="usrr-pic">
                                    <img src="images\resources\usy1.png" alt="">
                                    <span class="active-status activee"></span>
                                </div>
                                <div class="usy-info">
                                    <h3>John Doe</h3>
                                    <span>Lorem ipsum dolor <img src="images\smley.png" alt=""></span>
                                </div>
                                <div class="ct-time">
                                    <span>1:55 PM</span>
                                </div>
                                <span class="msg-numbers">2</span>
                            </div>
                            <div class="conv-list">
                                <div class="usrr-pic">
                                    <img src="images\resources\usy2.png" alt="">
                                </div>
                                <div class="usy-info">
                                    <h3>John Doe</h3>
                                    <span>Lorem ipsum dolor <img src="images\smley.png" alt=""></span>
                                </div>
                                <div class="ct-time">
                                    <span>11:39 PM</span>
                                </div>
                            </div>
                            <div class="conv-list">
                                <div class="usrr-pic">
                                    <img src="images\resources\usy3.png" alt="">
                                </div>
                                <div class="usy-info">
                                    <h3>John Doe</h3>
                                    <span>Lorem ipsum dolor <img src="images\smley.png" alt=""></span>
                                </div>
                                <div class="ct-time">
                                    <span>0.28 AM</span>
                                </div>
                            </div>
                        </div>
                        <!--chat-list end-->
                    </div>
                    <!--conversation-box end-->
                </div>
            </div>
            <!--chatbox-list end-->

        </div>
        <!--theme-layout end-->



        <script type="text/javascript" src="js\jquery.min.js"></script>
        <script type="text/javascript" src="js\popper.js"></script>
        <script type="text/javascript" src="js\bootstrap.min.js"></script>
        <script type="text/javascript" src="js\jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="lib\slick\slick.min.js"></script>
        <script type="text/javascript" src="js\scrollbar.js"></script>
        <script type="text/javascript" src="js\script.js"></script>


    </body>

    </html>