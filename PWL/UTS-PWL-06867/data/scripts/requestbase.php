<?php
include 'dbconn.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requests = $_GET['req'];
    /// randomizing output file to prevent duplicates
    function randomizer($length)
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLength = strlen($chars);
        $randString = '';
        for ($i = 0; $i < $length; $i++) {
            $randString .= $chars[rand(0, $charsLength - 1)];
        }
        return $randString;
    }
    /// using switch-case to select block of code by $_GET
    switch ($requests) {
            /// insert data method
        case 'insrtnew':
            $userid = $_POST['userid'];
            $name = $_POST['name'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];
            /// file handler
            $targetdir = '../uploads/userpict/';
            $file = $targetdir . basename($_FILES['pict']['name']);
            $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $filename = substr(str_replace(' ', '', $name), 0, 6) . randomizer(12) . "." . $filetype;
            $fileuploads = $targetdir . $filename;
            $uploads = move_uploaded_file($_FILES['pict']['tmp_name'], $fileuploads);
            $stmt = $conn->prepare("INSERT INTO users (userid, name, password, role, pict) values (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $userid, $name,  $password, $role, $filename);
            if ($uploads && $stmt->execute()) {
                $_SESSION['crud']['message'] = 'User: <b>' . $name . '</b> is registered successfully.';
            } else {
                $_SESSION['crud']['message'] = 'An error occured! err: ' . error_get_last()['message'];
            }
            header('location: ../../main_page.php');
            break;
            /// data edit method
        case 'dataupdate':
            $id = $_POST['id'];
            $userid = $_POST['userid'];
            $name = $_POST['name'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];
            /// file handler
            if (!empty($_FILES['pict']['name'])) {
                /// delete exiting photo first
                $filename = $_POST['pict0'];
                $filepath = '../uploads/userpict/' . $filename;
                unlink($filepath);
                /// then insert the new
                $targetdir = '../uploads/userpict/';
                $file = $targetdir . basename($_FILES['pict']['name']);
                $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $filename = substr(str_replace(' ', '', $name), 0, 6) . randomizer(12) . "." . $filetype;
                $fileuploads = $targetdir . $filename;
                $uploads = move_uploaded_file($_FILES['pict']['tmp_name'], $fileuploads);
                $stmt = $conn->prepare("UPDATE users SET userid = ?, name = ?, password = ?, role = ?, pict = ? WHERE id = ?");
                $stmt->bind_param("ssssss", $userid, $name,  $password, $role, $filename, $id);
            } else {
                $stmt = $conn->prepare("UPDATE users SET userid = ?, name = ?, password = ?, role = ? WHERE id = ?");
                $stmt->bind_param("sssss", $userid, $name,  $password, $role, $id);
            }
            if ($stmt->execute() || $uploads) {
                $_SESSION['crud']['message'] = 'Changes is saved successfully.';
            } else {
                $_SESSION['crud']['message'] = 'An error occured! err: ' . error_get_last()['message'];
            }
            header('location: ../../main_page.php');
            break;
            /// data delete method
        case 'deletethis':
            $id = $_POST['id'];
            $stmt0 = $conn->prepare("SELECT pict FROM users WHERE id = ?");
            $stmt0->bind_param("s", $id);
            if ($stmt0->execute()) {
                $result0 = $stmt0->get_result();
                $row = $result0->fetch_assoc();
                $filename = $row['pict'];
                $filepath = '../uploads/userpict/' . $filename;
                $stmt1 = $conn->prepare("DELETE FROM users WHERE id = ?");
                $stmt1->bind_param("s", $id);
                if ($stmt1->execute() && unlink($filepath)) {
                    $response['success'] = true;
                } else {
                    $response['success'] = false;
                    $response['message'] = error_get_last()['message'];
                }
            } else {
                $response['success'] = false;
                $response['message'] = error_get_last()['message'];
            }
            print_r($response);
            echo json_encode($response);
            break;
            /// duplicated id_num check method
        case 'useridchck':
            $userid = $_POST['userid'];
            $stmt = $conn->prepare("SELECT userid FROM users WHERE userid = ?");
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $response['message'] = 'taken';
            } else {
                $response['message'] = 'available';
            }
            echo json_encode($response);
            break;
            /// user login method
        case 'userlogn':
            $userid = $_POST['userid'];
            $user_passwd = $_POST['password'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE userid = ?");
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $fetched = $result->fetch_assoc();
                if (password_verify($user_passwd, $fetched['password'])) {
                    $_SESSION['user']['userid'] = $fetched['userid'];
                    $_SESSION['user']['name'] = $fetched['name'];
                    $_SESSION['user']['role'] = $fetched['role'];
                    print_r($_SESSION);
                    header("location: ../../main_page.php");
                } else {
                    $_SESSION['error'] = '[user_login] Invalid username or password';
                    header("location: ../../");
                }
            } else {
                $_SESSION['error'] = '[user_login] Invalid username or password';
                header("location: ../../");
            }
            break;
            /// user logout mehod
        case 'userlogt':
            unset($_SESSION);
            unset($_POST['userid']);
            unset($_POST['password']);
            session_destroy();
            header('Location: ../../');
            break;
        default:
            echo 'something broken! contact your god';
            break;
    }
    $stmt->close();
} else {
    echo 'something broken! contact your god';
}
