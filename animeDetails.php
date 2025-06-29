<?php 
session_start();
require_once('./_config.php');
require_once('./_php/anilist_api.php'); // Include the AniList API integration

$parts = parse_url($_SERVER['REQUEST_URI']); 
$page_url = explode('/', $parts['path']);

// New URL handling logic
$anime_id = null;
$anime_title = '';

// Check if we have enough parts in the URL
if (count($page_url) >= 4) {
    // Get the ID which should be the third element (index 2)
    $anime_id = intval($page_url[2]);
    
    // Get the title which should be the fourth element (index 3)
    $anime_title = urldecode($page_url[3]);
} else {
    // Fallback to old format or handle error
    $anime_id = intval($page_url[count($page_url)-1]);
}

// Get anime details from AniList API
$animeData = get_anime_details($anime_id);

// Process the AniList API response into the format expected by the template
$getAnime = [];
if (isset($animeData['data']) && isset($animeData['data']['Media'])) {
    $media = $animeData['data']['Media'];
    
    // Map AniList data to the format expected by the template
    $getAnime['name'] = !empty($media['title']['english']) ? $media['title']['english'] : $media['title']['romaji'];
    $getAnime['synopsis'] = $media['description'];
    $getAnime['imageUrl'] = $media['coverImage']['large'];
    $getAnime['type'] = $media['format'];
    $getAnime['status'] = $media['status'] === 'FINISHED' ? 'Completed' : 'Ongoing';
    $getAnime['released'] = $media['seasonYear'] ?? 'Unknown';
    
    // Map genres
    $genres = [];
    if (isset($media['genres']) && is_array($media['genres'])) {
        $genres = $media['genres'];
    }
    $getAnime['genres'] = implode(', ', $genres);
    
    // Create othername from romaji and native
    $othername = [];
    if (!empty($media['title']['romaji']) && $media['title']['romaji'] !== $getAnime['name']) {
        $othername[] = $media['title']['romaji'];
    }
    if (!empty($media['title']['native'])) {
        $othername[] = $media['title']['native'];
    }
    $getAnime['othername'] = implode(', ', $othername);
    
    // Handle episode data
    $getAnime['episode_id'] = [];
    if (isset($media['episodes']) && $media['episodes'] > 0) {
        for ($i = 1; $i <= $media['episodes']; $i++) {
            $getAnime['episode_id'][] = [
                'episodeId' => $anime_id . '-episode-' . $i,
                'number' => $i
            ];
        }
    } else if (isset($media['streamingEpisodes']) && is_array($media['streamingEpisodes'])) {
        foreach ($media['streamingEpisodes'] as $index => $episode) {
            $getAnime['episode_id'][] = [
                'episodeId' => $anime_id . '-episode-' . ($index + 1),
                'number' => $index + 1
            ];
        }
    }
    
    // If no episodes are found, create at least one for the watch button
    if (empty($getAnime['episode_id'])) {
        $getAnime['episode_id'][] = [
            'episodeId' => $anime_id . '-episode-1',
            'number' => 1
        ];
    }
} else {
    // Fallback if the anime is not found
    $getAnime['name'] = 'Anime Not Found';
    $getAnime['synopsis'] = 'No information available.';
    $getAnime['imageUrl'] = $websiteUrl . '/files/images/no_poster.jpg';
    $getAnime['type'] = 'Unknown';
    $getAnime['status'] = 'Unknown';
    $getAnime['released'] = 'Unknown';
    $getAnime['genres'] = '';
    $getAnime['othername'] = '';
    $getAnime['episode_id'] = [];
}

$episodelist = $getAnime['episode_id'];

// After processing $getAnime and before closing PHP, add slug generator
$url_title = preg_replace('/[^A-Za-z0-9\-]/', '-', $getAnime['name']);
$url_title = preg_replace('/-+/', '-', $url_title);
$url_title = trim($url_title, '-');
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Watch <?=$getAnime['name']?> - <?=$websiteTitle?></title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="title" content="Watch <?=$getAnime['name']?> - <?=$websiteTitle?>" />
    <meta name="description" content="<?=substr($getAnime['synopsis'],0, 150)?>.... Read More On <?=$websiteTitle?>" />
    <meta name="keywords" content="<?=$getAnime['name']?>, <?=$getAnime['othername']?>, <?=$websiteTitle?>, watch anime online, free anime, anime stream, anime hd, english sub, kissanime, gogoanime, animeultima, 9anime, 123animes, <?=$websiteTitle?>, vidstreaming, gogo-stream, animekisa, zoro.to, gogoanime.run, animefrenzy, animekisa" />
    <meta name="charset" content="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Content-Language" content="en" />
    <meta property="og:title" content="Watch <?=$getAnime['name']?> - <?=$websiteTitle?>">
    <meta property="og:description" content="W<?=substr($getAnime['synopsis'],0, 150)?>.... Read More On <?=$websiteTitle?>.">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?=$websiteTitle?>">
    <meta property="og:url" content="<?=$websiteUrl?>/anime/<?=$anime_id?>/<?=$url_title?>">
    <meta itemprop="image" content="<?=$getAnime['imageUrl']?>">
    <meta property="og:image" content="<?=$getAnime['imageUrl']?>">
    <meta property="og:image:secure_url" content="<?=$getAnime['imageUrl']?>">
    <meta property="og:image:width" content="650">
    <meta property="og:image:height" content="350">
    <meta property="twitter:title" content="Watch <?=$getAnime['name']?> - <?=$websiteTitle?>">
    <meta property="twitter:description" content="<?=substr($getAnime['synopsis'],0, 150)?>.... Read More On <?=$websiteTitle?>.">
    <meta property="twitter:url" content="<?=$websiteUrl?>/anime/<?=$anime_id?>/<?=$url_title?>">
    <meta property="twitter:card" content="summary">
    <meta name="apple-mobile-web-app-status-bar" content="#202125">
    <meta name="theme-color" content="#202125">
    <link rel="apple-touch-icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" />
    <link rel="shortcut icon" href="<?=$websiteUrl?>/favicon.png?v=<?=$version?>" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$websiteUrl?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$websiteUrl?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$websiteUrl?>/favicon-16x16.png">
    <link rel="mask-icon" href="<?=$websiteUrl?>/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" sizes="192x192" href="<?=$websiteUrl?>/files/images/touch-icon-192x192.png?v=<?=$version?>">
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/style.css?v=<?=$version?>">
    <link rel="stylesheet" href="<?=$websiteUrl?>/files/css/min.css?v=<?=$version?>">
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63430163bc99824a"></script>
    <script type="text/javascript">
        setTimeout(function () {
            var wpse326013 = document.createElement('link');
            wpse326013.rel = 'stylesheet';
            wpse326013.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css';
            wpse326013.type = 'text/css';
            var godefer = document.getElementsByTagName('link')[0];
            godefer.parentNode.insertBefore(wpse326013, godefer);
            var wpse326013_2 = document.createElement('link');
            wpse326013_2.rel = 'stylesheet';
            wpse326013_2.href = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css';
            wpse326013_2.type = 'text/css';
            var godefer2 = document.getElementsByTagName('link')[0];
            godefer2.parentNode.insertBefore(wpse326013_2, godefer2);
        }, 500);
    </script>
    <noscript>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />
    </noscript>
    <style>
        /* Exact button styling to match old design with new color #cae962 */
        :root {
            --primary-color: #cae962; /* Lime green color */
            --primary-dark: #b8d755; /* Slightly darker shade for hover */
            --light-bg: rgba(255,255,255,0.1);
        }
        
        .btn-radius {
            border-radius: 5px !important;
            padding: 8px 15px !important;
            font-weight: 500 !important;
            display: inline-block !important;
            margin-right: 5px !important;
        }
        .btn-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: #111 !important; /* Dark text for contrast with light green */
            box-shadow: 0 2px 6px rgba(202, 233, 98, 0.4) !important;
        }
        .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 4px 10px rgba(202, 233, 98, 0.6) !important;
            transform: translateY(-2px) !important;
            transition: all 0.2s ease !important;
        }
        .btn-light {
            background-color: rgba(255,255,255,0.1) !important;
            color: #fff !important;
            border: 1px solid rgba(255,255,255,0.1) !important;
        }
        .btn-light:hover {
            background-color: rgba(255,255,255,0.15) !important;
            color: #fff !important;
        }
        .btn-play {
            min-width: 130px !important;
        }
        
        /* Button layout and positioning */
        .film-buttons {
            margin-bottom: 20px !important;
            display: flex !important;
            flex-wrap: wrap !important;
        }
        .dr-fav {
            display: inline-flex !important;
        }
        #watch-list-content {
            display: inline-flex !important;
            margin-left: 10px !important;
        }
        
        /* Status indicators and dot */
        .tick-item {
            display: inline-block !important;
            background: rgba(255,255,255,0.1) !important;
            padding: 3px 8px !important;
            border-radius: 3px !important; 
            font-size: 12px !important;
            margin-right: 8px !important;
            color: #fff !important;
        }
        .tick-quality {
            background: var(--primary-color) !important;
            color: #111 !important; /* Dark text for contrast */
        }
        .dot {
            width: 4px !important;
            height: 4px !important;
            border-radius: 50% !important;
            background: rgba(255,255,255,0.3) !important;
            display: inline-block !important;
            margin: 3px 6px !important;
        }
        
        /* Genre styling update */
        .item-list a {
            background: rgba(255,255,255,0.1) !important;
            color: #fff !important;
            padding: 2px 10px !important;
            border-radius: 15px !important;
            margin-right: 5px !important;
            margin-bottom: 5px !important;
            display: inline-block !important;
            transition: all .2s ease !important;
        }
        .item-list a:hover {
            background: var(--primary-color) !important;
            color: #111 !important;
        }
        
        /* Mobile responsiveness */
        @media only screen and (max-width: 479.98px) {
            .film-buttons {
                flex-direction: column !important;
            }
            .film-buttons a {
                margin-bottom: 10px !important;
                display: block !important;
                width: 100% !important;
                text-align: center !important;
                margin-right: 0 !important;
            }
            .dr-fav {
                display: block !important;
                width: 100% !important;
            }
            #watch-list-content {
                display: block !important;
                width: 100% !important;
                margin-left: 0 !important;
                margin-top: 10px !important;
            }
        }
    </style>
</head>

<body data-page="movie_info">
    <div id="sidebar_menu_bg"></div>
    <div id="wrapper" data-page="page_home">
        <?php include('./_php/header.php'); ?>
        <div class="clearfix"></div>
        <div id="main-wrapper" date-page="movie_info" data-id="<?=$anime_id?>">
            <div id="ani_detail">
                <div class="ani_detail-stage">
                    <div class="container">
                        <div class="anis-cover-wrap">
                            <div class="anis-cover"
                                style="background-image: url('<?=$getAnime['imageUrl']?>')"></div>
                        </div>
                        <div class="anis-content">
                            <div class="anisc-poster">
                                <div class="film-poster">
                                    <img src="<?=$websiteUrl?>/files/images/no_poster.jpg"
                                        data-src="<?=$getAnime['imageUrl']?>"
                                        class="lazyload film-poster-img">
                                </div>
                            </div>
                            <div class="anisc-detail">
                                <div class="prebreadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li itemprop="itemListElement" itemscope=""
                                                itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                                                <a itemprop="item" href="/"><span itemprop="name">Home</span></a>
                                                <meta itemprop="position" content="1">
                                            </li>
                                            <li itemprop="itemListElement" itemscope=""
                                                itemtype="http://schema.org/ListItem" class="breadcrumb-item">
                                                <a itemprop="item" href="/anime"><span itemprop="name">Anime</span></a>
                                                <meta itemprop="position" content="2">
                                            </li>
                                            <li itemprop="itemListElement" itemscope=""
                                                itemtype="http://schema.org/ListItem"
                                                class="breadcrumb-item dynamic-name" data-jname="<?=$getAnime['name']?>"
                                                aria-current="page">
                                                <a itemprop="item" href="/anime/<?=$anime_id?>/<?=$url_title?>"><span itemprop="name"><?=$getAnime['name']?></span></a>
                                                <meta itemprop="position" content="3">
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <h2 class="film-name dynamic-name" data-jname="<?=$getAnime['name']?>"><?=$getAnime['name']?></h2>
                                <div class="film-stats">
                                    <div class="tac tick-item tick-quality">HD</div>
                                    <div class="tac tick-item tick-dub">
                                    <?php $str = $getAnime['name'];
                                          $last_word_start = strrpos ( $str , " ") + 1;
                                          $last_word_end = strlen($str) - 1;
                                          $last_word = substr($str, $last_word_start, $last_word_end);
                                          if ($last_word == "(Dub)"){echo "Dubbed";} else {echo "Subbed";}
                                    ?>
                                    </div>
                                    <span class="dot"></span>
                                    <span class="item"><?=$getAnime['type']?></span>
                                    <div class="clearfix"></div>
                                </div>
                                <?php if(count($getAnime['episode_id']) == 0) {
                                    echo "";
                                } else { ?>
                                <div class="film-buttons">
                                    <?php 
                                    // Only show watch button if anime is not in NOT_YET_RELEASED status
                                    $showWatchButton = true;
                                    
                                    // Check if the anime has NOT_YET_RELEASED status from AniList data
                                    if (isset($animeData['data']) && isset($animeData['data']['Media']) && isset($animeData['data']['Media']['status'])) {
                                        if ($animeData['data']['Media']['status'] === 'NOT_YET_RELEASED') {
                                            $showWatchButton = false;
                                        }
                                    }
                                    
                                    if ($showWatchButton) { 
                                    ?>
                                    <a href="/watch/<?=$anime_id?>/<?=$url_title?>/episode-1" class="btn btn-radius btn-primary btn-play"><i class="fas fa-play mr-2"></i>Watch now</a>
                                    <?php } else { ?>
                                    <div class="btn btn-radius btn-light disabled"><i class="fas fa-clock mr-2"></i>Coming Soon</div>
                                    <?php } ?>

                                            <div class="dr-fav" id="watch-list-content">
                                        <?php if(isset($_COOKIE['userID'])){
                                             $user_id = $_COOKIE['userID'];
                                             $watchLater = mysqli_query($conn, "SELECT * FROM `watch_later` WHERE user_id = '$user_id' AND anime_id = '$anime_id'"); 
                                             $watchLater = mysqli_fetch_assoc($watchLater); 
                                             
                                             if(isset($watchLater['anime_id'])){ ?>
                                                <a id="addToAnimeList" class="btn btn-radius btn-light" data-anime-id="<?=$anime_id?>">&nbsp;<i class='fas fa-minus mr-2'></i> Remove from List&nbsp;</a>
                                             <?php } else { ?>
                                                <a id="addToAnimeList" class="btn btn-radius btn-light" data-anime-id="<?=$anime_id?>">&nbsp;<i class='fas fa-plus mr-2'></i> Add to List&nbsp;</a>
                                             <?php } ?>
                                            <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                document.getElementById('addToAnimeList').addEventListener("click", function() {
                                                    let btnValue = this.getAttribute('data-anime-id');
                                                    let button = this;
                                                    
                                                    // Show loading state
                                                    let originalHtml = button.innerHTML;
                                                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                                                    
                                                    $.ajax({
                                                        url: '<?=$websiteUrl?>/user/ajax/watchlist.php',
                                                        type: 'POST',
                                                        data: {
                                                            btnValue: btnValue,
                                                            type: 'anime'
                                                        },
                                                        success: function(response) {
                                                            button.innerHTML = response;
                                                        },
                                                        error: function() {
                                                            // Show error message and restore button
                                                            button.innerHTML = originalHtml;
                                                            alert('Failed to update list. Please try again.');
                                                        }
                                                    });
                                                });
                                            });
                                            </script>
                                        <?php } else { ?>
                                            <a href="<?=$websiteUrl?>/user/login?animeId=<?=$anime_id?>" class="btn btn-radius btn-light">&nbsp;<i class='fas fa-plus mr-2'></i>&nbsp;Login to Add&nbsp;</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="film-description m-hide">
                                    <div class="text"><?=$getAnime['synopsis']?></div>
                                </div>
                                <div class="film-text m-hide"><?=$websiteTitle?> is a site to watch online anime like <strong><?=$getAnime['name']?></strong> online, or you can even watch <strong><?=$getAnime['name']?></strong> in HD quality</div>
                                <div class="share-buttons share-buttons-min mt-3">
                                <div class="share-buttons-block" style="padding-bottom: 0 !important;">
                                    <div class="share-icon"></div>
                                    <div class="sbb-title">
                                        <span>Share Anime</span>
                                        <p class="mb-0">to your friends</p>
                                    </div>
                                    <div class="addthis_inline_share_toolbox"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            </div>
                            <div class="anisc-info-wrap">
                                <div class="anisc-info">
                                    <div class="item item-title w-hide">
                                        <span class="item-head">Overview:</span>
                                        <div class="text"><?=$getAnime['synopsis']?></div>
                                    </div>
                                    <div class="item item-title">
                                        <span class="item-head">Other names:</span> <span class="name"><?=$getAnime['othername']?></span>
                                    </div>
                                    <div class="item item-title">
                                        <span class="item-head">Language:</span> 
                                        <span class="name">
                                            <?php $str = $getAnime['name'];
                                                $last_word_start = strrpos ( $str , " ") + 1;
                                                $last_word_end = strlen($str) - 1;
                                                $last_word = substr($str, $last_word_start, $last_word_end);
                                                if ($last_word == "(Dub)"){echo "Dubbed";} else {echo "Subbed";}
                                            ?>
                                        </span>
                                    </div>
                                    <div class="item item-title">
                                        <span class="item-head">Episodes:</span> <span class="name"><?php echo count($getAnime['episode_id'])?></span>
                                    </div>
                                    <div class="item item-title">
                                        <span class="item-head">Release Year:</span> <span class="name"><?=$getAnime['released']?></span>
                                    </div>
                                    <div class="item item-title">
                                        <span class="item-head">Type:</span> <span class="name"><?=$getAnime['type']?></span>
                                    </div>
                                    <div class="item item-title">
                                        <span class="item-head">Status:</span> <a href="<?php if ($getAnime['status'] == "Completed") {echo "/status/completed";} else {echo "/status/ongoing";}?>"><?=$getAnime['status']?></a>
                                    </div>
                                    <div class="item item-list">
    <span class="item-head">Genres:</span>
    <?php
    // Split genres string into an array using comma and optional whitespace as delimiter
    $genresArray = array_map('trim', explode(',', $getAnime['genres']));
    
    // Loop through each genre in the array
    foreach($genresArray as $genre) {
        // Trim any extra whitespace
        $genre = trim($genre);
        if (!empty($genre)) { // Check if genre is not empty
    ?>
            <a href="<?=$websiteUrl?>/genre/<?=strtolower(str_replace(" ", "+", $genre))?>"><?=$genre?></a>
    <?php
        }
    }
    ?>
</div>

                                    <div class="film-text w-hide"><?=$websiteTitle?> is a site to watch online anime like <strong><?=$getAnime['name']?></strong> online, or you can even watch <strong><?=$getAnime['name']?></strong> in HD quality</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div id="main-content">
                    <section class="block_area block_area-comment">
                        <div class="block_area-header block_area-header-tabs">
                            <div class="float-left bah-heading mr-4">
                                <h2 class="cat-heading">Comments</h2>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-content">
                          <?php include('./_php/disqus.php'); ?>
                        </div>
                    </section>

                    <?php include('./_php/recommendations.php'); ?>                    <div class="clearfix"></div>                </div>                <?php include('./_php/sidenav.php'); ?>                <div class="clearfix"></div>            </div>        </div>        <?php include('./_php/footer.php'); ?>
        <div id="mask-overlay"></div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
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