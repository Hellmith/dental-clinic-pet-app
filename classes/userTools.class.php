<?php

class UserTools
{
    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function login($email, $password)
    {
        $message = '';
        $userRow = $this->connection->select('patients', "email = '$email'", true);
        if (!empty($userRow)) {
            if (password_verify($password, $userRow['password'])) {
                $_SESSION['USER'] = $userRow;
                return true;
            } else {
                $message = 'Неверный пароль';
            }
        } else {
            $staffRow = $this->connection->select('staffs as s', "s.email = '$email'", true, 'left join jobs j on job_id = j.id', 's.*, j.job_name');
            if (!empty($staffRow)) {
                if (password_verify($password, $staffRow['password'])) {
                    $_SESSION['STAFF'] = $staffRow;
                    return true;
                } else {
                    $message = 'Неверный пароль';
                }
            } else {
                $message = 'Неверная почта';
            }
        }
        return $message;
    }

    public function register($name, $surname, $patronymic, $phone, $email, $password)
    {
        $userRow = $this->connection->select('patients', "email = '$email'", true);
        if ($userRow) {
            return 'Эта почта уже используется';
        } else {
            $userRow = $this->connection->select('patients', "phone = '$phone'", true);
            if ($userRow) {
                return 'Этот номер уже используется';
            } else {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $data = [
                    'patient_surname' => $surname,
                    'patient_name' => $name,
                    'patient_patronymic' => $patronymic,
                    'phone' => $phone,
                    'email' => $email,
                    'password' => $password,
                ];
                $id = $this->connection->insert($data, 'patients');
                if ($id) {
                    $_SESSION['USER'] = $this->connection->select('patients', "id = '$id'", true);
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['USER']) || isset($_SESSION['STAFF'])) {
            unset($_SESSION['USER']);
            unset($_SESSION['STAFF']);
            session_destroy();
            return true;
        } else {
            return false;
        }
    }
}
