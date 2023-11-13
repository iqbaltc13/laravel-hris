<?php

namespace Database\Seeders;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Lokasi;
use App\Models\Payroll;
use App\Models\ResetCuti;
use App\Models\User;
use App\Models\Shift;
use App\Models\StatusPtkp;
use App\Models\Tunjangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Schema;
use Illuminate\Database\QueryException;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('disabling foreignkeys check');
        Schema::disableForeignKeyConstraints();
        $this->command->info('truncating users...');
        DB::table('users')->truncate();
        $this->command->info('truncating jabatans...');
        DB::table('jabatans')->truncate();
        $this->command->info('truncating golongans...');
        DB::table('golongans')->truncate();
        $this->command->info('truncating shifts...');
        DB::table('shifts')->truncate();
        $this->command->info('truncating lokasis...');
        DB::table('lokasis')->truncate();
        $this->command->info('truncating reset_cutis...');
        DB::table('reset_cutis')->truncate();
        $this->command->info('truncating tunjangans...');
        DB::table('tunjangans')->truncate();
        $this->command->info('truncating status_ptkps...');
        DB::table('status_ptkps')->truncate();
        $this->command->info('truncating payrolls...');
        DB::table('payrolls')->truncate();
        $this->command->info('enabling foreignkeys check');
        Schema::enableForeignKeyConstraints();

        DB::beginTransaction();

        try {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'telepon' => '0987654321',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'tgl_lahir' => date('Y-m-d'),
                'gender' => 'Laki-Laki',
                'tgl_join' => '1998-01-26',
                'status_nikah' => 'Menikah',
                'alamat' => 'jl. admin test',
                'izin_cuti' => '12',
                'izin_dinas_luar' => '5',
                'izin_sakit' => '2',
                'izin_cek_kesehatan' => '10',
                'izin_keperluan_pribadi' => '8',
                'izin_lainnya' => '6',
                'izin_telat' => '16',
                'izin_pulang_cepat' => '9',
                'is_admin' => 'admin',
                'jabatan_id' => '1',
                'golongan_id' => '1',
                'lokasi_id' => '1'
            ]);

            User::create([
                'name' => 'User',
                'email' => 'user@gmail.com',
                'telepon' => '123456789',
                'username' => 'user',
                'password' => Hash::make('user123'),
                'tgl_lahir' => date('Y-m-d'),
                'gender' => 'Laki-Laki',
                'tgl_join' => '2022-01-28',
                'status_nikah' => 'Lajang',
                'alamat' => 'jl. user test',
                'izin_cuti' => '10',
                'izin_dinas_luar' => '10',
                'izin_sakit' => '10',
                'izin_cek_kesehatan' => '10',
                'izin_keperluan_pribadi' => '10',
                'izin_lainnya' => '10',
                'izin_telat' => '10',
                'izin_pulang_cepat' => '10',
                'is_admin' => 'user',
                'jabatan_id' => '2',
                'golongan_id' => '1',
                'lokasi_id' => '1'
            ]);

            Jabatan::create([
                'nama_jabatan' => 'Teknologi Informasi'
            ]);

            Jabatan::create([
                'nama_jabatan' => 'Keuangan dan Akutansi'
            ]);

            Jabatan::create([
                'nama_jabatan' => 'Administrasi & Umum'
            ]);

            Jabatan::create([
                'nama_jabatan' => 'Humas & Pemasaran'
            ]);

            Jabatan::create([
                'nama_jabatan' => 'Sekretariat'
            ]);
            
            Jabatan::create([
                'nama_jabatan' => 'Direktur'
            ]);

            Golongan::create([
                'name' => 'DIREKSI'
            ]);

            Golongan::create([
                'name' => 'KABAG'
            ]);

            Golongan::create([
                'name' => 'STAFF'
            ]);

            Golongan::create([
                'name' => 'PELAKSANA'
            ]);
        

            Shift::create([
                'nama_shift' => "Libur",
                'jam_masuk' => "00:00",
                'jam_keluar' => "00:00",
            ]);

            Shift::create([
                'nama_shift' => "Office",
                'jam_masuk' => "08:00",
                'jam_keluar' => "17:00",
            ]);

            Shift::create([
                'nama_shift' => "Siang",
                'jam_masuk' => "13:00",
                'jam_keluar' => "21:00",
            ]);

            Shift::create([
                'nama_shift' => "Malam",
                'jam_masuk' => "21:00",
                'jam_keluar' => "07:00",
            ]);

            Lokasi::create([
                'nama_lokasi' => 'Kantor Cabang A',
                'lat_kantor' => '-6.3707314',
                'long_kantor' => '106.8138057',
                'radius' => '200',
                'status' => 'approved',
                //'created_by' => 1
            ]);

            ResetCuti::create([
                'izin_cuti' => '10',
                'izin_dinas_luar' => '10',
                'izin_sakit' => '10',
                'izin_cek_kesehatan' => '10',
                'izin_keperluan_pribadi' => '10',
                'izin_lainnya' => '10',
                'izin_telat' => '10',
                'izin_pulang_cepat' => '10',
            ]);

            Tunjangan::create([
                'golongan_id' => 1,
                'tunjangan_makan' => '20000.00',
                'tunjangan_transport' => '20000.00'
            ]);

            Tunjangan::create([
                'golongan_id' => 2,
                'tunjangan_makan' => '30000.00',
                'tunjangan_transport' => '20000.00'
            ]);

            Tunjangan::create([
                'golongan_id' => 3,
                'tunjangan_makan' => '30000.00',
                'tunjangan_transport' => '30000.00'
            ]);

            
            StatusPtkp::create([
                'name' => 'TK/0',
                'ptkp_2016' => '54000000',
                'ptkp_2015' => '36000000',
                'ptkp_2009_2012' => '15840000',
            ]);
            StatusPtkp::create([
                'name' => 'TK/1',
                'ptkp_2016' => '58500000',
                'ptkp_2015' => '39000000',
                'ptkp_2009_2012' => '17160000',
            ]);
            
            StatusPtkp::create([
                'name' => 'TK/2',
                'ptkp_2016' => '63000000',
                'ptkp_2015' => '42000000',
                'ptkp_2009_2012' => '18480000',
            ]);
            StatusPtkp::create([
                'name' => 'TK/3',
                'ptkp_2016' => '67500000',
                'ptkp_2015' => '45000000',
                'ptkp_2009_2012' => '19800000',
            ]);

            Payroll::create([
                'user_id' => 1,
                'status_id' => 1,
                'bulan' => '7',
                'tahun' => '2023',
                'gaji' => '2000000.00',
                'setoran_bpjs_kes' => '497500.00',
                'tunjangan_bpjs_kes' => '398000.00',
                'setoran_bpjs_tk' => '620880.00',
                'tunjangan_bpjs_tk' => '421880.00',
                'tunjangan_pensiun' => '0.00',
                'tunjangan_komunikasi' => '350000.00',
                'tunjangan_pph_21' => '0.00',
                'pot_lainnya' => '0.00',
                'lembur' => '0.00',
            ]);
            
            Payroll::create([
                'user_id' => 2,
                'status_id' => 2,
                'bulan' => '7',
                'tahun' => '2023',
                'gaji' => '4000000.00',
                'setoran_bpjs_kes' => '600000.00',
                'tunjangan_bpjs_kes' => '400000.00',
                'setoran_bpjs_tk' => '300000.00',
                'tunjangan_bpjs_tk' => '200000.00',
                'tunjangan_pensiun' => '0.00',
                'tunjangan_komunikasi' => '200000.00',
                'tunjangan_pph_21' => '0.00',
                'pot_lainnya' => '100000.00',
                'lembur' => '0.00',
            ]);

            DB::commit();

            // all good
        } catch (QueryException $e) {
            DB::rollback();
            $this->command->info('Proses Seeding Gagal, Message: '.$e->getMessage());
            // something went wrong
        }

        

    }
}
