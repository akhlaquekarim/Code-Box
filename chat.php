<?php
session_start();

if(isset($_POST['ajaxsend']) && $_POST['ajaxsend']==true){
	// Code to save and send chat
	$chat = fopen("chatdata.txt", "a");
	date_default_timezone_set("Asia/Kolkata");
	$rand=rand(1000, 500000);
	$random= 'p'.$rand;
	$data="<pre><b style='color:red;  text-transform: uppercase;'>".$_SESSION['username'].'</b><b style="color:green;">  ( '. date("d-m-Y h:i A")." )</b> <button onclick=\"copyToClipboard('#".$random."')\">COPY :)</button><br><span id=\"".$random."\">".$_POST['chat']."</span></pre>";
	fwrite($chat,$data);
	fclose($chat);

	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxget']) && $_POST['ajaxget']==true){
	// Code to send chat history to the user
	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxclear']) && $_POST['ajaxclear']==true){
	// Code to clear chat history
	$chat = fopen("chatdata.txt", "w");
	date_default_timezone_set("Asia/Kolkata");
	$data="<pre><b style='color:red;text-transform: uppercase;'>".$_SESSION['username'].' : </b> Cleared Chat <b style="color:green;"> ( '. date("d-m-Y h:i A")." )</b></pre><br>";
	fwrite($chat,$data);
	fclose($chat);
}