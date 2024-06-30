<?php
// Memanggil tampilan header
echo view('header');

// Memanggil tampilan sidebar
echo view('sidebar');
?>

<main class="col-10 ms-sm-auto px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-itemscenter pt-3 pb-2">
        <h1 class="h4">Tambah Data Universitas</h1>
    </div>
    
    <?php
    // Membuka form untuk menyimpan data universitas
    echo form_open('simpanuniversitas');
    ?>
    
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <?php
                // Dropdown untuk memilih kecamatan
                echo form_dropdown('kode_kecamatan', $kecamatanOptions, '', 'class="form-control"');
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nomor Universitas</label>
                <?php
                // Input untuk Kode Universitas
                $no_universitas = [
                    'name' => 'no_universitas',
                    'type' => 'number',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Kode Universitas',
                    'required' => 'required'
                ];
                echo form_input($no_universitas);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama Universitas</label>
                <?php
                // Input untuk nama universitas
                $nama_universitas = [
                    'name' => 'nama_universitas',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Nama Universitas',
                    'required' => 'required'
                ];
                echo form_input($nama_universitas);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Alamat Universitas</label>
                <?php
                // Input untuk alamat universitas
                $alamat_universitas = [
                    'name' => 'alamat_universitas',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Masukkan Alamat Universitas',
                    'required' => 'required'
                ];
                echo form_input($alamat_universitas);
                ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Koordinat Universitas</label>
                <?php
                // Input untuk koordinat universitas
                $koordinat = [
                    'name' => 'koordinat',
                    'class' => 'form-control',
                    'autocomplete' => 'off',
                    'placeholder' => 'Contoh : -7.5134,109.0702',
                    'required' => 'required'
                ];
                echo form_input($koordinat);
                ?>
            </div>
            
            <div>
                <?php
                // Tombol untuk menyimpan data
                $simpan = [
                    'type' => 'submit',
                    'content' => 'Simpan',
                    'class' => 'btn btn-primary'
                ];
                echo form_button($simpan);
                
                // Tombol untuk membatalkan aksi
                echo anchor('kecamatan', 'Batal', ['class' => 'btn btn-danger']);
                ?>
            </div>
        </div>
    </div>
    
    <?php
    // Menutup form
    echo form_close();
    ?>
</main>

<?php
// Memanggil tampilan footer
echo view('footer');
?>
