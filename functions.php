<?php
function check_login($con)    // student login
{
	if (isset($_SESSION['uid'])) {
		$query = "select * from STUDENT where SID='{$_SESSION['uid']}' limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}

function check_login1($con)    // company login
{
	if (isset($_SESSION['uid'])) {
		$query = "select * from COMPANY where CID='{$_SESSION['uid']}' limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}

function check_login2($con)  // admin login
{
	if (isset($_SESSION['uid'])) {
		$query = "select * from admin where id='{$_SESSION['uid']}' limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}
