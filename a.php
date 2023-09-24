<?php 
include 'logic.php';
include 'koneksi.php';
$display = historiLog();
$hari = date("d");
$kemaren = $hari - 1;
$ax = date("m");
?>

<h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Terbaru</h6>
    <ul class="list-group">
        <?php $data = runQuery("SELECT * FROM tb_log WHERE month = $ax AND date = $hari ORDER BY id DESC LIMIT 10"); ?>
        <?php foreach ($data as $d): ?>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                <?php 
                    $action = htmlspecialchars($d['action'], ENT_QUOTES, 'UTF-8');
                    $warna = $action == 'tambah' ? 'btn-outline-success' : ($action == 'edit' ? 'btn-outline-warning' : 'btn-outline-danger');
                    $warnaTeks = $action == 'tambah' ? 'text-success' : ($action == 'edit' ? 'text-warning' : 'text-danger');
                    $bagian = htmlspecialchars($d['bagian'], ENT_QUOTES, 'UTF-8');
                    $nik = htmlspecialchars($d['nik'], ENT_QUOTES, 'UTF-8');
                    $hour = htmlspecialchars($d['hour'], ENT_QUOTES, 'UTF-8'); 
                    $minute = htmlspecialchars($d['minute'], ENT_QUOTES, 'UTF-8');
                    $hari = htmlspecialchars($d['date'], ENT_QUOTES, 'UTF-8');
                ?>
                    <button class="p-3 btn btn-icon-only btn-rounded <?php echo $warna; ?> mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><?php echo $bagian; ?></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?php echo $nik; ?></h6>
                        <span class="text-xs"><?php echo $hari; ?> March 2020, <?php echo $hour; ?>:<?php echo $minute; ?></span>
                    </div>
                </div>
                <div class="d-flex align-items-center <?php echo $warnaTeks; ?> text-gradient text-sm font-weight-bold">
                    <?php echo strtoupper($action); ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Kemarin</h6>
    <?php $data = runQuery("SELECT * FROM tb_log WHERE month = $ax AND date = $hari - 1 ORDER BY id DESC LIMIT 10"); ?>
    <ul class="list-group">
        <?php foreach ($data as $d): ?>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                <?php 
                    $action = htmlspecialchars($d['action'], ENT_QUOTES, 'UTF-8');
                    $warna = $action == 'tambah' ? 'btn-outline-success' : ($action == 'edit' ? 'btn-outline-warning' : 'btn-outline-danger');
                    $warnaTeks = $action == 'tambah' ? 'text-success' : ($action == 'edit' ? 'text-warning' : 'text-danger');
                    $bagian = htmlspecialchars($d['bagian'], ENT_QUOTES, 'UTF-8');
                    $nik = htmlspecialchars($d['nik'], ENT_QUOTES, 'UTF-8');
                    $hour = htmlspecialchars($d['hour'], ENT_QUOTES, 'UTF-8'); 
                    $minute = htmlspecialchars($d['minute'], ENT_QUOTES, 'UTF-8');
                    $hari = htmlspecialchars($d['date'], ENT_QUOTES, 'UTF-8');
                ?>
                    <button class="p-3 btn btn-icon-only btn-rounded <?php echo $warna; ?> mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><?php echo $bagian; ?></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?php echo $nik; ?></h6>
                        <span class="text-xs"><?php echo $hari; ?> March 2020, <?php echo $hour; ?>:<?php echo $minute; ?></span>
                    </div>
                </div>
                <div class="d-flex align-items-center <?php echo $warnaTeks; ?> text-gradient text-sm font-weight-bold">
                    <?php echo strtoupper($action); ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Bulan Ini</h6>
    <ul class="list-group">
    <?php $data = runQuery("SELECT * FROM tb_log WHERE month = $ax AND date < $kemaren AND date > 0 ORDER BY id DESC LIMIT 10"); ?>
        <?php foreach ($data as $d): ?>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                <?php 
                    $action = htmlspecialchars($d['action'], ENT_QUOTES, 'UTF-8');
                    $warna = $action == 'tambah' ? 'btn-outline-success' : ($action == 'edit' ? 'btn-outline-warning' : 'btn-outline-danger');
                    $warnaTeks = $action == 'tambah' ? 'text-success' : ($action == 'edit' ? 'text-warning' : 'text-danger');
                    $bagian = htmlspecialchars($d['bagian'], ENT_QUOTES, 'UTF-8');
                    $nik = htmlspecialchars($d['nik'], ENT_QUOTES, 'UTF-8');
                    $hour = htmlspecialchars($d['hour'], ENT_QUOTES, 'UTF-8'); 
                    $minute = htmlspecialchars($d['minute'], ENT_QUOTES, 'UTF-8');
                    $hari = htmlspecialchars($d['date'], ENT_QUOTES, 'UTF-8');
                ?>
                    <button class="p-3 btn btn-icon-only btn-rounded <?php echo $warna; ?> mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><?php echo $bagian; ?></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?php echo $nik; ?></h6>
                        <span class="text-xs"><?php echo $hari; ?> March 2020, <?php echo $hour; ?>:<?php echo $minute; ?></span>
                    </div>
                </div>
                <div class="d-flex align-items-center <?php echo $warnaTeks; ?> text-gradient text-sm font-weight-bold">
                    <?php echo strtoupper($action); ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>