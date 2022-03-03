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

        $sql = 'INSERT INTO users_table (name, email, genre,
        profile, URL, password) VALUES (?, ?, ?, ?, ?, ?)';
        // var_dump($result);
        // exit();

        //ユーザーデータを配列に入れる
        $arr = [];
        $arr[] = $userData['name'];
        $arr[] = $userData['email'];
        $arr[] = $userData['genre'];
        $arr[] = $userData['profile'];
        $arr[] = $userData['URL'];
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
            $_SESSION["msg"] = "emailが一致しません。";
            return $result;
        }

        // var_dump($user);
        // return;

        //パスワードの照会
        if(password_verify($password, $user["password"])) {
            // ログイン成功
            session_regenerate_id(true);
            $_SESSION = array();
            $_SESSION["login_user"] = $user;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['session_id'] = session_id();
            // $_SESSION['is_admin'] = $val['is_admin'];
            $_SESSION['name'] = $user['name'];
            $result = true;
            return $result;
        }
        $_SESSION["msg"] = "パスワードが一致しません。";
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
        $sql = 'SELECT * FROM users_table WHERE email = ?';

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

        $sql = 'SELECT * FROM users_table WHERE id=id';
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

        $sql = 'UPDATE users_table SET name=:name, email=:email, genre=:genre,
        profile=:profile, URL=:URL, password=:password WHERE id=:id';

        if (
            !isset($_POST['name']) || $_POST['name'] == '' ||
            !isset($_POST['email']) || $_POST['email'] == '' ||
            !isset($_POST['genre']) || $_POST['genre'] == '' ||
            !isset($_POST['profile']) || $_POST['profile'] == '' ||
            !isset($_POST['URL']) || $_POST['URL'] == '' ||
            !isset($_POST['password']) || $_POST['password'] == ''||
            !isset($_POST['id']) || $_POST['id'] == ''
        ) {
            exit('paramError');
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $genre = $_POST['genre'];
        $profile = $_POST['profile'];
        $URL = $_POST['URL'];
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
        $stmt->bindValue(':URL', $URL, PDO::PARAM_STR);
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

        $sql = 'DELETE FROM users_table WHERE id=:id';

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
        $sql = 'SELECT * FROM users_table';
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
            $_SESSION = array();
            $_SESSION["login_user"] = $user;
            $_SESSION['shop_id'] = $user['id'];
            $_SESSION['session_id'] = session_id();
            // $_SESSION['is_admin'] = $val['is_admin'];
            $_SESSION['shopname'] = $user['shopname'];
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
    /**
     * LIKEデータの追加
     * @param array $userData
     * @return bool $result
    */
    public static function userLike() {
        $result = false;

        $user_id = $_GET['user_id'];
        $shop_id = $_GET['shop_id'];

        $sql = 'SELECT COUNT(*) FROM like_table WHERE user_id = :user_id AND shop_id = :shop_id';
        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':shop_id', $shop_id, PDO::PARAM_STR);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo json_encode(["sql error" => "{$e->getMessage()}"]);
            exit();
        }

        $like_count = $stmt->fetchColumn();

        if($like_count != 0) {
            //イイネされている状態
            $sql = 'DELETE FROM like_table WHERE user_id = :user_id AND shop_id = :shop_id';
        } else {
            //イイネされていない状態
            $sql = 'INSERT INTO like_table (id, user_id, shop_id, created_at) VALUES (NULL, :user_id, :shop_id, now())';
        }
        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':shop_id', $shop_id, PDO::PARAM_STR);

        // var_dump($user_id);
        // exit();

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo json_encode(["sql error" => "{$e->getMessage()}"]);
            exit();
        }
    }
//     /**
//      * テーブルを結合させる処理
//      * @param array $userData
//      * @return bool $result
//     */
//     public static function userLikes() {
//         $result = false;

//         $sql = "SELECT * FROM like_table LEFT OUTER JOIN (SELECT shop_id, COUNT(id) AS like_count FROM like_table GROUP BY todo_id) AS result_table ON todo_table.id = result_table.todo_id";
//         $user_id = $_SESSION["user_id"];

//         $stmt = connect() -> prepare($sql);

//         try {
//         $status = $stmt->execute();
//         } catch (PDOException $e) {
//         echo json_encode(["sql error" => "{$e->getMessage()}"]);
//         exit();
//         }
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

}