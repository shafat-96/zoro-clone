<?php 
session_start();
require('./_config.php');
require_once('./_php/anilist_api.php');
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title><?=$websiteTitle?> #1 Watch High Quality Anime Online Without Ads</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title"
        content="<?=$websiteTitle?> #1 Watch High Quality Anime Online Without Ads" />
    <meta name="description"
        content="<?=$websiteTitle?> #1 Watch High Quality Anime Online Without Ads. You can watch anime online free in HD without Ads. Best place for free find and one-click anime." />
    <meta name="keywords"
        content="<?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa" />
    <meta name="charset" content="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="en" />
    <meta property="og:title"
        content="<?=$websiteTitle?> #1 Watch High Quality Anime Online Without Ads">
    <meta property="og:description"
        content="<?=$websiteTitle?> #1 Watch High Quality Anime Online Without Ads. You can watch anime online free in HD without Ads. Best place for free find and one-click anime.">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$websiteTitle?>">
    <meta property="og:url" content="<?=$websiteUrl?>/home">
    <meta itemprop="image" content="<?=$banner?>">
    <meta property="og:image" content="<?=$banner?>">
    <meta property="og:image:secure_url" content="<?=$banner?>">
    <meta property="og:image:width" content="650">
    <meta property="og:image:height" content="350">
    <meta name="apple-mobile-web-app-status-bar" content="#202125">
    <meta name="theme-color" content="#202125">
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/style.css?v=<?=$version?>">
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/min.css?v=<?=$version?>">
    <link rel="apple-touch-icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" />
    <link rel="shortcut icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$websiteUrl?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$websiteUrl?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$websiteUrl?>/favicon-16x16.png">
    <link rel="mask-icon" href="<?=$websiteUrl?>/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" sizes="192x192" href="<?=$websiteUrl?>/files/images/touch-icon-192x192.png?v=<?=$version?>">
    <script type="text/javascript">
    setTimeout(function() {
        var wpse326013 = document.createElement('link');
        wpse326013.rel = 'stylesheet';
        wpse326013.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css';
        wpse326013.type = 'text/css';
        var godefer = document.getElementsByTagName('link')[0];
        godefer.parentNode.insertBefore(wpse326013, godefer);
        var wpse326013_2 = document.createElement('link');
        wpse326013_2.rel = 'stylesheet';
        wpse326013_2.href =
            'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css';
        wpse326013_2.type = 'text/css';
        var godefer2 = document.getElementsByTagName('link')[0];
        godefer2.parentNode.insertBefore(wpse326013_2, godefer2);
    }, 500);
    </script>
    <noscript>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />
    </noscript>
</head>

<body data-page="page_home">
    <div id="sidebar_menu_bg"></div>
    <div id="wrapper" data-page="page_home">
        <?php include('./_php/header.php');?>
        <div class="clearfix"></div>
        <div class="deslide-wrap">
            <div class="container" style="max-width:100%!important;width:100%!important;">
                <div id="slider" class="swiper-container-initialized swiper-container-horizontal">
                    <?php include('./_php/slidebar.php'); ?>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                    <div class="swiper-navigation">
                        <div class="swiper-button swiper-button-next" tabindex="0" role="button"
                            aria-label="Next slide"><i class="fas fa-angle-right"></i></div>
                        <div class="swiper-button swiper-button-prev" tabindex="0" role="button"
                            aria-label="Previous slide"><i class="fas fa-angle-left"></i></div>
                    </div>
                    <div class="clearfix"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>

        <?php include('./_php/trending.php')?>
        <div class="share-buttons share-buttons-home">
            <div class="container">
                <script type="text/javascript"
                    src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63430163bc99824a"></script>
                <div class="share-buttons-block">
                    <div class="share-icon"></div>
                    <div class="sbb-title">
                        <span>Share <?=$websiteTitle?></span>
                        <p class="mb-0">to your friends</p>
                    </div>
                    <div class="addthis_inline_share_toolbox"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div id="anime-featured">

        </div>
        <div id="main-wrapper">
            <div class="container">
                <div id="main-content">
                <?php if(isset($_COOKIE['userID'])){ 
                    $user_id = $_COOKIE['userID'];
                    $select = mysqli_query($conn, "SELECT * FROM `user_history` WHERE user_id = $user_id");
                    $rows = mysqli_fetch_all($select, MYSQLI_ASSOC);
                    $rows = array_reverse($rows);
                    if(count($rows) != 0){ ?>

                <section class="block_area block_area_home">
                    <div class="block_area-header">
                        <div class="float-left bah-heading mr-4">
                            <h2 class="cat-heading"><i class="fas fa-history mr-2"></i>Continue Watching</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-content">
                        <div class="block_area-content block_area-list film_list film_list-grid">
                            <div class="film_list-wrap">

                                <?php 
                    
                     
                        foreach (array_slice($rows,0,4) as $rows) {
                                $cw_slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $rows['anime_title']);
                                $cw_slug = preg_replace('/-+/', '-', $cw_slug);
                                $cw_slug = trim($cw_slug, '-'); 
?>
                                <div class="flw-item">
                                    <div class="film-poster">
                                        <div class="tick ltr">
                                            <div class="tick-item-<?=$rows['dubOrSub']?> tick-eps amp-algn">
                                                <?=strtoupper($rows['dubOrSub'])?></div>
                                        </div>
                                        <div class="tick rtl">
                                            <div class="tick-item tick-eps amp-algn">Episode <?=$rows['anime_ep']?>
                                            </div>
                                        </div>
                                        <img class="film-poster-img lazyload" data-src="<?=$rows['anime_image']?>"
                                            src="<?=$websiteUrl?>/files/images/no_poster.jpg"
                                            alt="<?=$rows['anime_title']?>">
                                        <a class="film-poster-ahref" href="/watch/<?=$rows['anime_id']?>/<?=$cw_slug?>/episode-<?=$rows['anime_ep']?>"
                                            title="<?=$rows['anime_title']?>" data-jname="<?=$rows['anime_title']?>"><i
                                                class="fas fa-play"></i></a>
                                    </div>
                                    <div class="film-detail">
                                        <h3 class="film-name">
                                            <a href="/watch/<?=$rows['anime_id']?>/<?=$cw_slug?>/episode-<?=$rows['anime_ep']?>" title="<?=$rows['anime_title']?>"
                                                data-jname="<?=$rows['anime_title']?>"><?=$rows['anime_title']?></a>
                                        </h3>
                                        <div class="fd-infor">
                                            <span class="fdi-item"><?=$rows['anime_release']?></span>
                                            <span class="dot"></span>
                                            <span class="fdi-item"><?=$rows['anime_type']?></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php } ?>



                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </section>
                <?php } ?>

                <?php } ?>
                    <section class="block_area block_area_home">
                        <div class="block_area-header">
                            <div class="float-left bah-heading mr-4">
                                <h2 class="cat-heading">Ongoing</h2>
                            </div>
                            <div class="float-right viewmore">
                                <a class="btn" href="/ongoing">View more<i
                                        class="fas fa-angle-right ml-2"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-content">
                            <div class="block_area-content block_area-list film_list film_list-grid">
                                <div class="film_list-wrap">

                                    <?php 
                                $result = get_current_season_anime(1,20);
                                $json = [];
                                if(isset($result['data']['Page']['media'])){
                                    foreach($result['data']['Page']['media'] as $anime){
                                        $recentRelease = [
                                            'episodeId' => $anime['id'],
                                            'name' => !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['romaji'],
                                            'imgUrl' => $anime['coverImage']['large'],
                                            'subOrDub' => 'SUB',
                                            'episodeNum' => $anime['nextAiringEpisode']['episode'] ?? ($anime['episodes'] ?? '?')
                                        ];
                                        $json[] = $recentRelease;
                                    }
                                }
                                foreach($json as $recentRelease) { 
                                        // generate SEO slug for details page
                                        $url_title = preg_replace('/[^A-Za-z0-9\-]/', '-', $recentRelease['name']);
                                        $url_title = preg_replace('/-+/', '-', $url_title);
                                        $url_title = trim($url_title, '-');
                                        ?>
                                    <div class="flw-item">
                                        <div class="film-poster">
                                            <div class="tick ltr">
                                                <div class="tick-item-sub  tick-eps amp-algn">
                                                    <?=$recentRelease['subOrDub']?></div>
                                            </div>
                                            <div class="tick rtl">
                                                <div class="tick-item tick-eps amp-algn">Episode
                                                    <?=$recentRelease['episodeNum']?></div>
                                            </div>
                                            <img class="film-poster-img lazyload"
                                                data-src="<?=$recentRelease['imgUrl']?>"
                                                src="<?=$websiteUrl?>/files/images/no_poster.jpg" alt="<?=$recentRelease['name']?>">
                                            <a class="film-poster-ahref" href="/anime/<?=$recentRelease['episodeId']?>/<?=$url_title?>"
                                                title="<?=$recentRelease['name']?>"
                                                data-jname="<?=$recentRelease['name']?>"><i class="fas fa-play"></i></a>
                                        </div>
                                        <div class="film-detail">
                                            <h3 class="film-name">
                                                <a href="/anime/<?=$recentRelease['episodeId']?>/<?=$url_title?>"
                                                    title="<?=$recentRelease['name']?>"
                                                    data-jname="<?=$recentRelease['name']?>"><?=$recentRelease['name']?></a>
                                            </h3>
                                            <div class="fd-infor">
                                                <span class="fdi-item">Latest</span>
                                                <span class="dot"></span>
                                                <span class="fdi-item"><?=$recentRelease['subOrDub']?></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <?php } ?>




                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </section>
                    <section class="block_area block_area_home">
                        <div class="block_area-header">
                            <div class="float-left bah-heading mr-4">
                                <h2 class="cat-heading">Latest releases</h2>
                            </div>
                            <div class="float-right viewmore">
                                <a class="btn" href="/latest/subbed">View more<i
                                        class="fas fa-angle-right ml-2"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-content">
                            <div class="block_area-content block_area-list film_list film_list-grid">
                                <div class="film_list-wrap">
                                    <?php 
                                $result = get_latest_releases(1,20);
                                $json = [];
                                if(isset($result['data']['Page']['media'])){
                                    foreach($result['data']['Page']['media'] as $anime){
                                        $recentReleaseDub = [
                                            'episodeId' => $anime['id'],
                                            'name' => !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['romaji'],
                                            'imgUrl' => $anime['coverImage']['large'],
                                            'subOrDub' => 'SUB',
                                            'episodeNum' => $anime['episodes'] ?? '?'  // upcoming might not have episode yet
                                        ];
                                        $json[] = $recentReleaseDub;
                                    }
                                }
                                foreach($json as $recentReleaseDub) { 
                                        $url_title = preg_replace('/[^A-Za-z0-9\-]/', '-', $recentReleaseDub['name']);
                                        $url_title = preg_replace('/-+/', '-', $url_title);
                                        $url_title = trim($url_title, '-');
                                        ?>

                                    <div class="flw-item">
                                        <div class="film-poster">
                                            <div class="tick ltr">
                                                <div class="tick-item-dub  tick-eps amp-algn">
                                                    <?=$recentReleaseDub['subOrDub']?></div>
                                            </div>
                                            <div class="tick rtl">
                                                <div class="tick-item tick-eps amp-algn">Episode
                                                    <?=$recentReleaseDub['episodeNum']?></div>
                                            </div>
                                            <img class="film-poster-img lazyload"
                                                data-src="<?=$recentReleaseDub['imgUrl']?>"
                                                src="<?=$websiteUrl?>/files/images/no_poster.jpg"
                                                alt="<?=$recentReleaseDub['imgUrl']?>">
                                            <a class="film-poster-ahref"
                                                href="/anime/<?=$recentReleaseDub['episodeId']?>/<?=$url_title?>"
                                                title="<?=$recentReleaseDub['name']?>"
                                                data-jname="<?=$recentReleaseDub['name']?>"><i
                                                    class="fas fa-play"></i></a>
                                        </div>
                                        <div class="film-detail">
                                            <h3 class="film-name">
                                                <a href="/anime/<?=$recentReleaseDub['episodeId']?>/<?=$url_title?>"
                                                    title="<?=$recentReleaseDub['name']?>"
                                                    data-jname="<?=$recentReleaseDub['name']?>"><?=$recentReleaseDub['name']?></a>
                                            </h3>
                                            <div class="fd-infor">
                                                <span class="fdi-item">Latest</span>
                                                <span class="dot"></span>
                                                <span class="fdi-item">Dub</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Upcoming Anime Section -->
                    <section class="block_area block_area_home">
                        <div class="block_area-header">
                            <div class="float-left bah-heading mr-4">
                                <h2 class="cat-heading">Upcoming</h2>
                            </div>
                            <div class="float-right viewmore">
                                <a class="btn" href="/upcoming">View more<i class="fas fa-angle-right ml-2"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-content">
                            <div class="block_area-content block_area-list film_list film_list-grid">
                                <div class="film_list-wrap">
                                    <?php 
                                    $result = get_upcoming_anime(1,20);
                                    $upcoming = [];
                                    if(isset($result['data']['Page']['media'])){
                                        foreach($result['data']['Page']['media'] as $anime){
                                            $upcomingItem = [
                                                'id' => $anime['id'],
                                                'name' => !empty($anime['title']['english']) ? $anime['title']['english'] : $anime['title']['romaji'],
                                                'imgUrl' => $anime['coverImage']['large'],
                                                'season' => $anime['season'],
                                                'year' => $anime['seasonYear']
                                            ];
                                            $upcoming[] = $upcomingItem;
                                        }
                                    }
                                    foreach($upcoming as $u) {
                                        $url_title = preg_replace('/[^A-Za-z0-9\-]/', '-', $u['name']);
                                        $url_title = preg_replace('/-+/', '-', $url_title);
                                        $url_title = trim($url_title, '-');
                                    ?>
                                    <div class="flw-item">
                                        <div class="film-poster">
                                            <div class="tick ltr">
                                                <div class="tick-item-sub tick-eps amp-algn">TBA</div>
                                            </div>
                                            <div class="tick rtl">
                                                <div class="tick-item tick-eps amp-algn">Soon</div>
                                            </div>
                                            <img class="film-poster-img lazyload" data-src="<?=$u['imgUrl']?>" src="<?=$websiteUrl?>/files/images/no_poster.jpg" alt="<?=$u['name']?>">
                                            <a class="film-poster-ahref" href="/anime/<?=$u['id']?>/<?=$url_title?>" title="<?=$u['name']?>" data-jname="<?=$u['name']?>"><i class="fas fa-play"></i></a>
                                        </div>
                                        <div class="film-detail">
                                            <h3 class="film-name">
                                                <a href="/anime/<?=$u['id']?>/<?=$url_title?>" title="<?=$u['name']?>" data-jname="<?=$u['name']?>"><?=$u['name']?></a>
                                            </h3>
                                            <div class="fd-infor">
                                                <span class="fdi-item"><?=$u['season']?> <?=$u['year']?></span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </section>

                     <div class="clearfix"></div>
                </div>
                <?php include('./_php/sidenav.php'); ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php include('./_php/footer.php'); ?>
        <div id="mask-overlay"></div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js">
        </script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/app.js"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/comman.js"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/movie.js"></script>
        <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?=$websiteUrl?>/files/js/function.js"></script>
    </div>
</body>

</html>