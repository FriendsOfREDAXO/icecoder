<?php

// check for a valid redaxo backend admin user session.
$baseUrl = 'https://%%HOST%%'.$_SERVER['REQUEST_URI'];
$url = preg_replace('{icecoder(.*)}', 'redaxo/index.php?page=users/users&rex-api-call=has_user_session&perm=admin', $baseUrl);

// passthru cookies, so the called api-function can determine the current users' session
$passCookies = [];
foreach($_COOKIE as $name => $value) {
    $passCookies[] = $name. '='. $value;
}
$passCookies = implode(';', $passCookies);

$curl = curl_init($url);
// curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_setopt($curl, CURLOPT_COOKIE, $passCookies);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// allow self-signed certificates
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

$json = curl_exec($curl);
if ($error = curl_error($curl)) {
    echo 'Curl error '. curl_errno($curl) .': '. $error;
    exit(1);
}
curl_close($curl);

if (!$json || !($result = json_decode($json)) || !$result) {
    echo('Login nur als REDAXO Admin erlaubt!');
    exit();
}

// ICEcoder system settings
$ICEcoderSettings = array(
    "versionNo"		=> "6.0",
    "codeMirrorDir"		=> "CodeMirror",
    "docRoot"		=> $_SERVER['DOCUMENT_ROOT'],	// Set absolute path of another location if needed
    "demoMode"		=> false,
    "devMode"		=> false,
    "fileDirResOutput"	=> "none",			// Can be none, raw, object, both (all but 'none' output to console)
    "loginRequired"		=> false,
    "password" => md5(uniqid(mt_rand(), true)),
    "multiUser"		=> false,
    "languageBase"		=> "english.php",
    "lineEnding"		=> "\n",
    "newDirPerms"		=> 755,
    "newFilePerms"		=> 644,
    "enableRegistration"	=> true
);
?>