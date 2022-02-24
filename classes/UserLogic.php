<?php
//読み込むコード
require_once '../dbconnect.php';

class UserLogic {

    /**
     * ユーザーを登録する
     * @param array $userData
     * @return bool $result
    */
    public static function createUser($userData) {

        $result = false;

        $sql = 'INSERT INTO todo_table (image, name, email, genre, profile, URL,
        password) VALUES (?, ?, ?, ?, ?, ?, ?)';

        // $file = $_FILES["image"];

        //ユーザーデータを配列に入れる
        $arr = [];
        $arr[] = $userData['image'];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = $userData['genre'];
        $arr[] = $userData['profile'];
        $arr[] = $userData['soundcloud'];
        $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);
        // var_dump($result);
        // exit();

        try {
            $stmt = connect() -> prepare($sql);
            $result = $stmt -> execute($arr);
            return $result;
            // var_dump($result);
            // exit();
        } catch(\Exception $e) {
            return $result;
            // var_dump($result);
            // exit();
        }
    }

    /**
     * ログイン処理
     * @param string $email
     * @param string $password
     * @return bool $result
    */
    public static function login($email, $password) {
        //結果
        $result = false;
        //ユーザーをemailから検索して取得
        $user = self::getUserByEmail($email);

        if(!$user) {
            $_SESSION["msg"] = "emailかパスワードが一致しません。";
            return $result;
        }

        // var_dump($user);
        // return;

        //パスワードの照会
        if(password_verify($password, $user["password"])) {
            // ログイン成功
            session_regenerate_id(true);
            $_SESSION["login_user"] = $user;
            $result = true;
            return $result;
        }
        $_SESSION["msg"] = "emailかパスワードが一致しません。";
        return $result;
    }
    /**
     * emailからユーザーを取得
     * @param string $email
     * @return array|bool $user|false
    */
    public static function getUserByEmail($email) {
        //SQLの準備
        //SQLの実行
        //SQLの結果を返す
        $sql = 'SELECT * FROM todo_table WHERE email = ?';

        //emailを配列に入れる
        $arr = [];
        $arr[] = $email;

        try {
            $stmt = connect() -> prepare($sql);
            $stmt -> execute($arr);
            //SQLの結果を返す
            $user = $stmt -> fetch();
            return $user;
        } catch(\Exception $e) {
            return false;
        }
    }
    /**
     * ログインチェック
     * @param void
     * @return bool $result
    */
    public static function checkLogin() {
        $result = false;

        // セッションにログインユーザーが入ってなかったらfalse
        if(isset($_SESSION["login_user"]) && $_SESSION["login_user"]["id"] > 0) {
            return $result = true;
        }
        return $result;
    }

    /**
     * ログアウト処理
     * @param void
     * @return bool $result
    */
    public static function logout() {
        $_SESSION = array();
        session_destroy();
    }

    /**
     * ユーザーを編集する
     * @param array $userData
     * @return bool $result
    */
    public static function editUser() {

        $result = false;

        $sql = 'SELECT * FROM todo_table WHERE id=id';
        // $stmt = connect() -> prepare($sql);

        try {
            $stmt = connect() -> prepare($sql);
            $stmt->execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        // $status = $stmt->execute();
        // var_dump($result);
        // exit();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }
    /** 
     * 編集したユーザーを登録する
     * @param array $userData
     * @return bool $result
    */
    public static function updateUser() {

        $result = false;

        $sql = 'UPDATE todo_table SET name=:name, email=:email, genre=:genre,
        profile=:profile, URL=:URL, password=:password WHERE id=:id';

        if (
            !isset($_POST['name']) || $_POST['name'] == '' ||
            !isset($_POST['email']) || $_POST['email'] == '' ||
            !isset($_POST['genre']) || $_POST['genre'] == '' ||
            !isset($_POST['profile']) || $_POST['profile'] == '' ||
            !isset($_POST['soundcloud']) || $_POST['soundcloud'] == '' ||
            !isset($_POST['password']) || $_POST['password'] == ''||
            !isset($_POST['id']) || $_POST['id'] == ''
        ) {
            exit('paramError');
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $genre = $_POST['genre'];
        $profile = $_POST['profile'];
        $soundcloud = $_POST['soundcloud'];
        //再登録したパスワードもhash化する
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $id = $_POST['id'];
        // var_dump($id);
        // exit();

        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindValue(':profile', $profile, PDO::PARAM_STR);
        $stmt->bindValue(':URL', $soundcloud, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        try {
        $stmt -> execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
        $_SESSION["login_user"] = self::getUserByEmail($email);
    }

    /**
     * ユーザーを削除する
     * @param array $userData
     * @return bool $result
    */
    public static function deleteUser() {

        $result = false;

        $sql = 'DELETE FROM todo_table WHERE id=:id';

        $id = $_POST['id'];

        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        try {
        $stmt->execute();
        // return $result;
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }

    /**
     * ユーザーリストを表示する
     * @param array $userData
     * @return bool $result
    */
    public static function userList() {
        $result = false;
        // $sql = 'SELECT * FROM todo_table WHERE name=:name, genre=:genre, profile=:profile, URL=:URL';
        $sql = 'SELECT * FROM todo_table';
        // var_dump($result);
        // exit();
        // print("oooo");

        try {
            $stmt = connect() -> prepare($sql);
            $stmt->execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo json_encode(["sql error" => "{$e->getMessage()}"]);
            // print("oooo");
            exit();
        };
    }
    /**
     * お店を登録する
     * @param array $userData
     * @return bool $result
    */
    public static function createUser2($userData) {

        $result = false;

        $sql = 'INSERT INTO shop_table (shopname, email, genre, profile,
        password) VALUES (?, ?, ?, ?, ?)';

        //ユーザーデータを配列に入れる
        $arr = [];
        $arr[] = $userData['shopname'];
        $arr[] = $userData['email'];
        $arr[] = $userData['genre'];
        $arr[] = $userData['profile'];
        $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);
        // var_dump($result);
        // exit();

        try {
            $stmt = connect() -> prepare($sql);
            $result = $stmt -> execute($arr);
            return $result;
            // var_dump($result);
            // exit();
        } catch(\Exception $e) {
            return $result;
            // var_dump($result);
            // exit();
        }
    }
    /**
     * ログイン処理
     * @param string $email
     * @param string $password
     * @return bool $result
    */
    public static function login2($email, $password) {
        //結果
        $result = false;
        //ユーザーをemailから検索して取得
        $user = self::getUserByEmail2($email);

        if(!$user) {
            $_SESSION["msg"] = "emailかパスワードが一致しません。";
            return $result;
        }

        // var_dump($user);
        // return;

        //パスワードの照会
        if(password_verify($password, $user["password"])) {
            // ログイン成功
            session_regenerate_id(true);
            $_SESSION["login_user"] = $user;
            $result = true;
            return $result;
        }
        $_SESSION["msg"] = "emailかパスワードが一致しません。";
        return $result;
    }
    /**
     * emailからユーザーを取得
     * @param string $email
     * @return array|bool $user|false
    */
    public static function getUserByEmail2($email) {
        //SQLの準備
        //SQLの実行
        //SQLの結果を返す
        $sql = 'SELECT * FROM shop_table WHERE email = ?';

        //emailを配列に入れる
        $arr = [];
        $arr[] = $email;

        try {
            $stmt = connect() -> prepare($sql);
            $stmt -> execute($arr);
            //SQLの結果を返す
            $user = $stmt -> fetch();
            return $user;
        } catch(\Exception $e) {
            return false;
        }
    }
    /**
     * ユーザーを編集する
     * @param array $userData
     * @return bool $result
    */
    public static function editUser2() {

        $result = false;

        $sql = 'SELECT * FROM shop_table WHERE id=id';
        // $stmt = connect() -> prepare($sql);

        try {
            $stmt = connect() -> prepare($sql);
            $stmt->execute();
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            return $result;
        // $status = $stmt->execute();
        // var_dump($result);
        // exit();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }
    /** 
     * 編集したユーザーを登録する
     * @param array $userData
     * @return bool $result
    */
    public static function updateUser2() {

        $result = false;

        $sql = 'UPDATE shop_table SET shopname=:shopname, email=:email, genre=:genre,
        profile=:profile, password=:password WHERE id=:id';

        if (
            !isset($_POST['shopname']) || $_POST['shopname'] == '' ||
            !isset($_POST['email']) || $_POST['email'] == '' ||
            !isset($_POST['genre']) || $_POST['genre'] == '' ||
            !isset($_POST['profile']) || $_POST['profile'] == '' ||
            !isset($_POST['password']) || $_POST['password'] == ''||
            !isset($_POST['id']) || $_POST['id'] == ''
        ) {
            exit('paramError');
        }

        $shopname = $_POST['shopname'];
        $email = $_POST['email'];
        $genre = $_POST['genre'];
        $profile = $_POST['profile'];
        //再登録したパスワードもhash化する
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $id = $_POST['id'];
        // var_dump($id);
        // exit();

        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':shopname', $shopname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindValue(':profile', $profile, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        try {
        $stmt -> execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
        $_SESSION["login_user"] = self::getUserByEmail2($email);
    }

    /**
     * ユーザーを削除する
     * @param array $userData
     * @return bool $result
    */
    public static function deleteUser2() {

        $result = false;

        $sql = 'DELETE FROM shop_table WHERE id=:id';

        $id = $_POST['id'];

        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        try {
        $stmt->execute();
        // return $result;
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }
    /**
     * ユーザーリストを表示する
     * @param array $userData
     * @return bool $result
    */
    public static function userList2() {
        $result = false;
        // $sql = 'SELECT * FROM shop_table WHERE name=:name, genre=:genre, profile=:profile, URL=:URL';
        $sql = 'SELECT * FROM shop_table';
        // var_dump($result);
        // exit();
        // print("oooo");

        try {
            $stmt = connect() -> prepare($sql);
            $stmt->execute();
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo json_encode(["sql error" => "{$e->getMessage()}"]);
            // print("oooo");
            exit();
        };
    }
}