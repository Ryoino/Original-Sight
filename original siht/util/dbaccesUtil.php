<?php
function connect2MySQL(){
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=originalsight_db;charset=utf8','ryo','ryota0910');
		//SQL実行時のエラーをtry-catchで取得できるように設定
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $e) {
		die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
	}
}

//mark_tにレコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_mark($userID,$code){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO mark_t(userID,itemCode)"
			. "VALUES(:userID,:itemCode)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':userID',$userID);
			$insert_query->bindValue(':itemCode',$code);
			//SQLを実行
			try{
				$insert_query->execute();
			} catch (PDOException $e) {
				//接続オブジェクトを初期化することでDB接続を切断
				$insert_db=null;
				return $e->getMessage();
			}
			$insert_db=null;
			return null;
}

function insert_user($name,$mail,$pass,$postal,$address){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO user_t(name,mail,password,postal,address,newDate)"
			. "VALUES(:name,:mail,:password,:postal,:address,:newDate)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':name',$name);
			$insert_query->bindValue(':mail',$mail);
			$insert_query->bindValue(':password',$pass);
			$insert_query->bindValue(':postal',$postal);
			$insert_query->bindValue(':address',$address);
			$insert_query->bindValue(':newDate',$date);
			//SQLを実行
			try{
				$insert_query->execute();
			} catch (PDOException $e) {
				//接続オブジェクトを初期化することでDB接続を切断
				$insert_db=null;
				return $e->getMessage();
			}
			$insert_db=null;
			return null;
}

function delete_mark($userID,$code){
    //db接続を確立
    $delete_db = connect2MySQL();
    $delete_sql = " DELETE FROM mark_t WHERE userID = :userID and itemCode = :itemCode ";
    //クエリとして用意
		$delete_query = $delete_db->prepare($delete_sql);
		$delete_query->bindValue(':userID',$userID);
		$delete_query->bindValue(':itemCode',$code);
    //SQLを実行
    try{
        $delete_query->execute();
    } catch (PDOException $e) {
        $delete_query=null;
        return $e->getMessage();
    }
		return null;
}

//user_tからユーザー名とパスが一致するものを探し出す
function search_profiles($name,$pass){
	//db接続を確立
	$search_db = connect2MySQL();

	$search_sql = "SELECT * from user_t where name= :name and password= :password";
	//クエリとして用意
	$search_query = $search_db->prepare($search_sql);

	$search_query->bindValue(':name',$name);
	$search_query->bindValue(':password',$pass);
	//SQLを実行
	try{
		$search_query->execute();
	} catch (PDOException $e) {
		$search_query=null;
		return $e->getMessage();
	}
	//全レコードを連想配列として返却
	return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

function search_mark($userID){
    //db接続を確立
    $search_db = connect2MySQL();

    $search_sql = " SELECT itemCode FROM mark_t WHERE userID = '$userID' ";


    //クエリとして用意
    $search_query = $search_db->prepare($search_sql);

    //SQLを実行
    try{
        $search_query->execute();
    } catch (PDOException $e) {
        $search_query=null;
        return $e->getMessage();
    }

    //全レコードを連想配列として返却
    return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

function search_buy($userID){
	$search_db = connect2MySQL();

	$search_sql = " SELECT itemCode FROM buy_t WHERE userID = $userID ";

	//クエリとして用意
	$search_query = $search_db->prepare($search_sql);

	//SQLを実行
	try{
			$search_query->execute();
	} catch (PDOException $e) {
			$search_query=null;
			return $e->getMessage();
	}

	//全レコードを連想配列として返却
	return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

//buy_tにレコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_buy($userID, $code, $type, $amount){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO buy_t(userID,itemCode,type,amount,buyDate)"
			. "VALUES(:userID,:itemCode,:type,:amount,:buyDate)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':userID',$userID);
			$insert_query->bindValue(':itemCode',$code);
			$insert_query->bindValue(':type',$type);
			$insert_query->bindValue(':amount',$amount);
			$insert_query->bindValue(':buyDate',$date);
			//SQLを実行
			try{
				$insert_query->execute();
			} catch (PDOException $e) {
				//接続オブジェクトを初期化することでDB接続を切断
				$insert_db=null;
				return $e->getMessage();
			}
			$insert_db=null;
			return null;
}

//buy_tからユーザーのamountを引き出す
function search_amount($userID){
	//db接続を確立
	$search_db = connect2MySQL();

	$search_sql = "SELECT amount from buy_t where userID= $userID";

	//クエリとして用意
	$search_query = $search_db->prepare($search_sql);

	//SQLを実行
	try{
		$search_query->execute();
	} catch (PDOException $e) {
		$search_query=null;
		return $e->getMessage();
	}
	//全レコードを連想配列として返却
	return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

//TOTALの総和をuser_tへ更新
function update_total($userID,$total){
	$update_db = connect2MySQL();
	$update_sql = "UPDATE user_t set total=:total where userID=:userID";
	//クエリとして用意
	$update_query = $update_db->prepare($update_sql);
	$update_query->bindValue(':userID',$userID);
	$update_query->bindValue(':total',$total);
	//SQLを実行
	try{
		$update_query->execute();
	} catch (PDOException $e) {
		$update_query=null;
		return $e->getMessage();
	}
}

function profile_detail($id){
	//db接続を確立
	$detail_db = connect2MySQL();
	$detail_sql = "SELECT * FROM user_t WHERE userID=:id";
	//クエリとして用意
	$detail_query = $detail_db->prepare($detail_sql);
	$detail_query->bindValue(':id',$id);
	//SQLを実行
	try{
		$detail_query->execute();
	} catch (PDOException $e) {
		$detail_query=null;
		return $e->getMessage();
	}
	//レコードを連想配列として返却
	return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}

?>
