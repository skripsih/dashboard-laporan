<?php

class AlternatifModel extends Database
{

    public function semua_alternatif()
    {
        $query = 'SELECT * FROM keluarga';
        $this->query($query);
        return $this->resultset();
    }
    
    public function ranking()
    {
        $query = 'SELECT * FROM keluarga ORDER BY nilai_saw DESC';
        $this->query($query);
        return $this->resultset();
    }
    public function detail_alternatif($id)
    {
        $query = 'SELECT * FROM keluarga
                 WHERE id_keluarga = :id';

        $this->query($query);
        $this->bind(':id', $id);

        return $this->single();
    }
    public function tambah_alternatif($data)
    {
        try {

            $query = "INSERT INTO keluarga (id_keluarga, nama, tempat_lahir, tgl_lahir, jekel, alamat, agama, nama_wali, alamat_wali, telp_wali)
                    VALUES (:id_keluarga, :nama, :tempat_lahir, :tgl_lahir, :jekel, :alamat, :agama, :nama_wali, :alamat_wali, :telp_wali)";
                    
            $this->query($query);
            $this->bind(':ktp', $data['ktp']);
            $this->bind(':nama', $data['nama']);
            $this->bind(':alamat', $data['alamat']);
            $this->bind(':agama', $data['agama']);
            $this->bind(':tempat_lahir', $data['tempat_lahir']);
            $this->bind(':tgl_lahir', $data['tgl_lahir']);
            $this->bind(':jekel', $data['jekel']);

            $this->execute();

            return $this->lastInsertId();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function edit_alternatif($data)
    {
        try {
            $query = "UPDATE keluarga SET
                        ktp = :ktp,
                        nama = :nama,
                        tempat_lahir = :tempat_lahir,
                        tgl_lahir = :tgl_lahir,
                        jekel = :jekel,
                        alamat = :alamat,
                        agama = :agama
                    WHERE id_keluarga=:id_keluarga";

            $this->query($query);

            $this->bind(':id_keluarga', $data['id_keluarga']);
            $this->bind(':ktp', $data['ktp']);
            $this->bind(':nama', $data['nama']);
            $this->bind(':alamat', $data['alamat']);
            $this->bind(':agama', $data['agama']);
            $this->bind(':tempat_lahir', $data['tempat_lahir']);
            $this->bind(':tgl_lahir', $data['tgl_lahir']);
            $this->bind(':jekel', $data['jekel']);

            $this->execute();

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function simpan_nilai_akhir($id_keluarga, $nilai)
    {

        try {
            $query = "UPDATE keluarga SET
                        nilai_saw = :nilai_saw
                    WHERE id_keluarga = :id_keluarga";

            $this->query($query);
            $this->bind(':id_keluarga', $id_keluarga);
            $this->bind(':nilai_saw', $nilai);

            $this->execute();

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function hapus_alternatif($id)
    {

        $query = "DELETE FROM keluarga WHERE id_keluarga=:id_keluarga";
        $this->query($query);
        $this->bind(':id_keluarga', $id);
        $this->execute();

        return $this->rowCount();
    }
}
