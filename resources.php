<?php
// Set cache-control headers for 24 hours
header("Cache-Control: max-age=86400, public");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");

// PHP code to define the conference deadlines, URLs, and venues
$deadlines = [
    
    'WINE' => [
        'url' => 'https://wine2025.cs.rutgers.edu/', 
        'abstract' => '2025-07-03', 
        'full_paper' => '2025-07-03', 
        'notification' => '2025-09-15',
        'venue' => 'Rutgers University, USA'
    ],
    'SODA' => [
        'url' => 'https://www.siam.org/conferences-events/siam-conferences/soda26/', 
        'abstract' => '2025-07-14', 
        'full_paper' => '2025-07-14', 
        'notification' => '2025-10-15',
        'venue' => 'Vancouver, Canada'
    ],
    'AAAI' => [
        'url' => 'https://aaai.org/conference/aaai/aaai-26/', 
        'abstract' => '2025-07-25', 
        'full_paper' => '2025-08-01', 
        'notification' => '2025-11-03',
        'venue' => 'Singapore'
    ],
    'AAMAS' => [
        'url' => 'https://cyprusconferences.org/aamas2026/call-for-papers-main-track/', 
        'abstract' => '2025-09-25', 
        'full_paper' => '2025-10-02', 
        'notification' => '2025-12-23',
        'venue' => 'Paphos, Cyprus'
    ],
    'ITCS' => [
        'url' => 'http://itcs-conf.org/', 
        'abstract' => '2024-09-03', 
        'full_paper' => '2024-09-05', 
        'notification' => '2024-11-02',
        'venue' => 'New York, USA'
    ],
    'STOC' => [
        'url' => 'https://acm-stoc.org/stoc2025/', 
        'abstract' => '2024-11-04', 
        'full_paper' => '2024-11-04', 
        'notification' => '2025-02-01',
        'venue' => 'Prague, Czech Republic'
    ],
    'FAccT' => [
        'url' => 'https://facctconference.org/', 
        'abstract' => '2025-01-15', 
        'full_paper' => '2025-01-22', 
        'notification' => '2025-04-11',
        'venue' => 'Athens, Greece'
    ],
    'IJCAI' => [
        'url' => 'https://2025.ijcai.org/', 
        'abstract' => '2025-01-16', 
        'full_paper' => '2025-01-23', 
        'notification' => '2025-04-28',
        'venue' => 'Montreal, Canada'
    ],
    'EC' => [
        'url' => 'https://ec25.sigecom.org/', 
        'abstract' => '2025-02-03', 
        'full_paper' => '2025-02-10', 
        'notification' => '2025-05-17',
        'venue' => 'Stanford, USA'
    ],
    'ICALP' => [
        'url' => 'https://conferences.au.dk/icalp2025', 
        'abstract' => '2025-02-08', 
        'full_paper' => '2025-02-08', 
        'notification' => '2025-04-14',
        'venue' => 'Aarhus, Denmark'
    ],
    'FOCS' => [
        'url' => 'https://focs.computer.org/2025/', 
        'abstract' => '2025-04-03', 
        'full_paper' => '2025-04-03', 
        'notification' => '2025-07-08',
        'venue' => 'Sydney, Australia'
    ],
    'ESA' => [
        'url' => 'https://algo-conference.org/2025/esa/', 
        'abstract' => '2025-04-21', 
        'full_paper' => '2025-04-21', 
        'notification' => '2025-06-23',
        'venue' => 'Warsaw, Poland'
    ],
    'COMSOC' => [
        'url' => 'https://www.ac.tuwien.ac.at/comsoc2025/', 
        'abstract' => '2025-05-08', 
        'full_paper' => '2025-05-08', 
        'notification' => '2025-07-15',
        'venue' => 'Vienna, Austria'
    ],
    'NeurIPS' => [
        'url' => 'https://neurips.cc/Conferences/2025', 
        'abstract' => '2025-05-11', 
        'full_paper' => '2025-05-15', 
        'notification' => '2025-09-18',
        'venue' => 'San Diego, USA'
    ],
    'SAGT' => [
        'url' => 'https://www.bath.ac.uk/events/the-18th-international-symposium-on-algorithmic-game-theory/', 
        'abstract' => '2025-05-20', 
        'full_paper' => '2025-05-23', 
        'notification' => '2025-07-30',
        'venue' => 'Bath, UK'
    ]



];


// Function to calculate the countdown days
function getCountdown($deadline) {
    $now = new DateTime();
    $deadlineDate = new DateTime($deadline);
    $interval = $now->diff($deadlineDate);
    $days = (int)$interval->format('%r%a');
    
    return $days;
}

// Function to format the countdown with colors
function formatCountdown($days) {
    if ($days >= 0) {
        return "<span class='countdown green'>{$days} days</span>";
    } else {
        $daysAgo = abs($days);
        return "<span class='countdown red'>{$daysAgo} days ago</span>";
    }
}

// Function to format date as "11th July 2024"
function formatDateWithSuffix($date) {
    $dateObj = new DateTime($date);
    $day = $dateObj->format('j'); // Get the day (without leading zero)
    $month = $dateObj->format('M'); // Get the full month name
    $year = $dateObj->format('Y'); // Get the year

    // Determine the suffix for the day (st, nd, rd, th)
    if ($day == 1 || $day == 21 || $day == 31) {
        $suffix = 'st';
    } elseif ($day == 2 || $day == 22) {
        $suffix = 'nd';
    } elseif ($day == 3 || $day == 23) {
        $suffix = 'rd';
    } else {
        $suffix = 'th';
    }

    return $day . $suffix . ' ' . $month . ' ' . $year;
}
?>


<!-- HTML part begins here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vishwa Prakash HV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400&display=swap"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/resource_styles.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/favicon/android-chrome-192x192.png" sizes="192x192" />
    <link rel="icon" type="image/png" href="assets/favicon/android-chrome-512x512.png" sizes="512x512" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" href="assets/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="assets/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" />
    <link rel="manifest" href="assets/favicon/site.webmanifest" />


</head>
<body>

    <!-- Background section -->
    <div class="bg"></div>

    <!-- Main content section -->
    <div class="content">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Vishwa Prakash HV</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
           
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#home" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#about" >Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#research" >Research</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#contact" >Contact</a>
                    </li>
                    <!-- Divider -->
                    <li class="nav-item divider"></li>
                    <!-- External Link -->
                    <li class="nav-item">
                        <a class="nav-link active external-link" href="resources.php">
                            Resources <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        </a>
                    </li>
                    
                    <!-- Divider -->
                    <li class="nav-item divider"></li>
                    <li class="nav-item">
                        <a class="nav-link external-link" href="https://blog.vishwaprakash.com/">
                            Blog <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="resources">
        <div class="container mt-4">
            <h1>My Talks: Slides & Recordings</h1>
                <ul>
                    <li>
                        EFX Exists for Three Types of Agents - <a href="https://www.tcs.tifr.res.in/~amd-24/schedule.html#prakash" target="_blank"><em>AMD Workshop, FSTTCS, IIT Gandhinagar</em></a>, <em>Dec 2024</em>. 
                        <a href="https://nc.vishwaprakash.com/index.php/s/H76H8qs7D4snyfJ" target="_blank"><i class="fa fa-file-pdf"></i></a> 
                        <a href="https://www.youtube.com/live/zBQFJ8hHp1U?si=HYV6NLcZ98xae6ZM" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        Popular matchings with one sided preferences - <a href="https://algo.csa.iisc.ac.in/winterschool24/" target="_blank"><em>TCS winter school, IISC</em></a>, <em>Dec 2024</em>. 
                        <a href="https://nc.vishwaprakash.com/index.php/s/GR2mC9P3sK6LFc9" target="_blank"><i class="fa fa-file-pdf"></i></a> 
                        <a href="https://www.youtube.com/watch?v=sHIb4tAs_G8&list=PLmx4utxjUQD6GVpJs1_e0IbdsW1kGqnbj&index=5" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        Dulmage-Mendelsohn decomposition - <a href="https://algo.csa.iisc.ac.in/winterschool24/" target="_blank"><em>TCS winter school, IISC</em></a>, <em>Dec 2024</em>. 
                        <a href="https://nc.vishwaprakash.com/index.php/s/AztSCtFeMCo9XMK" target="_blank"><i class="fa fa-file-pdf"></i></a> 
                        <a href="https://www.youtube.com/watch?v=sHIb4tAs_G8&list=PLmx4utxjUQD6GVpJs1_e0IbdsW1kGqnbj&index=5" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        Proportional Allocations of Indivisible resources: Insights via Matchings - <em>Dartmouth</em>, <em>March 2024</em>. 
                        <a href="https://nc.vishwaprakash.com/index.php/s/m85GpbHLsM6HSNY" target="_blank"><i class="fa fa-file-pdf"></i></a> 
                        <a href="https://youtu.be/z8J5vKQT-rQ" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li>
                        Diverse Stable Matching - <em>IIT Delhi</em>, <em>2023</em>. 
                        <a href="https://nc.vishwaprakash.com/index.php/s/wbfjeCxAZfXYJ9G" target="_blank"><i class="fa fa-file-pdf"></i></a>
                    </li>
                </ul>
        </div>
        <div class="container mt-4" >
            <h1>Conference Tracker</h1>
            <div class="table_wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Conference</th>
                            <th>Abstract</th>
                            <th>Full Paper</th>
                            <th>Notification</th>
                            <th>Venue</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($deadlines as $conference => $data): ?>
                        <tr>
                            <td><a href="<?php echo $data['url']; ?>" target="_blank"><?php echo $conference; ?></a></td>
                            <td>
                                <?php
                                    $abstractCountdown = getCountdown($data['abstract']);
                                    echo "" . formatDateWithSuffix($data['abstract']) . "<br>" . formatCountdown($abstractCountdown);
                                ?>
                            </td>
                            <td>
                                <?php
                                    $fullPaperCountdown = getCountdown($data['full_paper']);
                                    echo "" . formatDateWithSuffix($data['full_paper']) . "<br>" . formatCountdown($fullPaperCountdown);
                                ?>
                            </td>
                            <td>
                                <?php
                                    $notificationCountdown = getCountdown($data['notification']);
                                    echo "" . formatDateWithSuffix($data['notification']) . "<br>" . formatCountdown($notificationCountdown);
                                ?>
                            </td>
                            <td><?php echo $data['venue']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">
                    <p>&copy; 2024 Vishwa. All rights reserved.</p>
                    <p><a href="#top" class="scroll-to-top">Back to Top</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include JavaScript file -->
    <!-- <script src="assets/js/scroll.js"></script> -->
    <!-- <script src="assets/js/readmore.js"></script> -->
    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        $(".navbar-collapse a").click(function () {
          $(".navbar-collapse").collapse("hide");
        });
    </script>


    </div> 
    <!-- div content -->
</body>
</html>
