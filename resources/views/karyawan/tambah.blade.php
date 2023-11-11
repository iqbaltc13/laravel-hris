@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card col-lg-12">
            <div class="mt-4 p-4">
                <form method="post" action="{{ url('/pegawai/tambah-pegawai-proses') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Nama Pegawai</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="foto_karyawan" class="form-label">Foto Pegawai</label>
                            <input class="form-control @error('foto_karyawan') is-invalid @enderror" type="file" id="foto_karyawan" name="foto_karyawan">
                            @error('foto_karyawan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="telepon">Nomor Telfon</label>
                            <input type="number" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}">
                            @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" au class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="lokasi_id">Lokasi Kantor</label>
                            <select name="lokasi_id" id="lokasi_id" class="form-control @error('lokasi_id') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Pilih Lokasi Kantor</option>
                                @foreach ($data_lokasi as $dl)
                                    @if(old('lokasi_id') == $dl->id)
                                        <option value="{{ $dl->id }}" selected>{{ $dl->nama_lokasi }}</option>
                                    @else
                                        <option value="{{ $dl->id }}">{{ $dl->nama_lokasi }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('lokasi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="golongan_id">Golongan</label>
                            <select name="golongan_id" id="golongan_id" class="form-control @error('golongan_id') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Pilih Golongan</option>
                                @foreach ($data_golongan as $dg)
                                    @if(old('golongan_id') == $dg->id)
                                        <option value="{{ $dg->id }}" selected>{{ $dg->name }}</option>
                                    @else
                                        <option value="{{ $dg->id }}">{{ $dg->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('golongan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="datetime" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <?php $gender = array(
                            [
                                "gender" => "Laki-Laki"
                            ],
                            [
                                "gender" => "Perempuan"
                            ]);
                            ?>
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Pilih Gender</option>
                                @foreach ($gender as $g)
                                    @if(old('gender') == $g["gender"])
                                    <option value="{{ $g["gender"] }}" selected>{{ $g["gender"] }}</option>
                                    @else
                                    <option value="{{ $g["gender"] }}">{{ $g["gender"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="tgl_join">Tanggal Masuk Perusahaan</label>
                            <input type="datetime" class="form-control @error('tgl_join') is-invalid @enderror" id="tgl_join" name="tgl_join" value="{{ old('tgl_join') }}">
                            @error('tgl_join')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <?php $sNikah = array(
                                            [
                                                "status" => "Menikah"
                                            ],
                                            [
                                                "status" => "Lajang"
                                            ]);
                                            ?>
                            <label for="status_nikah">Status Pernikahan</label>
                            <select name="status_nikah" id="status_nikah" class="form-control @error('status_nikah') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Pilih Status Pernikahan</option>
                                @foreach ($sNikah as $s)
                                    @if(old('status_nikah') == $s["status"])
                                        <option value="{{ $s["status"] }}" selected>{{ $s["status"] }}</option>
                                    @else
                                        <option value="{{ $s["status"] }}">{{ $s["status"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('status_nikah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="jabatan_id">Jabatan</label>
                            <select name="jabatan_id" id="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Pilih Jabatan</option>
                                @foreach ($data_jabatan as $dj)
                                    @if(old('jabatan_id') == $dj->id)
                                    <option value="{{ $dj->id }}" selected>{{ $dj->nama_jabatan }}</option>
                                    @else
                                    <option value="{{ $dj->id }}">{{ $dj->nama_jabatan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('jabatan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <?php $is_admin = array(
                            [
                                "is_admin" => "admin"
                            ],
                            [
                                "is_admin" => "user"
                            ]);
                            ?>
                            <label for="is_admin">Level User</label>
                            <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror selectpicker" data-live-search="true">
                                <option value="">Pilih Level</option>
                                @foreach ($is_admin as $a)
                                    @if(old('is_admin') == $a["is_admin"])
                                    <option value="{{ $a["is_admin"] }}" selected>{{ $a["is_admin"] }}</option>
                                    @else
                                    <option value="{{ $a["is_admin"] }}">{{ $a["is_admin"] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('is_admin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="izin_cuti">Izin Cuti</label>
                            <input type="number" class="form-control @error('izin_cuti') is-invalid @enderror" id="izin_cuti" name="izin_cuti" value="{{ old('izin_cuti') }}">
                            @error('izin_cuti')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="izin_dinas_luar">Izin Dinas Luar</label>
                            <input type="number" class="form-control @error('izin_dinas_luar') is-invalid @enderror" id="izin_dinas_luar" name="izin_dinas_luar" value="{{ old('izin_dinas_luar') }}">
                            @error('izin_dinas_luar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="izin_sakit">Izin Sakit</label>
                            <input type="number" class="form-control @error('izin_sakit') is-invalid @enderror" id="izin_sakit" name="izin_sakit" value="{{ old('izin_sakit') }}">
                            @error('izin_sakit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="izin_cek_kesehatan">Izin Cek Kesehatan</label>
                            <input type="number" class="form-control @error('izin_cek_kesehatan') is-invalid @enderror" id="izin_cek_kesehatan" name="izin_cek_kesehatan" value="{{ old('izin_cek_kesehatan') }}">
                            @error('izin_cek_kesehatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="izin_keperluan_pribadi">Izin Keperluan Pribadi</label>
                            <input type="number" class="form-control @error('izin_keperluan_pribadi') is-invalid @enderror" id="izin_keperluan_pribadi" name="izin_keperluan_pribadi" value="{{ old('izin_keperluan_pribadi') }}">
                            @error('cuti_melahirkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="izin_lainnya">Izin Lainnya</label>
                            <input type="number" class="form-control @error('izin_lainnya') is-invalid @enderror" id="izin_lainnya" name="izin_lainnya" value="{{ old('izin_lainnya') }}">
                            @error('izin_lainnya')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="izin_telat">Izin Telat</label>
                            <input type="number" class="form-control @error('izin_telat') is-invalid @enderror" id="izin_telat" name="izin_telat" value="{{ old('izin_telat') }}">
                            @error('izin_telat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="izin_pulang_cepat">Izin Pulang Cepat</label>
                            <input type="number" class="form-control @error('izin_pulang_cepat') is-invalid @enderror" id="izin_pulang_cepat" name="izin_pulang_cepat" value="{{ old('izin_pulang_cepat') }}">
                            @error('izin_pulang_cepat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </form>
                  <br>
            </div>
        </div>
    </div>
    <br>
@endsection
