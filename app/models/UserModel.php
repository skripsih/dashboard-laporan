<?php

class UserModel extends Database
{

    public function semua_user()
    {
        $query = 'SELECT * FROM users';

        $this->query($query);
        return $this->resultset();
    }
    public function login($data)
    {
        $query = 'SELECT * FROM users
                    WHERE username=:username AND
                    password=:pwd';

        $this->query($query);
        $this->bind(':username', $data['username']);
        $this->bind(':pwd', $data['password']);
        $result = $this->single();

        return $result;
    }

    public function detail_user($id)
    {
        $query = 'SELECT * FROM users WHERE id_user=:id';

        $this->query($query);
        $this->bind(':id', $id);

        return $this->single();
    }
    public function cek_username($username)
    {
        try {
            $query = 'SELECT * FROM users WHERE username=:username';

            $this->query($query);
            $this->bind(':username', $username);

            return $this->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function tambah_user($data)
    {

        $query = "INSERT INTO users (username,password, role)
                    VALUES (:username, :password, :role)";

        $this->query($query);
        $this->bind(':username', $data['username']);
        $this->bind(':password', md5($data['password']));
        $this->bind(':role', $data['role']);

        $this->execute();

        return $this->rowCount();
    }

    public function edit_user($data)
    {
        try {
            if ($data['password'] == '' && $data['password'] == NULL) {
                $query = "UPDATE users SET username = :username, role = :role
                        WHERE id_user = :id_user";
            } else {
                $query = "UPDATE users SET username = :username,password=:password, role = :role
                        WHERE id_user = :id_user";
            }

            $this->query($query);
            $this->bind(':id_user', $data['id_user']);
            if ($data['password'] != '' && $data['password'] != NULL) {
                $this->bind(':password', md5($data['password']));
            }
            $this->bind(':username', $data['username']);
            $this->bind(':role', $data['role']);

            $this->execute();

            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function hapus_user($id)
    {

        $query = "DELETE FROM users
                    WHERE id_user=:id";

        $this->query($query);
        $this->bind(':id', $id);

        $this->execute();

        return $this->rowCount();
    }
}
