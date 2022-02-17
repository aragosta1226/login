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

        $sql = 'INSERT INTO todo_table (name, email, 
        password) VALUES (?, ?, ?)';

        //ユーザーデータを配列に入れる
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);

        try {
            $stmt = connect() -> prepare($sql);
            $result = $stmt -> execute($arr);
            return $result;
        } catch(\Exception $e) {
            return $result;
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

        $sql = 'UPDATE todo_table SET name=:name, email=:email, 
        password=:password WHERE id=:id';

        if (
            !isset($_POST['name']) || $_POST['name'] == '' ||
            !isset($_POST['email']) || $_POST['email'] == '' ||
            !isset($_POST['password']) || $_POST['password'] == ''||
            !isset($_POST['id']) || $_POST['id'] == '' 
        ) {
            exit('paramError');
        }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        //再登録したパスワードもhash化する
        $password = password_hash($userData['password'],PASSWORD_DEFAULT);
        $id = $_POST['id'];
        // var_dump($id);
        // exit();

        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        try {
        $stmt -> execute();
        // return $result; 
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }

    /** 
     * ユーザーを削除する
     * @param array $userData
     * @return bool $result
    */
    public static function deleteUser() {
        $result = false;
        $sql = 'DELETE FROM todo_table WHERE id=:id';
        // var_dump($_POST);
        // exit();
        $id = $_POST['id'];

        $stmt = connect() -> prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        try {
        $stmt->execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }

}