<?php 
include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');

function hari() {
    $date = '';
    $jam = (int) date("H");
    if ($jam >= 0 && $jam < 12) {
        $date = 'Pagi';
    } elseif ($jam >= 12 && $jam < 15) {
        $date = 'Siang';
    } elseif ($jam >= 15 && $jam < 18) {
        $date = 'Sore';
    } else {
        $date = 'Malam';
    }
    return $date;
}

// $salam = hari();

function allData() {
    global $koneksi;
    $stmt = $koneksi->prepare("SELECT * FROM tb_data");
    $stmt->execute();
    
    $data = $stmt->get_result();
    return $data->num_rows;
}

// $dataLength = allData();

function getStatusPercentages() {
    global $koneksi;

    // Execute the query
    $result = mysqli_query($koneksi, "SELECT status_karyawan FROM tb_data");

    if (!$result) {
        die('Query Error: ' . mysqli_error($koneksi));
    }

    $totalRows = mysqli_num_rows($result);
    $menikahCount = 0;
    $belumMenikahCount = 0;

    // Iterate through each row and count the occurrences
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['status_karyawan'] == "Menikah") {
            $menikahCount++;
        } elseif ($row['status_karyawan'] == "Belum") {
            $belumMenikahCount++;
        }
    }

    // Calculate the percentages
    $menikahPercentage = round(($menikahCount / $totalRows) * 100);
    $belumMenikahPercentage = round(($belumMenikahCount / $totalRows) * 100);

    // Return the percentages as an associative array
    return [
        'Menikah' => $menikahPercentage,
        'Belum' => $belumMenikahPercentage,
    ];
}

// $percentages = getStatusPercentages();
// $menikah = $percentages['Menikah'];
// $belumMenikah = $percentages['Belum'];


function jenisKelamin() {
    global $koneksi;

    // Execute the query
    $result = mysqli_query($koneksi, "SELECT jenis_kelamin FROM tb_data");

    if (!$result) {
        die('Query Error: ' . mysqli_error($koneksi));
    }

    $totalRows = mysqli_num_rows($result);
    $cowo = 0;
    $cewe = 0;

    // Iterate through each row and count the occurrences
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['jenis_kelamin'] == "laki-laki") {
            $cowo++;
        } elseif ($row['jenis_kelamin'] == "perempuan") {
            $cewe++;
        }
    }

    // Calculate the percentages
    $pcowo = round(($cowo / $totalRows) * 100);
    $pcewe = round(($cewe / $totalRows) * 100);

    // Return the percentages as an associative array
    return [
        'Cowo' => $pcowo,
        'Cewe' => $pcewe,
    ];
}

// $persentase = jenisKelamin();
// $cowo = $persentase['Cowo'];
// $cewe = $persentase['Cewe'];

function chart() {
    global $koneksi;
    $unit = ["tk","sd","smp","sma","smk","backoffice"];
    $counts = [];

    $stmt = $koneksi->prepare("SELECT * FROM tb_data WHERE unit = ?");

    foreach ($unit as $u) {
        $stmt->bind_param("s", $u);
        $stmt->execute();
        $data = $stmt->get_result();
        $counts[$u] = $data->num_rows;
    }

    $stmt->close();
    return $counts;
}

// $counts = chart();

function jumlahDataTidakLengkap() {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM tb_data");
    $stmt->execute();
    $data = $stmt->get_result();

    $missingID = [];

    while ($d = $data->fetch_assoc()) {
        $missing = false;
        foreach ($d as $key => $value) {
            if ($key === "status_relawan" || $key === "id_relawan") {
                continue;
            }

            if (is_null($value) || $value === "") {
                $missing = true;
                break;
                // $missingEntries[] = "Row with ID " . $d['id'] . " has missing value in " . $key;
            }
        }

        if($missing) {
            $missingID[] = $d['id'];
        }
    }

    $stmt->close();

    $idMissing = count($missingID);

    return $idMissing;
}

// $jumlahDataTidakLengkap = jumlahDataTidakLengkap();

function dataTidakLengkap() {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM tb_data");
    $stmt->execute();
    $data = $stmt->get_result();

    $uniqueMissingRows = [];

    while ($d = $data->fetch_assoc()) {
        foreach ($d as $key => $value) {
            // Skip the fields you want to ignore
            if ($key === "status_relawan" || $key === "id_relawan") {
                continue;
            }

            // Check if the value is NULL or empty
            if (is_null($value) || $value === "") {
                // Store the nik and unit for rows with missing values
                $uniqueMissingRows[$d['id']] = ['nik' => $d['nik'], 'unit' => $d['unit']];
                // Break out of the inner loop as we already identified the row with missing value
                break;
            }
        }
    }

    $stmt->close();

    return $uniqueMissingRows;
}

// $dataTidakLengkap = dataTidakLengkap();

function tahunGuru() {
    global $koneksi;

    $guru = [];

    $stmt = $koneksi->prepare("SELECT * FROM tb_data");
    $stmt->execute();
    $data = $stmt->get_result();
    
    while($d = $data->fetch_assoc()) {
        if($d['tanggal_mulai']) {
            $start = new DateTime($d['tanggal_mulai']);
            $tglSekarang = new DateTime();
            $interval = $start->diff($tglSekarang);
            $perbedaanTahun = $interval->y;

            if($perbedaanTahun >= 10) {
                $guru[] = $d['nik'];
            }
        }
    }

    return $guru;
}

// $tahunGuru = tahunGuru();
// $jumlahTahunGuru = count($tahunGuru);

function runQuery($query) {
    global $koneksi;
    $result = $koneksi->query($query);

    if(!$result) {
        die ("Query Error: " .$koneski->errno. " - ".$koneksi->error);
    }

    $rows = [];

    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

function upload($data) {
    $namaFile = $_FILES[$data]['name'];
    $ukuranFile = $_FILES[$data]['size'];
    $error = $_FILES[$data]['error'];
    $tmpName = $_FILES[$data]['tmp_name'];

    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    if( $ukuranFile > 3000000 ) {
        echo "<script>
                alert('ukuran gambar teralu besar');
              </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, __DIR__ . '/img/' . $namaFileBaru);
    
    return $namaFileBaru;
}

function create($data) {
    global $koneksi;

    $minute = date("i");
    $hour = date("H");
    $year = date("Y");
    $date = date("d");
    $month = date("m");
    $action = "tambah";
    $nik = $data['nik'];
    $unit = htmlspecialchars($data['unit']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $jabatan = htmlspecialchars($data['jabatan']);
    $tanggal_mulai = $data['tanggal_mulai'];
    $status_karyawan = htmlspecialchars($data['status_karyawan']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tanggal_lahir = $data['tanggal_lahir'];
    $alamat_ktp = htmlspecialchars($data['alamat_ktp']);
    $no_npwp = $data['no_npwp'];
    $alamat_npwp = htmlspecialchars($data['alamat_npwp']);
    $pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat_sekarang = htmlspecialchars($data['alamat_sekarang']);
    $no_hp = $data['no_hp'];
    $agama = htmlspecialchars($data['agama']);
    $golongan_darah = htmlspecialchars($data['golongan_darah']);
    $email_sekolah = htmlspecialchars($data['email_sekolah']);
    $email_pribadi = htmlspecialchars($data['email_pribadi']);
    $medical_checkup = $data['medical_checkup'];
    $resan = htmlspecialchars($data['resan']);
    $status_kk = htmlspecialchars($data['status_kk']);
    $nik_ktp = htmlspecialchars($data['nik_ktp']);
    $rekening_sinarmas = htmlspecialchars($data['rekening_sinarmas']);


    $sk = isset($_FILES['sk']) ? upload('sk') : 'gaada';
    $bpjs_tenaga_kerja = isset($_FILES['bpjs_tenaga_kerja']) ? upload('bpjs_tenaga_kerja') : 'gaada';
    $bpjs_kesehatan = isset($_FILES['bpjs_kesehatan']) ? upload('bpjs_kesehatan') : 'gaada';
    $gambar = isset($_FILES['gambar']) ? upload('gambar') : 'gaada';

    if( !$sk || !$bpjs_tenaga_kerja || !$bpjs_kesehatan || !$gambar) {
        return false;
    }

    $query = "INSERT INTO tb_data (
        nik, unit, jenis_kelamin, jabatan, tanggal_mulai, 
        status_karyawan, sk, tempat_lahir, tanggal_lahir, medical_checkup, 
        status_kk, nik_ktp, alamat_ktp, no_npwp, alamat_npwp, 
        rekening_sinarmas, bpjs_tenaga_kerja, bpjs_kesehatan, pendidikan_terakhir, jurusan, 
        alamat_sekarang, no_hp, agama, golongan_darah, email_sekolah, 
        email_pribadi, resan, gambar
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
        ?, ?, ?, ?, ?, ?, ?, ?
    )";
    

    $stmt = $koneksi->prepare($query);
    $stmt->bind_param(
        "isssssssssssssssssssssssssss",
        $nik, $unit, $jenis_kelamin, $jabatan, $tanggal_mulai,
        $status_karyawan, $sk, $tempat_lahir, $tanggal_lahir, $medical_checkup,
        $status_kk, $nik_ktp, $alamat_ktp, $no_npwp, $alamat_npwp,
        $rekening_sinarmas, $bpjs_tenaga_kerja, $bpjs_kesehatan, $pendidikan_terakhir, $jurusan,
        $alamat_sekarang, $no_hp, $agama, $golongan_darah, $email_sekolah,
        $email_pribadi, $resan, $gambar
    );    

    $stmtlog = $koneksi->prepare("INSERT INTO tb_log (action, bagian, nik, minute, hour, year, date, month) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmtlog->bind_param("ssiiiiii", $action, $unit, $nik, $minute, $hour, $year, $date, $month);
    $stmtlog->execute();

    if($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}

function update($data) {
    global $koneksi;

    $id = $_GET['id'];
    $nik = $data['nik'];
    $unit = htmlspecialchars($data['unit']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $jabatan = htmlspecialchars($data['jabatan']);
    $tanggal_mulai = $data['tanggal_mulai'];
    $status_karyawan = htmlspecialchars($data['status_karyawan']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tanggal_lahir = $data['tanggal_lahir'];
    $alamat_ktp = htmlspecialchars($data['alamat_ktp']);
    $no_npwp = $data['no_npwp'];
    $alamat_npwp = htmlspecialchars($data['alamat_npwp']);
    $pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $alamat_sekarang = htmlspecialchars($data['alamat_sekarang']);
    $no_hp = $data['no_hp'];
    $agama = htmlspecialchars($data['agama']);
    $golongan_darah = htmlspecialchars($data['golongan_darah']);
    $email_sekolah = htmlspecialchars($data['email_sekolah']);
    $email_pribadi = htmlspecialchars($data['email_pribadi']);
    $medical_checkup = $data['medical_checkup'];
    $resan = htmlspecialchars($data['resan']);
    $status_kk = htmlspecialchars($data['status_kk']);
    $nik_ktp = htmlspecialchars($data['nik_ktp']);
    $rekening_sinarmas = htmlspecialchars($data['rekening_sinarmas']);

    // Define the field names for which you want to apply the logic
    $fieldsToUpdate = ['sk', 'bpjs_tenaga_kerja', 'bpjs_kesehatan', 'gambar'];

    // Initialize an array to store the new filenames
    $newFilenames = [];

    // Loop through the fields
    foreach ($fieldsToUpdate as $field) {
        $fieldLama = htmlspecialchars($data[$field . 'Lama']);

        // Check if a new file for the field is uploaded
        if ($_FILES[$field]['error'] === 4) {
            // No new file uploaded, keep the old filename
            $newFilenames[$field] = $fieldLama;
        } else {
            // A new file for the field is uploaded, upload it and store the new filename
            $newFilenames[$field] = isset($_FILES[$field]) ? upload($field) : 'gaada';

            if (!$newFilenames[$field]) {
                return false;
            }
        }
    }

    $query = "UPDATE tb_data SET
    nik = ?,
    unit = ?,
    jenis_kelamin = ?,
    jabatan = ?,
    tanggal_mulai = ?,
    status_karyawan = ?,
    sk = ?,
    bpjs_tenaga_kerja = ?,
    bpjs_kesehatan = ?,
    gambar = ?,
    tempat_lahir = ?,
    tanggal_lahir = ?,
    medical_checkup = ?,
    status_kk = ?,
    nik_ktp = ?,
    alamat_ktp = ?,
    no_npwp = ?,
    alamat_npwp = ?,
    rekening_sinarmas = ?,
    pendidikan_terakhir = ?,
    jurusan = ?,
    alamat_sekarang = ?,
    no_hp = ?,
    agama = ?,
    golongan_darah = ?,
    email_sekolah = ?,
    email_pribadi = ?,
    resan = ?
    WHERE id = ?;
";
    
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param(
        "issssssssssssssssssssssssssii",
        $nik, $unit, $jenis_kelamin, $jabatan, $tanggal_mulai,
        $status_karyawan, $newFilenames['sk'], $newFilenames['bpjs_tenaga_kerja'], $newFilenames['bpjs_kesehatan'], $newFilenames['gambar'],
        $tempat_lahir, $tanggal_lahir, $medical_checkup,
        $status_kk, $nik_ktp, $alamat_ktp, $no_npwp, $alamat_npwp,
        $rekening_sinarmas, $pendidikan_terakhir, $jurusan, $alamat_sekarang,
        $no_hp, $agama, $golongan_darah, $email_sekolah,
        $email_pribadi, $resan, $id
    );    

    if($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }
}


function delete($id) {
    global $koneksi;
    $action = "hapus";
    $data =  mysqli_query($koneksi, "SELECT * FROM tb_data WHERE id = $id");
    $d = mysqli_fetch_assoc($data);
    $bagian = $d['unit'];
    $nik = $d['nik'];
    mysqli_query($koneksi, "DELETE FROM tb_data WHERE id = '$id'");
    return mysqli_affected_rows($koneksi);
}

function historiLog() {
    global $koneksi;

    $stmt = $koneksi->prepare("SELECT * FROM tb_log");
    $stmt->execute();
    $data = $stmt->get_result();

    $hari = date("d");
    $bulan = date("m");
    $tahun = date("Y");

    $display = array(); // Initialize an empty array

    while ($d = $data->fetch_assoc()) {
        if ($d['year'] == $tahun && $d['month'] == $bulan) {
            if ($d['date'] == $hari) {
                $display[] = 'Terbaru';
            } elseif ($d['date'] == ($hari - 1)) {
                $display[] = 'Kemarin';
            } elseif ($d['date'] < $hari && $d['date'] >= 1) {
                $display[] = 'Bulan ini';
            }
        }
    }

    return $display;
}
?>