<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');

include '../logic.php';
$salam = hari();
$id = $_GET['id'];
$data = runQuery("SELECT * FROM tb_data WHERE id = $id ")[0];
$type = 'view';
$minute = date("i");
$hour = date("H");
$year = date("Y");
$date = date("d");
$month = date("m");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = update($_POST);
  
    if($result !== false && $result > 0) {
        $bagian = $_POST['unit'];
        $nik = $_POST['nik'];
        $action = "edit";
        $stmt = $koneksi->prepare("INSERT INTO tb_log (action, bagian, nik, minute, hour, year, date, month) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiiiii", $action, $bagian, $nik, $minute, $hour, $year, $date, $month);
        $stmt->execute();
        $stmt->close();
        header("location:detail.php?id=$id");
    } else {
        echo "Failed to update data";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <style>
    input, textarea, select, button {
  margin: 0;
  padding: 0;
  border: 0;
  outline: none;
  box-shadow: none;
  background: none;
  -webkit-appearance: none;  /* For WebKit browsers like Safari & Chrome */
  -moz-appearance: none;     /* For Firefox */
  appearance: none;         /* General rule */
}

.hide {
        display: none;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <div class="navbar-brand m-0" href="" target="_blank">
        <span class="ms-3 fs-5 font-weight-bold">Selamat <?php echo $salam; ?></span>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../pages/dashboard.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path></svg>
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/log.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.515 1.019A7 7 0 008 1V0a8 8 0 01.589.022l-.074.997zm2.004.45a7.003 7.003 0 00-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 00-.439-.27l.493-.87a8.025 8.025 0 01.979.654l-.615.789a6.996 6.996 0 00-.418-.302zm1.834 1.79a6.99 6.99 0 00-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 00-.214-.468l.893-.45a7.976 7.976 0 01.45 1.088l-.95.313a7.023 7.023 0 00-.179-.483zm.53 2.507a6.991 6.991 0 00-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 01-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 01-.401.432l-.707-.707z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M8 1a7 7 0 104.95 11.95l.707.707A8.001 8.001 0 118 0v1z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M7.5 3a.5.5 0 01.5.5v5.21l3.248 1.856a.5.5 0 01-.496.868l-3.5-2A.5.5 0 017 9V3.5a.5.5 0 01.5-.5z" clip-rule="evenodd"></path></svg>
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Log</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/excel.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M2.859 2.877l12.57-1.795a.5.5 0 0 1 .571.495v20.846a.5.5 0 0 1-.57.495L2.858 21.123a1 1 0 0 1-.859-.99V3.867a1 1 0 0 1 .859-.99zM4 4.735v14.53l10 1.429V3.306L4 4.735zM17 19h3V5h-3V3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-4v-2zm-6.8-7l2.8 4h-2.4L9 13.714 7.4 16H5l2.8-4L5 8h2.4L9 10.286 10.6 8H13l-2.8 4z"></path></g></svg>
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Excel</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../pages/tambah.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M854.6 288.6L639.4 73.4c-6-6-14.1-9.4-22.6-9.4H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V311.3c0-8.5-3.4-16.7-9.4-22.7zM790.2 326H602V137.8L790.2 326zm1.8 562H232V136h302v216a42 42 0 0 0 42 42h216v494zM544 472c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v108H372c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h108v108c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V644h108c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H544V472z"></path></svg>
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Tambah</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Bagian</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/bagian.php?unit=tk">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">TK</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/bagian.php?unit=sd">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">SD</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link  " href="../pages/bagian.php?unit=smp">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">SMP</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link  " href="../pages/bagian.php?unit=sma">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">SMA</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link  " href="../pages/bagian.php?unit=smk">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">SMK</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link  " href="../pages/bagian.php?unit=backoffice">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Backoffice</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link  " href="../pages/bagian.php?unit=global">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19,2H9C7.897,2,7,2.897,7,4v6H5c-1.103,0-2,0.897-2,2v9c0,0.552,0.447,1,1,1h8h8c0.553,0,1-0.448,1-1V4 C21,2.897,20.103,2,19,2z M5,12h3h3v2v2v4H5V12z M19,20h-6v-4v-2v-2c0-1.103-0.897-2-2-2H9V4h10V20z"></path><path d="M11 6H13V8H11zM15 6H17V8H15zM15 10.031H17V12H15zM15 14H17V16H15zM7 14.001H9V16.000999999999998H7z"></path></svg>
                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Global</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              
            </li>
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <button id="edit" name="btnEdit" class="btn btn-outline-danger btn-sm mx-3">Mode Edit</button>

<form id="crud" action="" method="POST" enctype="multipart/form-data">
<?php $disabled = $type == 'view' ? 'disabled' : ''; ?>

<div class="container-fluid">
<div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../img/<?= $data['gambar']; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm" style="width: 100px; height: 75px;">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <input type="number" id="nik" name="nik" value="<?php echo $data['nik']; ?>" <?php echo $disabled; ?>>
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                <input type="text" id="email_sekolah" name="email_sekolah" value="<?php echo $data['email_sekolah']; ?>" <?php echo $disabled; ?>>
              </p>
            </div>
          </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card h-100">
              <h6 class="mb-1 text-center font-weight-bolder">Data Pribadi</h6>
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Jenis Kelamin</h6>
            <select name="jenis_kelamin" id="jenis_kelamin" <?php echo $disabled; ?>>
                <option value="laki-laki" <?php echo $data['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="perempuan" <?php echo $data['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Tempat Lahir</h6>
              <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Tanggal Lahir</h6>
              <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Alamat Sekarang</h6>
              <input type="text" id="alamat_sekarang" name="alamat_sekarang" value="<?php echo $data['alamat_sekarang']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Status Karyawan</h6>
              <input type="text" id="status_karyawan" name="status_karyawan" value="<?php echo $data['status_karyawan']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Nomor HP</h6>
              <input type="number" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Agama</h6>
              <select name="agama" id="agama" <?php echo $disabled; ?>>
                  <option value="muslim" <?php echo $data['agama'] == 'muslim' ? 'selected' : '' ?>>Muslim</option>
                  <option value="hindu" <?php echo $data['agama'] == 'hindu' ? 'selected' : '' ?>>Hindu</option>
                  <option value="buddha" <?php echo $data['agama'] == 'buddha' ? 'selected' : '' ?>>Buddha</option>
                  <option value="kristen" <?php echo $data['agama'] == 'kristen' ? 'selected' : '' ?>>Kristen</option>
                  <option value="katolik" <?php echo $data['agama'] == 'katolik' ? 'selected' : '' ?>>Katolik</option>
                  <option value="konghucu" <?php echo $data['agama'] == 'konghucu' ? 'selected' : '' ?>>Konghucu</option>
              </select>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Golongan Darah</h6>
              <select name="golongan_darah" id="golongan_darah" <?php echo $disabled; ?>>
                  <option value="A" <?php echo $data['golongan_darah'] == 'A' ? 'selected' : '' ?>>A</option>
                  <option value="B" <?php echo $data['golongan_darah'] == 'B' ? 'selected' : '' ?>>B</option>
                  <option value="AB" <?php echo $data['golongan_darah'] == 'AB' ? 'selected' : '' ?>>AB</option>
                  <option value="O" <?php echo $data['golongan_darah'] == 'O' ? 'selected' : '' ?>>O</option>
              </select>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Email Pribadi</h6>
              <input type="text" id="email_pribadi" name="email_pribadi" value="<?php echo $data['email_pribadi']; ?>" <?php echo $disabled; ?>>
            </div>
        </div>


        <div class="col-xl-4">
            <div class="card h-100">
            <h6 class="mb-1 text-center font-weight-bolder">Data Sekolah</h6>
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Unit</h6>
            <select name="unit" id="unit" disabled>
                <option value="tk" <?php echo $data['unit'] == 'tk' ? 'selected' : '' ?>>TK</option>
                <option value="sd" <?php echo $data['unit'] == 'sd' ? 'selected' : '' ?>>SD</option>
                <option value="smp" <?php echo $data['unit'] == 'smp' ? 'selected' : '' ?>>SMP</option>
                <option value="sma" <?php echo $data['unit'] == 'sma' ? 'selected' : '' ?>>SMA</option>
                <option value="smk" <?php echo $data['unit'] == 'smk' ? 'selected' : '' ?>>SMK</option>
            </select>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Jabatan</h6>
              <input type="text" name="jabatan" id="jabatan" value="<?php echo $data['jabatan']; ?>" disabled>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Tanggal Mulai</h6>
              <input type="date" name="tanggal_mulai" id="tanggal_mulai" disabled>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Email Sekolah</h6>
              <input type="text" id="email_sekolah" name="email_sekolah" value="<?php echo $data['email_sekolah']; ?>" disabled>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Medical Checkup</h6>
              <input type="date" id="medical_checkup" name="medical_checkup" value="<?php echo $data['medical_checkup']; ?>" disabled>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Pendidikan Terakhir</h6>
              <select name="pendidikan_terakhir" id="pendidikan_terakhir" disabled>
                  <option value="tk" <?php echo $data['pendidikan_terakhir'] == 'tk' ? 'selected' : '' ?>>TK</option>
                  <option value="sd" <?php echo $data['pendidikan_terakhir'] == 'sd' ? 'selected' : '' ?>>SD</option>
                  <option value="smp" <?php echo $data['pendidikan_terakhir'] == 'smp' ? 'selected' : '' ?>>SMP</option>
                  <option value="sma" <?php echo $data['pendidikan_terakhir'] == 'sma' ? 'selected' : '' ?>>SMA</option>
                  <option value="smk" <?php echo $data['pendidikan_terakhir'] == 'smk' ? 'selected' : '' ?>>SMK</option>
              </select>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Jurusan</h6>
              <input type="text" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>" disabled>
            </div>
        </div>

        
        <div class="col-xl-4">
            <div class="card h-100">
            <h6 class="mb-1 text-center font-weight-bolder">Data Berkas</h6>
            <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">NIK KTP</h6>
              <input type="number" id="nik_ktp" name="nik_ktp" value="<?php echo $data['nik_ktp']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Alamat KTP</h6>
              <input type="text" id="alamat_ktp" name="alamat_ktp" value="<?php echo $data['alamat_ktp']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Status KK</h6>
              <input type="text" id="status_kk" name="status_kk" value="<?php echo $data['status_kk']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">No NPWP</h6>
              <input type="number" id="no_npwp" name="no_npwp" value="<?php echo $data['no_npwp']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Alamat NPWP</h6>
              <input type="text" id="alamat_npwp" name="alamat_npwp" value="<?php echo $data['alamat_npwp']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Rekening Sinarmas</h6>
              <input type="text" id="rekening_sinarmas" name="rekening_sinarmas" value="<?php echo $data['rekening_sinarmas']; ?>" <?php echo $disabled; ?>>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-2">Resan</h6>
              <input type="text" id="resan" name="resan" value="<?php echo $data['resan']; ?>" <?php echo $disabled; ?>>
            </div>
        </div>
    </div>

    <div class="row mb-5">
      <div class="col-12 mt-3">
        <h6 class="text-center mb-2 font-weight-bolder">Gambar</h6>
        <div class="row">
          <div class="col-xl-3">
            <img src="../img/<?= $data['sk']; ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="height: 180px; width: 220px;">
            <input type="hidden" name="skLama" value="<?= $data['sk']; ?>">
            <h5 class="text-center mt-2">SK</h5>
            <input class="btn btn-outline-primary btn-sm mb-0 w-100" type="file" id="sk" name="sk" <?php echo $disabled; ?>>
          </div>

          <div class="col-xl-3">
            <img src="../img/<?= $data['bpjs_tenaga_kerja']; ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="height: 180px; width: 220px;">
            <input type="hidden" name="bpjs_tenaga_kerjaLama" value="<?= $data['bpjs_tenaga_kerja']; ?>">
            <h5 class="text-center mt-2">BPJS Tenaga Kerja</h5>
            <input class="btn btn-outline-primary btn-sm mb-0 w-100" type="file" id="bpjs_tenaga_kerja" name="bpjs_tenaga_kerja" <?php echo $disabled; ?>>
          </div>

          <div class="col-xl-3">
            <img src="../img/<?= $data['bpjs_kesehatan']; ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="height: 180px; width: 220px;">
            <input type="hidden" name="bpjs_kesehatanLama" value="<?= $data['bpjs_kesehatan']; ?>">
            <h5 class="text-center mt-2">BPJS Kesehatan</h5>
            <input class="btn btn-outline-primary btn-sm mb-0 w-100" type="file" id="bpjs_kesehatan" name="bpjs_kesehatan" <?php echo $disabled; ?>>
          </div>

          <div class="col-xl-3">
            <img src="../img/<?= $data['gambar']; ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl" style="height: 180px; width: 220px;">
            <input type="hidden" name="gambarLama" value="<?= $data['gambar']; ?>">
            <h5 class="text-center mt-2">Gambar</h5>
            <input class="btn btn-outline-primary btn-sm mb-0 w-100" type="file" id="gambar" name="gambar" <?php echo $disabled; ?>>
          </div>
        </div>
      </div>
    </div>
</div>

<button type="submit" id="tombol" class="btn btn-outline-success btn-sm mt-3 hide" name="update">Update Data</button>
</form>
  <!--   Core JS Files   -->
  <script>
    document.querySelector('#edit').addEventListener('click', function() {
    let isEditMode = !document.querySelector('#tombol').classList.contains('hide');

    if(!isEditMode) {
        document.querySelector('#tombol').classList.remove('hide');
        document.querySelector('#edit').innerText = 'Kembali';
        toggleInputState(false);
    } else {
        document.querySelector('#tombol').classList.add('hide');
        document.querySelector('#edit').innerText = 'Mode Edit';
        toggleInputState(true);
    }

    function toggleInputState(isDisabled) {
    let inputs = document.querySelectorAll('#crud input, #crud select');
    inputs.forEach(input => {
        input.disabled = isDisabled;
    });
}
});
</script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>