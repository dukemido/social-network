<?
include('inc/config.php');
session_start();
$title = 'Profile';

if (empty($_GET['id'])) {
    header('location: profile.php?id=' . $_SESSION['User']);
    return;
}
$myprofile = false;
$is_friends = false;
$is_requested = false;
$can_accept = false;

$id = $_GET['id'];
if ($id == $_SESSION['User']) {
    $pic = $_SESSION['Pic'];
    $name = $_SESSION['Name'];
    $about = $_SESSION['AboutMe'];
    $myprofile = true;
} else {
    // Load data of Profile with Id = $id
    if ($stmt = $link->prepare('SELECT * FROM users WHERE UserId = ?')) {
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $name = $row['FirstName'] . ' ' . $row['LastName'];
            if ($row['HasPic'] == '1') {
                $pic = 'users/' . $id . '.jpg';
            } else if ($row['Gender'] == 'M') {
                $pic = 'users/default_m.jpg';
            } else if ($row['Gender'] == 'F') {
                $pic['Pic'] = 'users/default_f.jpg';
            }
            $about = $row['AboutMe'];
        } else {
            $content = '<main>
           <div class="main-section">
               <div class="container"><div class="alert alert-danger" role="alert">
           <h4 class="alert-heading">Are you lost?</h4>
           <p>Sorry, but we cannot find the profile your are searching for.</p>
           <hr>
           <p class="mb-0">Go back to your <a href="profile.php">profile</a>.</p>
         </div></div></div></main>';
            include_once('inc/layout.php');
            return;
        }
    }

    // Check if they are both friends.
    if ($stmt = $link->prepare('SELECT * FROM friends WHERE OwnerId = ? AND FriendId = ?')) {
        $stmt->bind_param('ss', $_SESSION['User'], $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $is_friends = true;
        }
    }

    // Check if a friend request was sent.
    if (!$is_friends) {
        if ($stmt = $link->prepare('SELECT * FROM requests WHERE OwnerId = ? AND RequesteeId = ?')) {
            $stmt->bind_param('ss', $_SESSION['User'], $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $is_requested = true;
            }
        }
    }
}
$result = $link->query("SELECT COUNT(*) FROM friends WHERE OwnerId = '" . $id . "'");
$row = $result->fetch_row();
$friends_count = $row[0];

if ($stmt = $link->prepare('SELECT * FROM requests WHERE RequesteeId = ? AND OwnerId = ?')) {
    $stmt->bind_param('ss', $_SESSION['User'], $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $can_accept = true;
    }
}

$content = '


<section class="cover-sec">
<img src="images\resources\cover-img.jpeg" alt="">
</section>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
        $(document).ready(function() {
            $(\'#request\').on(\'submit\', function(e) {
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var dataf = $("#request").serialize();

                $.ajax({
                    type: "POST",
                    url: \'inc/sendrequest.php\',
                    data: dataf,
                    success: function(data) {
                        if (data == \'success\'){
                            swal("Friend Request Sent");
                            document.getElementById(\'request\').style = "display:none";
                            document.getElementById(\'deleterequest\').style = "display:block";
                        }
                        else swal("Error!", data, "error");
                        //alert(data);

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(\'#deleterequest\').on(\'submit\', function(e) {
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var dataf = $("#deleterequest").serialize();

                $.ajax({
                    type: "POST",
                    url: \'inc/deleterequest.php\',
                    data: dataf,
                    success: function(data) {
                        if (data == \'success\'){
                            swal("Friend Request Cancelled");
                            document.getElementById(\'request\').style = "display:block";
                            document.getElementById(\'deleterequest\').style = "display:none";
                        }
                        else swal("Error!", data, "error");
                        //alert(data);

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(\'#acceptrequest\').on(\'submit\', function(e) {
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var dataf = $("#acceptrequest").serialize();

                $.ajax({
                    type: "POST",
                    url: \'inc/acceptrequest.php\',
                    data: dataf,
                    success: function(data) {
                        if (data == \'12success\'){
                            swal("Friend Request Accepted");
                            document.getElementById(\'acceptrequest\').style = "display:none";
                            document.getElementById(\'deletefriend\').style = "display:block";

                        }
                        else swal("Error!", data, "error");
                        //alert(data);

                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(\'#deletefriend\').on(\'submit\', function(e) {
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var dataf = $("#deletefriend").serialize();

                $.ajax({
                    type: "POST",
                    url: \'inc/deletefriend.php\',
                    data: dataf,
                    success: function(data) {
                        if (data == \'1success\'){
                            swal("Friend Deleted");
                            document.getElementById(\'deletefriend\').style = "display:none";
                            document.getElementById(\'request\').style = "display:block";
                        }
                        else swal("Error!", data, "error");
                        //alert(data);

                    }
                });
            });
        });
    </script>

<main>
<div class="main-section">
    <div class="container">
        <div class="main-section-data">
            <div class="row">
                <div class="col-lg-3">
                    <div class="main-left-sidebar">
                        <div class="user_profile">
                            <div class="user-pro-img">
                                <img src="' . $pic . '" height="170px" width="170px" alt="">
                            </div><!--user-pro-img end-->
                            <div class="user_pro_status">
                                <ul class="flw-hr">
                                    ';
if (!$myprofile) {
    if ($is_friends === false) {
        if ($can_accept === true) {
            $request = $delete = $delete_friend = "none";
            $accept = "block";
        } else if ($is_requested === false) {
            $request = "block";
            $delete = $accept =  $delete_friend = "none";
        } else {
            $request = $accept =  $delete_friend =  "none";
            $delete = "block";
        }
        // not friends and friend request not was sent.

    } else {
        $request = $delete = $accept = "none";
        $delete_friend = "block";
    }
    $content = $content . '<form id="request" style="display:' . $request . '"> 
        <input type="hidden" name="requester" value="' . $_SESSION['User'] . '">
        <input type="hidden" name="requestee" value="' . $id . '">
        <li><a href="#" title="" class="hre"><input type="submit" value="Add Friend" style=" border:none; background:none; color:#ffffff;"></a></li>
        </form>';

    $content = $content . '<form id="deleterequest" style="display:' . $delete . '"> 
            <input type="hidden" name="requester" value="' . $_SESSION['User'] . '">
            <input type="hidden" name="requestee" value="' . $id . '">
            <li><a href="#" title="" class="hre"><input type="submit" value="Cancel Friend Request" style=" border:none; background:none; color:#ffffff;"></a></li>
            </form>';
    $content = $content . '<form id="acceptrequest" style="display:' . $accept . '"> 
            <input type="hidden" name="requester" value="' . $_SESSION['User'] . '">
            <input type="hidden" name="requestee" value="' . $id . '">
            <li><a href="#" title="" class="hre"><input type="submit" value="Accept Friend Request" style=" border:none; background:none; color:#ffffff;"></a></li>
            </form>';
    $content = $content . '<form id="deletefriend" style="display:' . $delete_friend . '"> 
    <input type="hidden" name="requester" value="' . $_SESSION['User'] . '">
    <input type="hidden" name="requestee" value="' . $id . '">
    <li><a href="#" title="" class="hre"><input type="submit" value="Delete Friend" style=" border:none; background:none; color:#ffffff;"></a></li>
    </form>';
}


$content = $content . '</ul>
                                <ul class="flw-status">
                                    <li>
                                        <span>Friends</span>
                                        <b>' . $friends_count . '</b>
                                    </li>
                                   
                                </ul>
                            </div><!--user_pro_status end-->
                            <ul class="social_links">
                                <li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
                                <li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
                                <li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
                            </ul>
                        </div><!--user_profile end-->
                        
                    </div><!--main-left-sidebar end-->
                </div>
                <div class="col-lg-6">
                    <div class="main-ws-sec">
                        <div class="user-tab-sec">
                            <h3>' . $name . '</h3>
                            <div class="star-descp">
                                <span>'.$about.'</span>
                               </div><!--star-descp end-->
                            <div class="tab-feed">
                                <ul>
                                    <li data-tab="feed-dd" class="active">
                                        <a href="#" title="">
                                            <img src="images\ic1.png" alt="">
                                            <span>Feed</span>
                                        </a>
                                    </li>
                                    <li data-tab="info-dd">
                                        <a href="#" title="">
                                            <img src="images\ic2.png" alt="">
                                            <span>Info</span>
                                        </a>
                                    </li>
                                    <li data-tab="portfolio-dd">
                                        <a href="#" title="">
                                            <img src="images\ic3.png" alt="">
                                            <span>Portfolio</span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- tab-feed end-->
                        </div><!--user-tab-sec end-->
                        <div class="product-feed-tab current" id="feed-dd">
                            <div class="posts-section">
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="images\resources\us-pic.png" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="images\clock.png" alt="">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                                <li><a href="#" title="">Unsaved</a></li>
                                                <li><a href="#" title="">Unbid</a></li>
                                                <li><a href="#" title="">Close</a></li>
                                                <li><a href="#" title="">Hide</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="images\icon8.png" alt=""><span>Epic Coder</span></li>
                                            <li><img src="images\icon9.png" alt=""><span>India</span></li>
                                        </ul>
                                        <ul class="bk-links">
                                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="job_descp">
                                        <h3>Senior Wordpress Developer</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="">Full Time</a></li>
                                            <li><span>$30 / hr</span></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                        <ul class="skill-tags">
                                            <li><a href="#" title="">HTML</a></li>
                                            <li><a href="#" title="">PHP</a></li>
                                            <li><a href="#" title="">CSS</a></li>
                                            <li><a href="#" title="">Javascript</a></li>
                                            <li><a href="#" title="">Wordpress</a></li> 	
                                        </ul>
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                            <li>
                                                <a href="#"><i class="la la-heart"></i> Like</a>
                                                <img src="images\liked-img.png" alt="">
                                                <span>25</span>
                                            </li> 
                                            <li><a href="#" title="" class="com"><img src="images\com.png" alt=""> Comment 15</a></li>
                                        </ul>
                                        <a><i class="la la-eye"></i>Views 50</a>
                                    </div>
                                </div><!--post-bar end-->
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="images\resources\us-pic.png" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="images\clock.png" alt="">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                                <li><a href="#" title="">Unsaved</a></li>
                                                <li><a href="#" title="">Unbid</a></li>
                                                <li><a href="#" title="">Close</a></li>
                                                <li><a href="#" title="">Hide</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="images\icon8.png" alt=""><span>Front End Developer</span></li>
                                            <li><img src="images\icon9.png" alt=""><span>India</span></li>
                                        </ul>
                                        <ul class="bk-links">
                                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                            <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="job_descp">
                                        <h3>Simple Classified Site</h3>
                                        <ul class="job-dt">
                                            <li><span>$300 - $350</span></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                        <ul class="skill-tags">
                                            <li><a href="#" title="">HTML</a></li>
                                            <li><a href="#" title="">PHP</a></li>
                                            <li><a href="#" title="">CSS</a></li>
                                            <li><a href="#" title="">Javascript</a></li>
                                            <li><a href="#" title="">Wordpress</a></li> 	
                                        </ul>
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                            <li>
                                                <a href="#"><i class="la la-heart"></i> Like</a>
                                                <img src="images\liked-img.png" alt="">
                                                <span>25</span>
                                            </li> 
                                            <li><a href="#" title="" class="com"><img src="images\com.png" alt=""> Comment 15</a></li>
                                        </ul>
                                        <a><i class="la la-eye"></i>Views 50</a>
                                    </div>
                                </div><!--post-bar end-->
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="images\resources\us-pc2.png" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="images\clock.png" alt="">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                                <li><a href="#" title="">Unsaved</a></li>
                                                <li><a href="#" title="">Unbid</a></li>
                                                <li><a href="#" title="">Close</a></li>
                                                <li><a href="#" title="">Hide</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="images\icon8.png" alt=""><span>Epic Coder</span></li>
                                            <li><img src="images\icon9.png" alt=""><span>India</span></li>
                                        </ul>
                                        <ul class="bk-links">
                                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="job_descp">
                                        <h3>Senior UI / UX designer</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="">Par Time</a></li>
                                            <li><span>$10 / hr</span></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                        <ul class="skill-tags">
                                            <li><a href="#" title="">HTML</a></li>
                                            <li><a href="#" title="">PHP</a></li>
                                            <li><a href="#" title="">CSS</a></li>
                                            <li><a href="#" title="">Javascript</a></li>
                                            <li><a href="#" title="">Wordpress</a></li> 	
                                        </ul>
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                            <li>
                                                <a href="#"><i class="la la-heart"></i> Like</a>
                                                <img src="images\liked-img.png" alt="">
                                                <span>25</span>
                                            </li> 
                                            <li><a href="#" title="" class="com"><img src="images\com.png" alt=""> Comment 15</a></li>
                                        </ul>
                                        <a><i class="la la-eye"></i>Views 50</a>
                                    </div>
                                </div><!--post-bar end-->
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="images\resources\us-pic.png" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="images\clock.png" alt="">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                                <li><a href="#" title="">Unsaved</a></li>
                                                <li><a href="#" title="">Unbid</a></li>
                                                <li><a href="#" title="">Close</a></li>
                                                <li><a href="#" title="">Hide</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="images\icon8.png" alt=""><span>Epic Coder</span></li>
                                            <li><img src="images\icon9.png" alt=""><span>India</span></li>
                                        </ul>
                                        <ul class="bk-links">
                                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                            <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="job_descp">
                                        <h3>Ios Shopping mobile app</h3>
                                        <ul class="job-dt">
                                            <li><span>$300 - $350</span></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                        <ul class="skill-tags">
                                            <li><a href="#" title="">HTML</a></li>
                                            <li><a href="#" title="">PHP</a></li>
                                            <li><a href="#" title="">CSS</a></li>
                                            <li><a href="#" title="">Javascript</a></li>
                                            <li><a href="#" title="">Wordpress</a></li> 	
                                        </ul>
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                            <li>
                                                <a href="#"><i class="la la-heart"></i> Like</a>
                                                <img src="images\liked-img.png" alt="">
                                                <span>25</span>
                                            </li> 
                                            <li><a href="#" title="" class="com"><img src="images\com.png" alt=""> Comment 15</a></li>
                                        </ul>
                                        <a><i class="la la-eye"></i>Views 50</a>
                                    </div>
                                </div><!--post-bar end-->
                                <div class="process-comm">
                                    <a href="#" title=""><img src="images\process-icon.png" alt=""></a>
                                </div><!--process-comm end-->
                            </div><!--posts-section end-->
                        </div><!--product-feed-tab end-->
                        <div class="product-feed-tab" id="info-dd">
                            <div class="user-profile-ov">
                                <h3>Overview</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
                            </div><!--user-profile-ov end-->
                            <div class="user-profile-ov st2">
                                <h3>Experience</h3>
                                <h4>Web designer</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                <h4>UI / UX Designer</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
                                <h4>PHP developer</h4>
                                <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                            </div><!--user-profile-ov end-->
                            <div class="user-profile-ov">
                                <h3>Education</h3>
                                <h4>Master of Computer Science</h4>
                                <span>2015 - 2017</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                            </div><!--user-profile-ov end-->
                            <div class="user-profile-ov">
                                <h3>Location</h3>
                                <h4>India</h4>
                                <p>151/4 BT Chownk, Delhi </p>
                            </div><!--user-profile-ov end-->
                            <!--user-profile-ov end-->
                        </div><!--product-feed-tab end-->
                        <div class="product-feed-tab" id="portfolio-dd">
                            <div class="portfolio-gallery-sec">
                                <h3>Portfolio</h3>
                                <div class="gallery_pf">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img1.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img2.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img3.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img4.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img5.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img6.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img7.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img8.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img9.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="gallery_pt">
                                                <img src="images\resources\pf-img10.jpeg" alt="">
                                                <a href="#" title=""><img src="images\all-out.png" alt=""></a>
                                            </div><!--gallery_pt end-->
                                        </div>
                                    </div>
                                </div><!--gallery_pf end-->
                            </div><!--portfolio-gallery-sec end-->
                        </div><!--product-feed-tab end-->
                    </div><!--main-ws-sec end-->
                </div>
                <div class="col-lg-3">
                    <div class="right-sidebar">
                       
                        <div class="widget widget-portfolio">
                            <div class="wd-heady">
                                <h3>Portfolio</h3>
                                <img src="images\photo-icon.png" alt="">
                            </div>
                            <div class="pf-gallery">
                                <ul>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery1.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery2.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery3.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery4.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery5.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery6.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery7.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery8.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery9.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery10.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery11.png" alt=""></a></li>
                                    <li><a href="#" title=""><img src="images\resources\pf-gallery12.png" alt=""></a></li>
                                </ul>
                            </div><!--pf-gallery end-->
                        </div><!--widget-portfolio end-->
                    </div><!--right-sidebar end-->
                </div>
            </div>
        </div><!-- main-section-data end-->
    </div> 
</div>
</main>

';

include_once('inc/layout.php');
