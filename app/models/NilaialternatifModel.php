<?php

class NilaialternatifModel extends Database
{

    public function nilai_alternatif($id_keluarga)
    {
        $query = 'SELECT na.*, a.*, k.* FROM penilaian as na
                    JOIN keluarga as a on a.id_keluarga=na.id_keluarga
                    JOIN kriteria as k on k.id_kriteria=na.id_kriteria 
                    WHERE na.id_keluarga = :id_keluarga
                    ORDER BY na.id_kriteria ASC';

        $this->query($query);
        $this->bind(':id_keluarga', $id_keluarga);
        return $this->resultset();
    }

    public function tambah_nilai_alternatif($data)
    {
        try {
            $query = "INSERT INTO penilaian (id_keluarga, id_kriteria, id_sub_kriteria)
                    VALUES (:id_keluarga, :id_kriteria, :id_sub_kriteria)";

            $this->query($query);
            foreach ($data['kriteria'] as $key => $value) {
                $this->bind(':id_keluarga', $data['id_keluarga']);
                $this->bind(':id_kriteria', $key);
                $this->bind(':id_sub_kriteria', $value);
                $this->execute();
            }

            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function detail_nilai_alternatif($id_keluarga)
    {
        $query = "SELECT k.* FROM penilaian as k
                    WHERE k.id_keluarga =:id_keluarga";
        $this->query($query);
        $this->bind(':id_keluarga', $id_keluarga);
        return $this->resultset();
    }

    public function cekKriteria($id_keluarga, $key)
    {
        $sqlCekData = "SELECT * FROM penilaian WHERE id_keluarga=:id_keluarga AND id_kriteria=:id_kriteria";

        $this->query($sqlCekData);
        $this->bind(':id_keluarga', $id_keluarga);
        $this->bind(':id_kriteria', $key);
        return $this->single();
    }
    
    public function edit_nilai_alternatif($data)
    {
        try {
            $query = "SELECT * FROM penilaian WHERE id_keluarga=:id_keluarga";
            $this->query($query);
            $this->bind(':id_keluarga', $data['id_keluarga']);
            $cekAlternatif = $this->resultset();
            if (count($cekAlternatif) == 0) {
                $this->tambah_nilai_alternatif($data['id_keluarga'], $data);
                return true;
            } else {
                $query = "UPDATE penilaian SET
                        id_sub_kriteria = :id_sub_kriteria
                    WHERE id_keluarga = :id_keluarga AND id_kriteria = :id_kriteria";

                $this->query($query);
                foreach ($data['kriteria'] as $key => $value) {
                    $this->bind(':id_keluarga', $data['id_keluarga']);
                    $this->bind(':id_kriteria', $key);
                    $this->bind(':id_sub_kriteria', $value);

                    $this->execute();
                }
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function hapus_nilai_alternatif($data)
    {

        $query = "DELETE FROM penilaian
                    WHERE id_keluarga=:id";

        $this->query($query);
        $this->bind(':id', $data['id_keluarga']);

        $this->execute();

        return $this->rowCount();
    }

    public function cek_penilaian()
    {
        $query = "SELECT p.*,kr.nama_kriteria FROM penilaian AS p
                    RIGHT JOIN kriteria AS kr ON p.id_kriteria=kr.id_kriteria";

        $this->query($query);
        return $this->resultset();
    }
    public function hapusPenilaianByKriteria($id_kriteria)
    {
        try {
            $query = "DELETE FROM penilaian
                    WHERE id_kriteria=:id_kriteria";
            $this->query($query);
            $this->bind(':id_kriteria', $id_kriteria);
            $this->execute();
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
}
