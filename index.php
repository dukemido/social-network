<?php
session_start();
$title = 'Home';
$content = ' <main>
<div class="main-section">
    <div class="container">
        <div class="main-section-data">
            <div class="row">
                <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                    <div class="main-left-sidebar no-margin">
                        <div class="user-data full-width">
                            <div class="user-profile">
                                <div class="username-dt">
                                    <div class="usr-pic">
                                        <img src="' . $_SESSION['Pic'] . '" height="100px" width="100px" alt="">
                                    </div>
                                </div>
                                <!--username-dt end-->
                                <div class="user-specs">
                                    <h3>' . $_SESSION['Name'] . '</h3>
                                    <span>' . $_SESSION['AboutMe'] . '.</span>
                                </div>
                            </div>
                            <!--user-profile end-->
                            <ul class="user-fw-status">
                                <li>
                                    <a href="profile.php" title="">View Profile</a>
                                </li>
                            </ul>
                        </div>
                        <!--user-data end-->


                    </div>
                    <!--main-left-sidebar end-->
                </div>
                <div class="col-lg-6 col-md-8 no-pd">
                    <div class="main-ws-sec">
                        <div class="post-topbar">
                            <div class="user-picy">
                                <img height="50px" width="50px" src="' . $_SESSION['Pic'] . '" alt="">
                            </div>
                            <div class="post-st">
                                <ul>
                                    <li><a class="post-jb active" href="#" title="">Post</a></li>
                                </ul>
                            </div>
                            <!--post-st end-->
                        </div>
                        <!--post-topbar end-->
                        <div class="posts-section">
                            
                            <div class="top-profiles">
                                <div class="pf-hd">
                                    <h3>Friend Suggestions</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="profiles-slider">
                                    <div class="user-profy">
                                        <img src="images\resources\user1.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div>
                                    <!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user2.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div>
                                    <!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user3.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div>
                                    <!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user1.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div>
                                    <!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user2.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div>
                                    <!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user3.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div>
                                    <!--user-profy end-->
                                </div>
                                <!--profiles-slider end-->
                            </div>
                            <!--top-profiles end-->';
$id = $_SESSION['User'];
$count = 0;
include('inc/config.php');
if ($stmt = $link->prepare("SELECT * from posts p, users u WHERE p.UserId= '" . $id . "' AND p.UserId = u.UserId ORDER BY PostTime")) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row['HasPic'] == '1') {
            $pic = 'users/' . $row['UserId'] . '.jpg';
        } else if ($row['Gender'] == 'M') {
            $pic = 'users/default_m.jpg';
        } else if ($row['Gender'] == 'F') {
            $pic['Pic'] = 'users/default_f.jpg';
        }

        if ($is_public)
            $perm = 'Public';
        else $perm = 'Private';
        $count++;

        $content = $content . '<div class="post-bar">
                                                        <div class="post_topbar">
                                                            <div class="usy-dt">
                                                                <img src="' . $pic . '" height="50px" width="50px" alt="">
                                                                <div class="usy-name">
                                                                    <h3>' . $row['FirstName'] . ' ' . $row['LastName'] . '</h3>
                                                                    <span><img src="images\clock.png" alt="">' . $row['PostTime'] . '</span>
                                                                    <span>Permission: ' . $perm . '</span>
                                                                </div>
                                                            </div>';
        if ($id == $_SESSION['User'])

            $content = $content . '<div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Delete</a></li>
                                                            </ul>
                                                            </div>';

        $content = $content . '</div>
                                                       
                                                        <div class="job_descp">
                                                            <p>' . $row['Caption'] . '</p>
                                                        </div>
                                                        
                                                    </div>
                                                    <!--post-bar end-->';
    }
}

if ($stmt = $link->prepare("SELECT * from posts p, users u, friends f WHERE f.OwnerId='" . $id . "' AND p.UserId = f.FriendId AND u.UserId=p.UserId ORDER BY PostTime DESC")) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row['HasPic'] == '1') {
            $pic = 'users/' . $row['UserId'] . '.jpg';
        } else if ($row['Gender'] == 'M') {
            $pic = 'users/default_m.jpg';
        } else if ($row['Gender'] == 'F') {
            $pic['Pic'] = 'users/default_f.jpg';
        }

        if ($is_public)
            $perm = 'Public';
        else $perm = 'Private';
        $count++;

        $content = $content . '<div class="post-bar">
                                                        <div class="post_topbar">
                                                            <div class="usy-dt">
                                                                <img src="' . $pic . '" height="50px" width="50px" alt="">
                                                                <div class="usy-name">
                                                                    <h3>' . $row['FirstName'] . ' ' . $row['LastName'] . '</h3>
                                                                    <span><img src="images\clock.png" alt="">' . $row['PostTime'] . '</span>
                                                                    <span>Permission: ' . $perm . '</span>
                                                                </div>
                                                            </div>';
        if ($id == $_SESSION['User'])

            $content = $content . '<div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Delete</a></li>
                                                            </ul>
                                                            </div>';

        $content = $content . '</div>
                                                       
                                                        <div class="job_descp">
                                                            <p>' . $row['Caption'] . '</p>
                                                        </div>
                                                        
                                                    </div>
                                                    <!--post-bar end-->';
    }
}
$content = $content . '<!--post-bar end-->
                            
                            <!--posty end-->
                          </div>
                        <!--posts-section end-->
                    </div>
                    <!--main-ws-sec end-->
                </div>
                
            </div>
        </div><!-- main-section-data end-->
    </div>
</div>
</main>

';
include_once('inc/layout.php');
