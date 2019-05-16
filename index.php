<?php
session_start();
$title = 'Home';
$content = '<main>
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
                                </div><!--username-dt end-->
                                <div class="user-specs">
                                    <h3>' . $_SESSION['Name'] . '</h3>
                                    <span>' . $_SESSION['AboutMe'] . '.</span>
                                </div>
                            </div><!--user-profile end-->
                            <ul class="user-fw-status">
                                <li>
                                    <a href="profile.php" title="">View Profile</a>
                                </li>
                            </ul>
                        </div><!--user-data end-->
                        
                        
                    </div><!--main-left-sidebar end-->
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
                            </div><!--post-st end-->
                        </div><!--post-topbar end-->
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
                                </div>
                                <div class="job_descp">
                                    <h3>Senior Wordpress Developer</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
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
                            <div class="top-profiles">
                                <div class="pf-hd">
                                    <h3>Top Profiles</h3>
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
                                    </div><!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user2.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div><!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user3.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div><!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user1.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div><!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user2.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div><!--user-profy end-->
                                    <div class="user-profy">
                                        <img src="images\resources\user3.png" alt="">
                                        <h3>John Doe</h3>
                                        <span>Graphic Designer</span>
                                        <ul>
                                            <li><a href="#" title="" class="followw">Add Friend</a></li>
                                        </ul>
                                        <a href="#" title="">View Profile</a>
                                    </div><!--user-profy end-->
                                </div><!--profiles-slider end-->
                            </div><!--top-profiles end-->
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
                                </div>
                                <div class="job_descp">
                                    <h3>Senior Wordpress Developer</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
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
                            <div class="posty">
                                <div class="post-bar no-margin">
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
                                    </div>
                                    <div class="job_descp">
                                        <h3>Senior Wordpress Developer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
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
                                <div class="comment-section">
                                    <div class="plus-ic">
                                        <i class="la la-plus"></i>
                                    </div>
                                    <div class="comment-sec">
                                        <ul>
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img src="images\resources\bg-img1.png" alt="">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images\clock.png" alt=""> 3 min ago</span>
                                                        <p>Lorem ipsum dolor sit amet, </p>
                                                        <a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>
                                                    </div>
                                                </div><!--comment-list end-->
                                                <ul>
                                                    <li>
                                                        <div class="comment-list">
                                                            <div class="bg-img">
                                                                <img src="images\resources\bg-img2.png" alt="">
                                                            </div>
                                                            <div class="comment">
                                                                <h3>John Doe</h3>
                                                                <span><img src="images\clock.png" alt=""> 3 min ago</span>
                                                                <p>Hi John </p>
                                                                <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                                            </div>
                                                        </div><!--comment-list end-->
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img src="images\resources\bg-img3.png" alt="">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images\clock.png" alt=""> 3 min ago</span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
                                                        <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                                    </div>
                                                </div><!--comment-list end-->
                                            </li>
                                        </ul>
                                    </div><!--comment-sec end-->
                                    <div class="post-comment">
                                        <div class="cm_img">
                                            <img src="images\resources\bg-img4.png" alt="">
                                        </div>
                                        <div class="comment_box">
                                            <form>
                                                <input type="text" placeholder="Post a comment">
                                                <button type="submit">Send</button>
                                            </form>
                                        </div>
                                    </div><!--post-comment end-->
                                </div><!--comment-section end-->
                            </div><!--posty end-->
                            <div class="process-comm">
                                <a href="#" title=""><img src="images\process-icon.png" alt=""></a>
                            </div><!--process-comm end-->
                        </div><!--posts-section end-->
                    </div><!--main-ws-sec end-->
                </div>
                <div class="col-lg-3 pd-right-none no-pd">
                    <div class="right-sidebar">
                        <div class="widget widget-jobs">
                            <div class="sd-title">
                                <h3>Top Jobs</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div>
                            <div class="jobs-list">
                                <div class="job-info">
                                    <div class="job-details">
                                        <h3>Senior Product Designer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                    </div>
                                </div><!--job-info end-->
                                <div class="job-info">
                                    <div class="job-details">
                                        <h3>Senior UI / UX Designer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                    </div>
                                </div><!--job-info end-->
                                <div class="job-info">
                                    <div class="job-details">
                                        <h3>Junior Seo Designer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                    </div>
                                </div><!--job-info end-->
                                <div class="job-info">
                                    <div class="job-details">
                                        <h3>Senior PHP Designer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                    </div>
                                </div><!--job-info end-->
                                <div class="job-info">
                                    <div class="job-details">
                                        <h3>Senior Developer Designer</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                    </div>
                                </div><!--job-info end-->
                            </div><!--jobs-list end-->
                        </div><!--widget-jobs end-->
                        <div class="widget suggestions full-width">
                            <div class="sd-title">
                                <h3>Most Viewed People</h3>
                                <i class="la la-ellipsis-v"></i>
                            </div><!--sd-title end-->
                            <div class="suggestions-list">
                                <div class="suggestion-usd">
                                    <img src="images\resources\s1.png" alt="">
                                    <div class="sgt-text">
                                        <h4>Jessica William</h4>
                                        <span>Graphic Designer</span>
                                    </div>
                                    <span><i class="la la-plus"></i></span>
                                </div>
                                <div class="suggestion-usd">
                                    <img src="images\resources\s2.png" alt="">
                                    <div class="sgt-text">
                                        <h4>John Doe</h4>
                                        <span>PHP Developer</span>
                                    </div>
                                    <span><i class="la la-plus"></i></span>
                                </div>
                                <div class="suggestion-usd">
                                    <img src="images\resources\s3.png" alt="">
                                    <div class="sgt-text">
                                        <h4>Poonam</h4>
                                        <span>Wordpress Developer</span>
                                    </div>
                                    <span><i class="la la-plus"></i></span>
                                </div>
                                <div class="suggestion-usd">
                                    <img src="images\resources\s4.png" alt="">
                                    <div class="sgt-text">
                                        <h4>Bill Gates</h4>
                                        <span>C &amp; C++ Developer</span>
                                    </div>
                                    <span><i class="la la-plus"></i></span>
                                </div>
                                <div class="suggestion-usd">
                                    <img src="images\resources\s5.png" alt="">
                                    <div class="sgt-text">
                                        <h4>Jessica William</h4>
                                        <span>Graphic Designer</span>
                                    </div>
                                    <span><i class="la la-plus"></i></span>
                                </div>
                                <div class="suggestion-usd">
                                    <img src="images\resources\s6.png" alt="">
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
                        </div>
                    </div><!--right-sidebar end-->
                </div>
            </div>
        </div><!-- main-section-data end-->
    </div> 
</div>
</main>

';
include_once('inc/layout.php');
