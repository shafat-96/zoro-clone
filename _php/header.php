<div id="sidebar_menu">
    <button class="btn btn-radius btn-sm btn-secondary toggle-sidebar"><i class="fas fa-angle-left mr-2"></i>Close
        menu</button>
    <div class="sb-setting">
        <div class="header-setting">
            <div class="hs-toggles">
                <a href="<?= $websiteUrl ?>/anime" class="hst-item" data-toggle="tooltip"
                    data-original-title="Select Anime List">
                    <div class="hst-icon"><i class="fas fa-list"></i></div>
                    <div class="name"><span>Anime</span></div>
                </a>
                <a href="<?= $websiteUrl ?>/popular" class="hst-item" data-toggle="tooltip"
                    data-original-title="Popular Anime List">
                    <div class="hst-icon"><i class="fas fa-star"></i></div>
                    <div class="name"><span>Popular</span></div>
                </a>
                <a href="<?= $websiteUrl ?>/random" rel="nofollow" class="hst-item" data-toggle="tooltip"
                    data-original-title="Select Random Anime">
                    <div class="hst-icon"><i class="fas fa-random"></i></div>
                    <div class="name"><span>Random</span></div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <ul class="nav sidebar_menu-list">
        <li class="nav-item active"><a class="nav-link" href="<?= $websiteUrl ?>/" title="Home"><i
                    class="fas fa-home"></i>
                Home</a></li>
        <li class="nav-item">
            <div class="nav-link" title="Types"><strong><i class="fa fa-angle-down"></i> Types</strong></div>
            <div class="sidebar_menu-sub show" id="sidebar_subs_types">
                <ul class="nav sub-menu color-list">
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/type/movies"
                            title="Movies">Movies</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/type/tv-series" title="TV Series">TV
                            Series</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/ova"
                            title="OVA">OVA</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/ona"
                            title="ONAs">ONA</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/special"
                            title="Special">Special</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" title="Status"><strong><i class="fa fa-angle-down"></i> Status</strong></div>
            <div class="sidebar_menu-sub show" id="sidebar_subs_types">
                <ul class="nav sub-menu color-list">
                    <li class="nav-item"><a class="nav-link" href="/status/completed" title="Completed">Completed</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/upcoming" title="Upcoming">Upcoming</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/trending" title="Trending">Trending</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/status/ongoing" title="Ongoing">Ongoing</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" title="Latest"><strong><i class="fa fa-angle-down"></i> Latest</strong></div>
            <div class="sidebar_menu-sub show" id="sidebar_subs_types">
                <ul class="nav sub-menu color-list">
                    <li class="nav-item"><a class="nav-link" href="/latest/subbed" title="Subbed">Subbed</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/latest/dubbed" title="Dubbed">Dubbed</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/latest/chinese" title="Chinese">Chinese</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" title="Latest"><strong><i class="fa fa-angle-down"></i> Other</strong></div>
            <div class="sidebar_menu-sub show" id="sidebar_subs_types">
                <ul class="nav sub-menu color-list">
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/popular" title="Popular">Popular</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/new-season" title="New Season">New
                            Season</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" title="Season"><strong><i class="fa fa-angle-down"></i> Season</strong></div>
            <div class="sidebar_menu-sub show" id="sidebar_subs_top">
                <ul class="nav sub-menu color-list">
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/fall-2021-anime"
                            title="Fall">Fall</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/summer-2021-anime"
                            title="Summer">Summer</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/spring-2021-anime"
                            title="Spring">Spring</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $websiteUrl ?>/sub-category/winter-2022-anime"
                            title="Winter">Winter</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <div class="nav-link" title="Genre"><strong><i class="fa fa-angle-down"></i> Genre</strong></div>
            <div class="sidebar_menu-sub show" id="sidebar_subs_genre">
                <ul class="nav color-list sub-menu">
                    <?php 
                    // Include genre functions if not already included
                    if (!function_exists('display_header_genres')) {
                        require_once(__DIR__ . '/genre_functions.php');
                    }
                    
                    // Display genres with a limit of 40 and include "More" button
                    display_header_genres(40, true);
                    ?>
                </ul>
            </div>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
<div id="header" class="header-home ">
    <div class="container">
        <div id="mobile_menu"><i class="fa fa-bars"></i></div>
        <a href="<?= $websiteUrl ?>/home" id="logo" title="<?= $websiteTitle ?>">
            <img src="<?= $websiteLogo ?>" width="100%" height="auto" alt="<?= $websiteTitle ?>">
            <div class="clearfix"></div>
        </a>
        <div id="search">
            <div class="search-content">
                <form action="/search" autocomplete="off">
                    <div class="search-selector-wrapper">
                        <input type="text" class="form-control search-input" name="keyword" id="searching"
                            placeholder="Search anime..." required>
                        <button type="submit" class="search-icon"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="search-error-wrapper" id="search-error" style="display:none">
                        <div class="search-error">
                            <i class="fas fa-exclamation-circle"></i> Please fill out this field.
                        </div>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchInput = document.getElementById('searching');
                        const searchForm = document.querySelector('#search form');
                        const searchError = document.getElementById('search-error');
                        
                        // Show error message when submit without input
                        searchForm.addEventListener('submit', function(e) {
                            if (!searchInput.value.trim()) {
                                e.preventDefault();
                                searchError.style.display = 'block';
                                return false;
                            }
                            searchError.style.display = 'none';
                            return true;
                        });
                        
                        // Hide error when typing
                        searchInput.addEventListener('input', function() {
                            if (this.value.trim()) {
                                searchError.style.display = 'none';
                            }
                        });
                    });
                </script>
                <style>
                    .search-error-wrapper {
                        position: absolute;
                        top: calc(100% + 2px);
                        left: 0;
                        width: 100%;
                        z-index: 102;
                    }
                    .search-error {
                        background: #fff;
                        color: #ff8c00;
                        padding: 8px 12px;
                        font-size: 14px;
                        border-radius: 4px;
                        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
                    }
                </style>
            </div>
        </div>
        <div class="header-group">
            <div class="zoro-group">
                <div class="zrg-list">
                    <div class="item"><a href="<?= $discord ?>" target="_blank" class="zr-social-button dc-btn"><i
                                class="fab fa-discord"></i></a></div>
                    <div class="item"><a href="<?= $github ?>" target="_blank" class="zr-social-button gh-btn"><i
                                class="fab fa-github"></i></a></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="header-setting">
            <div class="hs-toggles">
                <a href="<?= $websiteUrl ?>/anime" class="hst-item" data-toggle="tooltip"
                    data-original-title="Select Anime List">
                    <div class="hst-icon"><i class="fas fa-list"></i></div>
                    <div class="name"><span>Anime</span></div>
                </a>
                <a href="<?= $websiteUrl ?>/popular" class="hst-item" data-toggle="tooltip"
                    data-original-title="Popular Anime List">
                    <div class="hst-icon"><i class="fas fa-star"></i></div>
                    <div class="name"><span>Popular</span></div>
                </a>
                <a href="<?= $websiteUrl ?>/type/movies" class="hst-item" data-toggle="tooltip"
                    data-original-title="Anime Movies">
                    <div class="hst-icon"><i class="fas fa-film"></i></div>
                    <div class="name"><span>Movie</span></div>
                </a>
                <a href="<?= $websiteUrl ?>/random" class="hst-item" data-toggle="tooltip"
                    data-original-title="Select Random Anime">
                    <div class="hst-icon"><i class="fas fa-random"></i></div>
                    <div class="name"><span>Random</span></div>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <div id="pick_menu">
            <div class="pick_menu-ul">
                <ul class="ulclear">
                    <li class="pmu-item pmu-item-home">
                        <a class="pmu-item-icon" href="/" title="Home">
                            <img src="/files/images/pick-home.svg" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Home">
                        </a>
                    </li>
                    <li class="pmu-item pmu-item-movies">
                        <a class="pmu-item-icon" href="/movies" title="Movies">
                            <img src="/files/images/pick-movies.svg" data-toggle="tooltip" data-placement="right"
                                title="" data-original-title="Movies">
                        </a>
                    </li>
                    <li class="pmu-item pmu-item-show">
                        <a class="pmu-item-icon" href="/tv-series" title="TV Series">
                            <img src="/files/images/pick-show.svg" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="TV Series">
                        </a>
                    </li>
                    <li class="pmu-item pmu-item-popular">
                        <a class="pmu-item-icon" href="/most-popular-anime" title="Most Popular">
                            <img src="/files/images/pick-popular.svg" data-toggle="tooltip" data-placement="right"
                                title="" data-original-title="Most Popular">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php


        if (isset($_COOKIE['userID'])) {
            $user_id = $_COOKIE['userID'] ?>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
            }
            ?>
            <div id="header_right">
                <div id="user-slot">
                    <div class="header_right-user logged">
                        <div class="dropdown">
                            <div class="btn-user-avatar" data-toggle="dropdown" aria-expanded="false"
                                aria-controls="user_menu">
                                <div class="profile-avatar">
                                    <?php if ($fetch['image'] == '') {
                                        echo '<img src="' . $websiteUrl . '/files/avatar/default/default.jpeg">';
                                    } else {
                                        echo '<img src="' . $websiteUrl . '/files/avatar/' . $fetch['image'] . '">';
                                    } ?>
                                </div>
                            </div>
                            <div id="user_menu" class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-item dropdown-item-user">
                                    <div class="user-detail">
                                        <div class="name"><strong>
                                                <?php echo $fetch['name']; ?>
                                            </strong></div>
                                        <div class="mail"><a class="__cf_email__">
                                                <?php echo $fetch['email']; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="grid-menu">
                                    <a class="dropdown-item" href="<?= $websiteUrl ?>/user/profile"><i
                                            class="fas fa-user mr-2"></i>Profile</a>
                                    <a class="dropdown-item" href="<?= $websiteUrl ?>/user/watchlist"><i
                                            class="fas fa-heart mr-2"></i>Watch List</a>
                                    <a class="dropdown-item" href="<?= $websiteUrl ?>/user/changepass"><i
                                            class="fas fa-cog mr-2"></i>Change
                                        Password</a>
                                    <div class="clearfix"></div>

                                </div>
                                <a class="dropdown-item text-right text-white" href="<?= $websiteUrl ?>/user/logout">Logout<i
                                        class="fas fa-arrow-right ml-2 mr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php if (!isset($_COOKIE['userID'])) { ?>
            <div id="header_right">
                <div id="user-slot">
                    <div class="header_right-user">
                        <a href="<?= $websiteUrl ?>/user/login" class="btn-user btn btn-sm btn-primary btn-login"><i
                                class="fa-solid fa-user"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="mobile_search" class=""><i class="fa fa-search"></i></div>
        <div class="clearfix"></div>
    </div>
</div>