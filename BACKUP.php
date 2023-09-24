<?php if($display == 'Terbaru'): ?>
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Terbaru</h6>
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
<?php elseif ($display == 'Kemarin'): ?>
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Kemarin</h6>
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
<?php elseif ($display == 'Bulan ini'): ?>
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Bulan Ini</h6>
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
<?php else: ?>
    <!-- Your code for handling the case when $display is none of the above values goes here -->
<?php endif; ?>