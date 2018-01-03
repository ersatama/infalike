<?php
session_start();
$ch = curl_init();
curl_setopt_array($ch,array(CURLOPT_CERTINFO=>false,CURLOPT_SSL_VERIFYHOST=>false,CURLOPT_SSL_VERIFYPEER=>false));
curl_exec($ch);
curl_close($ch);
require 'data.php';
require 'class.php';
if (isset($_POST['a'])) {
$a = json_decode($_POST['a'],true);
if ($a['s']==0) {
	$b = new alertBox();
	$b->language();//html language list
} else if ($a['s']==1) {
	$b = new alertBox();
	$b->changeLanguage($a['v']);//changing system language
} else if ($a['s']==2) {
	$b = new login();
	$b->init($a['v']);
} else if ($a['s']==3) {
session_destroy();
$a = array('v'=>'/');
echo json_encode($a);
} else if ($a['s']==4) {
$b = new alertBox();
$b->menuLeft();//menu left
} else if ($a['s']==5) {
$b = new alertBox();
$b->profileSettings();//profile settings
} else if ($a['s']==6) {
$b = new alertBox();
$b->saveProfileSettings($a['v']);//change profile settings
} else if ($a['s']==7) {
$b = new alertBox();
$b->saveMenuLeft($a['v']);//save menu changes
} else if ($a['s']==8) {
$b = new alertBox();
$b->passwordChange();
} else if ($a['s']==9) {
$b = new alertBox();
$b->passwordChangeSave($a['v']);
} else if ($a['s']==10) {
$b = new alertBox();
$b->profileAddress();
} else if ($a['s']==11) {
$b = new alertBox();
$b->profileAddressChange($a['v']);
} else if ($a['s']==12) {
$b = new alertBox();
$b->profileAddressChangeNow($a['v']);
} else if ($a['s']==13) {
$b = new alertBox();
$b->saveSettingsDesign($a['v']);
} else if ($a['s']==14) {
$b = new alertBox();
$b->settingsCode();
} else if ($a['s']==15) {
$b = new alertBox();
$b->settingsPR();
} else if ($a['s']==16) {
$b = new alertBox();
$b->settingsPRChange($a['v']);
} else if ($a['s']==17) {
$b = new alertBox();
$b->savePR($a['v']);
} else if ($a['s']==18) {
$b = new alertBox();
$b->settings($a['v']);
} else if ($a['s']==19) {
$b = new alertBox();
$b->settingsSave($a['v']);
} else if ($a['s']==20) {
$b = new alertBox();
$b->privacy($a['v']);
} else if ($a['s']==21) {
$b = new alertBox();
$b->email($a['v']);
} else if ($a['s']==22) {
$b = new alertBox();
$b->eventType();
} else if ($a['s']==23) {
$b = new alertBox();
$b->saveEventTypes($a['v']);//change profile settings
} else if ($a['s']==24) {
$b = new alertBox();
$b->notifications($a['v']);
} else if ($a['s']==25) {
$b = new alertBox();
$b->secureQ($a['v']);//secuirty questions
} else if ($a['s']==26) {
$b = new alertBox();
$b->secureC($a['v']);//check security questions
} else if ($a['s']==27) {
$b = new alertBox();
$b->secureQC($a['v']);//check security questions change
} else if ($a['s']==28) {
$b = new alertBox();
$b->secureQS($a['v']);//save security questions change
} else if ($a['s']==29) {
$b = new alertBox();
$b->accessibility($a['v']);
} else if ($a['s']==30) {
$b = new alertBox();
$b->saveViews($a['v']);
} else if ($a['s']==31) {
$b = new alertBox();
$b->saveInterests($a['v']);
} else if ($a['s']==32) {
$b = new alertBox();
$b->saveContacts($a['v']);
} else if ($a['s']==33) {
$b = new alertBox();
$b->profileHome();
} else if ($a['s']==34) {
$b = new alertBox();
$b->cityList($a['v']);
} else if ($a['s']==35) {
$b = new alertBox();
$b->educationList($a['v']);
} else if ($a['s']==36) {
$b = new alertBox();
$b->educationAdd($a['v']);
} else if ($a['s']==37) {
$b = new alertBox();
$b->educationSave($a['v']);
} else if ($a['s']==38) {
$b = new alertBox();
$b->del($a['v']);
} else if ($a['s']==39) {
$b = new alertBox();
$b->delSave($a['v']);
} else if ($a['s']==40) {
$b = new alertBox();
$b->saveDel($a['v']);
} else if ($a['s']==41) {
$b = new alertBox();
$b->editEdu($a['v']);
} else if ($a['s']==42) {
$b = new alertBox();
$b->cityL($a['v']);
} else if ($a['s']==43) {
$b = new alertBox();
$b->eduL($a['v']);
} else if ($a['s']==44) {
$b = new alertBox();
$b->saveEduChanges($a['v']);
} else if ($a['s']==45) {
$b = new alertBox();
$b->eduFaculty($a['v']);
} else if ($a['s']==46) {
$b = new alertBox();
$b->saveMilitary($a['v']);
} else if ($a['s']==47) {
$b = new alertBox();
$b->deleteMilitary($a['v']);
} else if ($a['s']==48) {
$b = new alertBox();
$b->delM($a['v']);
} else if ($a['s']==49) {
$b = new alertBox();
$b->editMilitary($a['v']);
} else if ($a['s']==50) {
$b = new alertBox();
$b->saveMilitaryChanges($a['v']);
} else if ($a['s']==51) {
monthDayList($a['v']);
} else if ($a['s']==52) {
$b = new alertBox();
$b->saveInfo($a['v']);
} else if ($a['s']==53) {
$b = new alertBox();
$b->cancelInfo();
} else if ($a['s']==54) {
$b = new alertBox();
$b->profilePicture();
} else if ($a['s']==55) {
$b = new alertBox();
$b->profilePictureF($a['v']);
} else if ($a['s']==56) {
$b = new alertBox();
$b->stickerList($a['v']);
} else if ($a['s']==57) {
alertBox::webPhoto();
} else if ($a['s']==58) {
$b = new alertBox();
$b->newDoc();
} else if ($a['s']==59) {
$b = new alertBox();
$b->docSettings($a['v']);
} else if ($a['s']==60) {
$b = new alertBox();
$b->docEditSave($a['v']);
} else if ($a['s']==61) {
$b = new alertBox();
$b->docLock($a['v']);
} else if ($a['s']==62) {
alertBox::docFormChange($a['v']);
} else if ($a['s']==63) {
alertBox::docReplace($a['v']);
} else if ($a['s']==64) {
alertBox::docEdit($a['v']);
} else if ($a['s']==65) {
alertBox::docDel($a['v']);
} else if ($a['s']==66) {
alertBox::docDelete($a['v']);
} else if ($a['s']==67) {
alertBox::docDeletePass($a['v']);
} else if ($a['s']==68) {
exit(json_encode(alertBox::docContinue($a['v'])));
} else if ($a['s']==69) {
alertBox::docListDelete($a['v']);
} else if ($a['s']==70) {
alertBox::docRestore($a['v']);
} else if ($a['s']==71) {
alertBox::docSearch($a['v']);
} else if ($a['s']==72) {
alertBox::docRestorePass($a['v']);
} else if ($a['s']==73) {
alertBox::docDeleteE($a['v']);
} else if ($a['s']==74) {
alertBox::docDeleteEND($a['v']);
} else if ($a['s']==75) {
alertBox::fileList($a['v']);
} else if ($a['s']==76) {
alertBox::folderMove($a['v']);
} else if ($a['s']==77) {
alertBox::folderContinue($a['v']);
} else if ($a['s']==78) {
alertBox::docMove($a['v']);
} else if ($a['s']==79) {
alertBox::folderReplace($a['v']);
} else if ($a['s']==80) {
alertBox::folderDocMove($a['v']);
} else if ($a['s']==81) {
alertBox::newFolder();
} else if ($a['s']==82) {
exit(json_encode(alertBox::createFolder($a['v'])));
} else if ($a['s']==83) {
alertBox::folderEdit($a['v']);
} else if ($a['s']==84) {
alertBox::saveFolderEdit($a['v']);
} else if ($a['s']==85) {
alertBox::moveNewFolder($a['v']);
} else if ($a['s']==86) {
alertBox::saveMoveFolder($a['v']);
} else if ($a['s']==87) {
alertBox::infoFolder($a['v']);
} else if ($a['s']==88) {
alertBox::deleteFolder($a['v']);
} else if ($a['s']==89) {
alertBox::delFolC($a['v']);
} else if ($a['s']==90) {
alertBox::resFD($a['v']);
} else if ($a['s']==91) {
alertBox::folderSearch($a['v']);
} else if ($a['s']==92) {
alertBox::docSupport();
} else if ($a['s']==93) {
alertBox::docSupportSave($a['v']);
} else if ($a['s']==94) {
alertBox::follow($a['v']);
} else if ($a['s']==95) {
alertBox::audio($a['v']);
} else if ($a['s']==96) {
alertBox::newAudio();
} else if ($a['s']==97) {
alertBox::audioLike($a['v']);
} else if ($a['s']==98) {
alertBox::auLk($a['v']);
} else if ($a['s']==99) {
alertBox::au($a['v']);
} else if ($a['s']==100) {
alertBox::auData($a['v']);
} else if ($a['s']==101) {
alertBox::auCon($a['v']);
} else if ($a['s']==102) {
alertBox::auNext($a['v']);
} else if ($a['s']==103) {
alertBox::auText($a['v']);
} else if ($a['s']==104) {
alertBox::auMove($a['v']);
} else if ($a['s']==105) {
alertBox::auRem($a['v']);
} else if ($a['s']==106) {
alertBox::auS($a['v']);
} else if ($a['s']==107) {
alertBox::auRes($a['v']);
} else if ($a['s']==108) {
alertBox::auPlistEdit($a['v']);
} else if ($a['s']==109) {
alertBox::auPlistAdd($a['v']);
} else if ($a['s']==110) {
alertBox::auPlistUpdate($a['v']);
} else if ($a['s']==111) {
alertBox::auPlistMove($a['v']);
} else if ($a['s']==112) {
alertBox::auPlistSearch($a['v']);
} else if ($a['s']==113) {
alertBox::auPlAdd($a['v']);
} else if ($a['s']==114) {
alertBox::auPlSearch($a['v']);
} else if ($a['s']==115) {
alertBox::auPlistEdUpdate($a['v']);
} else if ($a['s']==116) {
alertBox::auPlistEdSave($a['v']);
} else if ($a['s']==117) {
alertBox::auPlistDel($a['v']);
} else if ($a['s']==118) {
alertBox::delPlist($a['v']);
} else if ($a['s']==119) {
alertBox::pAu($a['v']);
} else if ($a['s']==120) {
alertBox::auPMove($a['v']);
} else if ($a['s']==121) {
alertBox::vPST($a['v']);
} else if ($a['s']==122) {
alertBox::auPlistC($a['v']);
} else if ($a['s']==123) {
alertBox::auPC($a['v']);
} else if ($a['s']==124) {
alertBox::newPlist();
} else if ($a['s']==125) {
alertBox::createPlist($a['v']);
} else if ($a['s']==126) {
alertBox::url($a['v']);
} else if ($a['s']==127) {
alertBox::savePLIST($a['v']);
} else if ($a['s']==128) {
alertBox::chA($a['v']);
}

}
?>