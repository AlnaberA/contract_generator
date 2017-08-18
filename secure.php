<?
$file = basename($_SERVER["SCRIPT_NAME"]);
	require_once('mcl_Html.php');
	require_once('mcl_Header.php');
	require_once("mcl_Ldap.php");
	require_once('static/src/php/require.php');
	
	//set_error_handler("error");
	//header("Refresh: 900")

$user = auth::check();
$authorized = ($user["status"] == "authorized" ? 1 : 0);

//Cleanup Logout
if (isset($_GET["logout"]) && $_GET["logout"] == "true") {
	header("Location: " . $file);
	die();
}
 mcl_Html::html5(true);
 mcl_Html::set_ie_version('edge');
mcl_Html::no_cache(true);
// mcl_Html::js(mcl_Html::DOJO);
// mcl_Html::js(mcl_Html::AJAX);
// mcl_Html::js(mcl_Html::CONSOLE);
// mcl_Html::js(mcl_Html::CALENDAR);
// mcl_Html::js(mcl_Html::HIGHSTOCK);
// mcl_Html::css(mcl_Html::CALENDAR);
mcl_Html::title("Contract Generator");

if (!$authorized) {
	require_once("login.php");
	die();
}

//Cleanup Login
if (isset($_POST['username'])) {
	header("Location: " . $file);
	die();
}


$name = $user['name'];
mcl_Header::auth($user['name']);
$version = 'v3.1.2';

//mcl_Header::version('<span onclick="ics.dashboard.section.show(\'about\');">'.$version.'</span>');
//mcl_Header::build('NB Construction Survey');
?>