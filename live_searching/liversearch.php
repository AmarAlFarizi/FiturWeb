<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];

    $query = "SELECT * FROM progrespenulis WHERE judul LIKE '{$input}%' OR NASKAH LIKE '{$input}%' OR cek_administrasi LIKE '{$input}%' OR proses_layout_cover LIKE '{$input}%' OR proses_perpusnas LIKE '{$input}%' OR mulai_produksi LIKE '{$input}%' LIMIT 1";

    $result = mysqli_query($con, $query);

    $total_rows = mysqli_num_rows($result);

    // Hitung berapa kolom yang sudah terisi
    $filled_columns = 0;
    if ($total_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['judul'])) {
            $filled_columns++;
        }
        if (!empty($row['naskah'])) {
            $filled_columns++;
        }
        if (!empty($row['cek_administrasi'])) {
            $filled_columns++;
        }
        if (!empty($row['proses_layout_cover'])) {
            $filled_columns++;
        }
        if (!empty($row['proses_perpusnas'])) {
            $filled_columns++;
        }
        if (!empty($row['mulai_produksi'])) {
            $filled_columns++;
        }
    }

    // Hitung persentase progres
    $progress_percentage = ($filled_columns / 6) * 100;

    // warna progres 
    $progress_color_class = $progress_percentage == 100 ? 'bg-success' : 'bg-info';
?>
<style>
    @media (max-width:650px) {
        th{
            display:none;
        }
        td{
            display:block;
            padding:0.75rem 1rem;
        }
        td::before{
            content: attr(data-cell) ": ";
            font-weight:600;
        }
    }
</style>
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title text-center">Hasil Pencarian</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table role="table" class="table table-bordered table-stripe" style="width:100%">
                <thead role="rowgroup">
                    <tr role="row">
                        <th role="columnheader">Judul</th>
                        <th role="columnheader">Naskah</th>
                        <th role="columnheader">Cek Administrasi</th>
                        <th role="columnheader">Proses Layout dan Cover</th>
                        <th role="columnheader">Proses Masuk Perpusnas</th>
                        <th role="columnheader">Mulai Produksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($total_rows > 0) {
                        $judul = $row['judul'];
                        $naskah = $row['naskah'];
                        $cek_administrasi = $row['cek_administrasi'];
                        $proses_layout_cover = $row['proses_layout_cover'];
                        $proses_perpusnas = $row['proses_perpusnas'];
                        $mulai_produksi = $row['mulai_produksi'];
                    ?>
                        <tr>
                            <td data-cell="Judul"><?php echo $judul ?></td>
                            <td data-cell="Naskah"><?php echo $naskah ?></td>
                            <td data-cell="Cek Administrasi"><?php echo $cek_administrasi ?></td>
                            <td data-cell="Proses Layout Cover"><?php echo $proses_layout_cover ?></td>
                            <td data-cell="Proses Perpusnas"><?php echo $proses_perpusnas ?></td>
                            <td data-cell="Mulai Produksi"><?php echo $mulai_produksi ?></td>
                        </tr>
                    <?php
                    } else {
                        echo "<tr><td colspan='7' class='text-danger'>Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Progress Track -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title text-center">Tracking Progress</h5>
    </div>
    <div class="card-body">
        <div class="progress">
            <div class="progress-bar <?php echo $progress_color_class ?>" role="progressbar" style="width: <?php echo $progress_percentage ?>%;" aria-valuenow="<?php echo $progress_percentage ?>" aria-valuemin="0" aria-valuemax="100">
                <?php echo $progress_percentage ?>%
            </div>
        </div>
    </div>
</div>
<?php
}
?>
