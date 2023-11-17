<?php

class KriteriaModel extends Database
{

    public function semua_kriteria()
    {
        $query = 'SELECT * FROM kriteria ORDER BY id_kriteria ASC';

        $this->query($query);
        return $this->resultset();
    }

    public function detail_kriteria($id_kriteria)
    {
        $query = 'SELECT * FROM kriteria WHERE id_kriteria=:id_kriteria';

        $this->query($query);
        $this->bind(':id_kriteria', $id_kriteria);

        return $this->single();
    }
    public function tambahKriteria($data)
    {
        try {

            $query = "INSERT INTO kriteria (nama_kriteria, bobot_nilai)
                    VALUES(:nama_kriteria, :bobot_nilai)";

            $this->query($query);
            $this->bind(':nama_kriteria', $data['nama_kriteria']);
            // $this->bind(':tipe_kriteria', $data['tipe_kriteria']);
            $this->bind(':bobot_nilai', $data['bobot_nilai']);
            $this->execute();

            return $this->lastInsertId();
        } catch (\SQLException $e) {
            return null;
        }
    }

    public function tambahSubKriteria($id_kriteria, $data)
    {
        try {
            $query = "INSERT INTO sub_kriteria (id_kriteria, nama_sub, nilai, keterangan)
                    VALUES (:id_kriteria, :nama_sub, :nilai, :keterangan)";
            $this->query($query);
            $i = 0;
            foreach ($data['nama_sub'] as $sub) {
                $this->bind(':id_kriteria', $id_kriteria);
                $this->bind(':nama_sub', $sub);
                $this->bind(':nilai', $data['nilai'][$i]);
                $this->bind(':keterangan', $data['keterangan'][$i]);

                $this->execute();
                // $this->createParam($dataParam, $kodesub, $i);
                $i++;
            }


            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function editKriteria($data)
    {

        try {
            $query = "UPDATE kriteria SET nama_kriteria = :nama_kriteria, bobot_nilai = :bobot_nilai
                    WHERE id_kriteria = :id_kriteria";
            $this->query($query);
            $this->bind(':nama_kriteria', $data['nama_kriteria']);
            // $this->bind(':tipe_kriteria', $data['tipe_kriteria']);
            $this->bind(':bobot_nilai', $data['bobot_nilai']);
            $this->bind(':id_kriteria', $data['id_kriteria']);

            $this->execute();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function editSubKriteria($data)
    {
        try {
            $subkr = $this->subKriteriaByIdKriteria($data['id_kriteria']);
            $i = 0;
            foreach ($subkr as $sub) {
                if (!in_array($sub->id_sub_kriteria, $data['id_sub_kriteria'])) {
                    $this->hapusSubKriteriaById($sub->id_sub_kriteria);
                }
                $i++;
            }
            $query = "UPDATE sub_kriteria SET nama_sub=:nama_sub, nilai=:nilai, keterangan=:keterangan
                    WHERE id_sub_kriteria=:id_sub_kriteria AND id_kriteria=:id_kriteria";
            $this->query($query);
            $i = 0;
            foreach ($data['id_sub_kriteria'] as $sub) {

                if ($sub == "" || $sub == null) {
                    $dataSub = [
                        "nama_sub" => [
                            $data['nama_sub'][$i]
                        ],
                        "nilai" => [
                            $data['nilai'][$i]
                        ],
                        "keterangan" => [
                            $data['keterangan'][$i]
                        ]
                    ];
                    $this->tambahSubKriteria($data['id_kriteria'], $dataSub);
                } else {
                    $this->bind(':id_sub_kriteria', $sub);
                    $this->bind(':id_kriteria', $data['id_kriteria']);
                    $this->bind(':nama_sub', $data['nama_sub'][$i]);
                    $this->bind(':nilai', $data['nilai'][$i]);
                    $this->bind(':keterangan', $data['keterangan'][$i]);

                    $this->execute();
                }
                $i++;
            }
            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapusSubKriteriaById($id_sub_kriteria)
    {

        try {
            $query = "DELETE FROM sub_kriteria
                    WHERE id_sub_kriteria=:id_sub_kriteria";

            $this->query($query);
            $this->bind(':id_sub_kriteria', $id_sub_kriteria);

            $this->execute();

            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function hapusKriteriaById($id_kriteria)
    {
        try {
            $query = "DELETE FROM kriteria
                    WHERE id_kriteria=:id_kriteria";

            $this->query($query);
            $this->bind(':id_kriteria', $id_kriteria);

            $this->execute();

            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function hapus_nilai_by_kriteria($id)
    {

        try {
            $query = "DELETE FROM penilaian
                    WHERE id_kriteria=:id";

            $this->query($query);
            $this->bind(':id', $id);

            $this->execute();

            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }
    public function nilai_maksimal_kriteria($id_kriteria)
    {
        $query = 'SELECT MAX(c.nilai) AS nilai_maks FROM sub_kriteria AS c
                    WHERE c.id_kriteria=:id_kriteria';
        $this->query($query);
        $this->bind(':id_kriteria', $id_kriteria);
        return $this->single();
    }

    public function subKriteriaByIdKriteria($id_kriteria)
    {
        $query = 'SELECT * FROM sub_kriteria WHERE id_kriteria=:id_kriteria';

        $this->query($query);
        $this->bind(':id_kriteria', $id_kriteria);
        return $this->resultset();
    }
    public function hapusSubKriteriaByIdKriteria($id_kriteria)
    {

        try {
            $query = "DELETE FROM sub_kriteria
                    WHERE id_kriteria=:id_kriteria";

            $this->query($query);
            $this->bind(':id_kriteria', $id_kriteria);

            $this->execute();

            return true;
        } catch (\SQLException $e) {
            return false;
        }
    }

    public function nilaiPenilaianSubKr($id_keluarga, $id_kriteria)
    {
        $query = 'SELECT k.*,c.nilai FROM penilaian AS k
                    JOIN sub_kriteria AS c ON c.id_sub_kriteria=k.id_sub_kriteria
                    JOIN kriteria AS kr ON kr.id_kriteria=k.id_kriteria
                    WHERE k.id_keluarga=:id_keluarga AND k.id_kriteria=:id_kriteria';

        $this->query($query);
        $this->bind(':id_kriteria', $id_kriteria);
        $this->bind(':id_keluarga', $id_keluarga);
        return $this->single();
    }
}
