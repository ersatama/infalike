<?php
$info = array();
require 'language.php';
$info[0] = array(0=>'localhost',1=>'root',2=>'',3=>'infalike');//database info
$info[1] = array('lang'=>0,'status'=>0,'ip'=>'','url'=>'');//init info
$info[2] = array();//database table info
$info[2][0] = array(0=>'_ip',1=>'id',2=>'ip',3=>'tm',4=>'ss');//ip blacklist db
$info[2][1] = array(0=>'_authorization',1=>'id',2=>'email',3=>'phone',4=>'password');//authorization
$info[2][2] = array(0=>'_login',1=>'id',2=>'alias',3=>'st');//login
$info[2][3] = array(0=>'_access',1=>'id',2=>'ip',3=>'login',4=>'tm');//login
$info[2][4] = array(0=>'_topic',1=>'id',2=>'tt',3=>'mt',4=>'ct',5=>'tm',6=>'lg',7=>'nm');//topic
$info[2][5] = array(0=>'_pop_topic',1=>'id',2=>'n',3=>'ss');//pop_topics
$info[2][6] = array(0=>'_faq_topic',1=>'id',2=>'n',3=>'ss');//faq_topics
$info[2][7] = array(0=>'_profile_settings',1=>'id',2=>'n',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'p6',9=>'p7',10=>'p8',11=>'p9');//profile settings
$info[2][8] = array(0=>'_menu_settings',1=>'id',2=>'n',3=>'v');//menu_settings
$info[2][9] = array(0=>'_interface_settings',1=>'id',2=>'s1',3=>'s2',4=>'s3',5=>'l');//interface_settings
$info[2][10] = array(0=>'_pass_request',1=>'id',2=>'p1',3=>'p2',4=>'p3');//security_settings
$info[2][11] = array(0=>'_secuirty',1=>'id',2=>'p1',3=>'p2',4=>'p3');//security
$info[2][12] = array(0=>'_privacy',1=>'id',2=>'_p0',3=>'_p1',4=>'_p2',5=>'_p3',6=>'_p4',7=>'_p5',8=>'_p6',9=>'_p7',10=>'_p8',11=>'_p9',12=>'_p10',13=>'_p11',14=>'_p12',15=>'_p13',16=>'_p14',17=>'_p15',18=>'_p16',19=>'_p17',20=>'_p18');//privacy
$info[2][13] = array(0=>'_events_type',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'p6',9=>'p7',10=>'p8',11=>'p9',12=>'p10');//event type
$info[2][14] = array(0=>'_notifications',1=>'id',2=>'p0',3=>'p1',4=>'p2');//notifications
$info[2][15] = array(0=>'_access_question',1=>'id',2=>'lg',3=>'q0',4=>'a0',5=>'q1',6=>'a1',7=>'q2',8=>'a2',9=>'tm');//access questions
$info[2][16] = array(0=>'_access_settings',1=>'id',2=>'p0',3=>'p1');//access settings
$info[2][17] = array(0=>'_info',1=>'id',2=>'nm',3=>'ln',4=>'mn',5=>'s',6=>'bd_d',7=>'bd_m',8=>'bd_y',9=>'bd_s');//info
$info[2][18] = array(0=>'_personal_info',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'p6',9=>'p7');//personal info
$info[2][19] = array(0=>'_stat_personal',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'time');//personal statistics
$info[2][20] = array(0=>'_info_interests',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3');//interests
$info[2][21] = array(0=>'_info_contacts',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3');//contacts
$info[2][22] = array(0=>'_info_school',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'p6',9=>'ss',10=>'nm');//school
$info[2][23] = array(0=>'_info_uni',1=>'id',2=>'p0',3=>'p1',4=>'p2',5=>'p3',6=>'p4',7=>'p5',8=>'p6',9=>'ss',10=>'nm');//university
$info[2][24] = array(0=>'_info_language',1=>'id',2=>'p0',3=>'ss',4=>'nm',5=>'ct');//language
$info[2][25] = array(0=>'_info_military',1=>'id',2=>'ct',3=>'p0',4=>'p1',5=>'by',6=>'ey',7=>'ss',8=>'nm');//military
$info[2][26] = array(0=>'_support_name',1=>'id',2=>'nm',3=>'ls',4=>'mn',5=>'ss',6=>'tm');//support name
$info[2][27] = array(0=>'_img',1=>'id',2=>'src',3=>'sz',4=>'tm',5=>'own',6=>'ss');//image
$info[2][28] = array(0=>'_img_u',1=>'id',2=>'img',3=>'own',4=>'desc',5=>'tm',6=>'al',7=>'ss');//image user
$info[2][29] = array(0=>'_img_al',1=>'id',2=>'own',3=>'tt',4=>'pb',5=>'ss',6=>'tm',7=>'ct');//image album
$info[2][30] = array(0=>'_img_al_l',1=>'id',2=>'al',3=>'i_u',4=>'ct',5=>'ss',6=>'tm');//image album
$info[2][31] = array(0=>'_img_pi',1=>'id',2=>'own',3=>'img',4=>'option',5=>'ss',6=>'tm');//image profile image
$info[2][32] = array(0=>'_img_wi',1=>'id',2=>'own',3=>'img',4=>'option',5=>'ss',6=>'tm');//image wall image
$info[2][33] = array(0=>'_img_map',1=>'id',2=>'img',3=>'lat',4=>'lng',5=>'ss');//image map
$info[2][34] = array(0=>'_doc_sett',1=>'id',2=>'tp',3=>'dl',4=>'cl');//document settings
$info[2][35] = array(0=>'_doc',1=>'id',2=>'own',3=>'name',4=>'tp',5=>'sz',6=>'tm',8=>'ss',9=>'src');//document
$info[2][36] = array(0=>'_doc_list',1=>'id',2=>'own',3=>'doc',4=>'nm',5=>'tm',6=>'ct',7=>'ss',8=>'f',9=>'lck');//document list
$info[2][37] = array(0=>'_doc_folder',1=>'id',2=>'own',3=>'nm',4=>'tm',5=>'ss',6=>'ct',7=>'ac');//folder
$info[2][38] = array(0=>'_doc_folder_list',1=>'id',2=>'own',3=>'folder',4=>'doc',5=>'ct',6=>'ss');//folder list
$info[2][39] = array(0=>'_doc_del',1=>'id',2=>'own',3=>'doc',4=>'tm',5=>'ss',6=>'ct');//document delete
$info[2][40] = array(0=>'_doc_gif',1=>'id',2=>'doc',3=>'src',4=>'ss');//screen and gif
$info[2][41] = array(0=>'_support',1=>'id',2=>'type',3=>'own',4=>'body',5=>'tm',6=>'ss');//support
$info[2][42] = ['_audio','id','own','ss','nm','au','dr','gr','txt','dt'];//audio
$info[2][43] = ['_audio_u','id','own','au','ct','ss','dt'];//audio user
$info[2][44] = ['_audio_lk','id','au','own','ss'];//audio like
$info[2][45] = ['_audio_al','id','own','src','nm','dt','ss'];//audio album
$info[2][46] = ['_audio_al_lt','id','al','au','ct','ss'];//audio album list
$info[2][47] = ['_audio_al_add','id','own','al','ct','ss'];//audio album user
$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
$info[2][49] = ['_audio_playlist_add','id','plst','own','ss','ct'];//audio playlist add
$info[2][50] = ['_audio_playlist_list','id','plst','au','ss','ct'];//audio playlist list
$info[2][51] = ['_black_list','id','own','user','ct','ss','tm'];//black list
$info[2][52] = ['_club','id','own','name','pass','desc','ss','tm','dt'];//club
$info[2][53] = ['_club_list','id','club','own','oct','cct','ss','tm'];//club list
$info[2][54] = ['_follow','id','own','fl','ss','tm','ct'];//follow
$info[2][55] = ['_audio_sort','id','t'];//sorting audio
$info[6] = array(0=>'Firefox',1=>'Opera',2=>'Chrome',3=>'Internet Explorer',4=>'Safari');
$info[7] = array(0=>array(0=>'Mozilla',1=>'https://www.mozilla.org/en-US/firefox/new/'),1=>array(0=>'Chrome',1=>'https://www.google.com/chrome/browser/desktop/'),2=>array(0=>'Opera',1=>'http://www.opera.com/en/download'));
$info[8] = array(0=>'<link rel="stylesheet" href="/styles/_1.css">',1=>'<link rel="stylesheet" href="/styles/_2.css">',2=>'<link rel="stylesheet" href="/styles/m.css">',3=>'<link rel="stylesheet" href="/styles/_3.css">');
$info[9] = array(0=>'<script src="/js/frame.js"></script>');
$info[10] = array(0=>39,1=>40,2=>44,3=>42,4=>81,5=>41,6=>43,7=>46,8=>47,9=>45);//footer menu
$info[11] = array(0=>'about',1=>'help',2=>'cookies',3=>'terms',4=>'media',5=>'jobs',6=>'privacy',7=>'mobile',8=>'advertise',9=>'developers',10=>'blogs',11=>'brands');//footer menu url
$info[12] = array(0=>array(0=>'windows phone',1=>'Windows Phone'),1=>array(0=>'Apple',1=>'IOS'),2=>array(0=>'Android',1=>'Android'));//url for external mobile app
$info[13] = array(0=>'/feed');
$info[14] = array(0=>'login',1=>'restore',2=>'');
$info[15] = array(0=>39,1=>40,2=>44,3=>42,4=>81,5=>41,6=>43,7=>46,8=>47,9=>45,10=>94,11=>95);//footer for id menu
$info[18] = array(0=>array(0=>array(0=>1,1=>1,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>1),1=>array(0=>96,1=>97,2=>98,3=>99,4=>100,5=>101,6=>102,7=>103,8=>104)),   1=>array(0=>array(0=>array(0=>0,1=>1,2=>105,3=>'/id'),1=>array(0=>0,1=>1,2=>106,3=>'/feed'),2=>array(0=>0,1=>1,2=>107,3=>'/messages'),3=>array(0=>0,1=>1,2=>108,3=>'/clubs'),4=>array(0=>0,1=>0,2=>109,3=>'/groups'),5=>array(0=>0,1=>0,2=>110,3=>'/photos'),6=>array(0=>0,1=>0,2=>111,3=>'/audios'),7=>array(0=>0,1=>0,2=>112,3=>'/videos')),1=>array(0=>array(0=>0,1=>0,2=>113,3=>'apps'),1=>array(0=>0,1=>0,2=>114,3=>'/fave'),2=>array(0=>0,1=>0,2=>115,3=>'documents')))   );
$info[20] = array(0=>'settings',1=>'feed',2=>'videos',3=>'profile',4=>'documents',5=>'docs',6=>'fave',7=>'apps',8=>'audios',9=>'clubs',10=>'groups',11=>'news',12=>'about',13=>'help',14=>'cookies',15=>'terms',16=>'media',17=>'jobs',18=>'vacancy',19=>'privacy',20=>'mobile',21=>'advertise',22=>'developers',23=>'blogs',24=>'brands',25=>'edit',26=>'secutiry',27=>'section',28=>'notifications',29=>'blacklist',30=>'services',31=>'mobile',32=>'payments',33=>'transfers',34=>'access',35=>'statistics',36=>'badjs',37=>'id');
$info[21] = [0,0,0];
$info[22] = array(0=>1,1=>1,2=>1);//password request default settings
$info[23] = array(0=>0,1=>0,2=>0);//secutiry
$info[24] = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>2,7=>3,8=>0,9=>0,10=>2,11=>0,12=>3,13=>0,14=>0,15=>1,16=>2,17=>2,18=>2);//secutiry
$info[25] = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0);//events type
$info[26] = array(0=>0,1=>0,2=>0);//notifications
$info[27] = array(0=>124,1=>125,2=>126,3=>127,4=>128,5=>129,6=>130,7=>131,8=>132,9=>133,10=>134,11=>135,12=>136,13=>137,14=>138,15=>139,16=>140,17=>141,18=>142,19=>143,20=>144,21=>145,22=>146,23=>147,24=>148,25=>149,26=>150);//questions list
$info[28] = array(0=>0,1=>0);//security settings
$info[29] = array(0=>160,1=>161,2=>162,3=>163,4=>164,5=>165,6=>166,7=>167,8=>168,9=>169,10=>170,11=>171);//month name
$info[30] = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0);//personal info default
$info[31] = array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0);//personal statistics default
$info[32] = array(0=>'',1=>'',2=>'',3=>'');//interests
$info[33] = array(0=>array(0=>0,1=>''),1=>array(0=>0,1=>''),2=>array(0=>0,1=>''),3=>array(0=>0,1=>''));//contact info
$info[39] = array(0=>array(0=>'/sources/stickers/0.1.png',1=>'/sources/stickers/0.png'),1=>array(0=>'/sources/stickers/1.1.png',1=>'/sources/stickers/1.png'),2=>array(0=>'/sources/stickers/2.1.png',1=>'/sources/stickers/2.png'),3=>array(0=>'/sources/stickers/3.1.png',1=>'/sources/stickers/3.png'),4=>array(0=>'/sources/stickers/4.1.png',1=>'/sources/stickers/4.png'),5=>array(0=>'/sources/stickers/5.1.png',1=>'/sources/stickers/5.png'),6=>array(0=>'/sources/stickers/6.1.png',1=>'/sources/stickers/6.png'),7=>array(0=>'/sources/stickers/7.1.png',1=>'/sources/stickers/7.png'),8=>array(0=>'/sources/stickers/8.1.png',1=>'/sources/stickers/8.png'),9=>array(0=>'/sources/stickers/9.1.png',1=>'/sources/stickers/9.png'),10=>array(0=>'/sources/stickers/10.1.png',1=>'/sources/stickers/10.png'),11=>array(0=>'/sources/stickers/11.1.png',1=>'/sources/stickers/11.png'),12=>array(0=>'/sources/stickers/12.1.png',1=>'/sources/stickers/12.png'),13=>array(0=>'/sources/stickers/13.1.png',1=>'/sources/stickers/13.png'),14=>array(0=>'/sources/stickers/14.1.png',1=>'/sources/stickers/14.png'),15=>array(0=>'/sources/stickers/15.1.png',1=>'/sources/stickers/15.png'),16=>array(0=>'/sources/stickers/16.1.png',1=>'/sources/stickers/16.png'),17=>array(0=>'/sources/stickers/17.1.png',1=>'/sources/stickers/17.png'),18=>array(0=>'/sources/stickers/18.1.png',1=>'/sources/stickers/18.png'),19=>array(0=>'/sources/stickers/19.1.png',1=>'/sources/stickers/19.png'),20=>array(0=>'/sources/stickers/20.1.png',1=>'/sources/stickers/20.png'),21=>array(0=>'/sources/stickers/21.1.png',1=>'/sources/stickers/21.png'),22=>array(0=>'/sources/stickers/22.1.png',1=>'/sources/stickers/22.png'),23=>array(0=>'/sources/stickers/23.1.png',1=>'/sources/stickers/23.png'),24=>array(0=>'/sources/stickers/24.1.png',1=>'/sources/stickers/24.png'),25=>array(0=>'/sources/stickers/25.1.png',1=>'/sources/stickers/25.png'),26=>array(0=>'/sources/stickers/26.1.png',1=>'/sources/stickers/26.png'),27=>array(0=>'/sources/stickers/27.1.png',1=>'/sources/stickers/27.png'),28=>array(0=>'/sources/stickers/28.1.png',1=>'/sources/stickers/28.png'),29=>array(0=>'/sources/stickers/29.1.png',1=>'/sources/stickers/29.png'),30=>array(0=>'/sources/stickers/30.1.png',1=>'/sources/stickers/30.png'),31=>array(0=>'/sources/stickers/31.1.png',1=>'/sources/stickers/31.png'),32=>array(0=>'/sources/stickers/32.1.png',1=>'/sources/stickers/32.png'),33=>array(0=>'/sources/stickers/33.1.png',1=>'/sources/stickers/33.png'),34=>array(0=>'/sources/stickers/34.1.png',1=>'/sources/stickers/34.png'),35=>array(0=>'/sources/stickers/35.1.png',1=>'/sources/stickers/35.png'),36=>array(0=>'/sources/stickers/36.1.png',1=>'/sources/stickers/36.png'),37=>array(0=>'/sources/stickers/37.1.png',1=>'/sources/stickers/37.png'),38=>array(0=>'/sources/stickers/38.1.png',1=>'/sources/stickers/38.png'),39=>array(0=>'/sources/stickers/39.1.png',1=>'/sources/stickers/39.png'),40=>array(0=>'/sources/stickers/40.1.png',1=>'/sources/stickers/40.png'),41=>array(0=>'/sources/stickers/41.1.png',1=>'/sources/stickers/41.png'));
$info[40] = [1,0,0];//save file after delete
$info[41] = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','?'];
$info[3] = array();//language list
$info[3][0] = 'English / US';
$info[3][1] = 'English / UK';
$info[3][2] = 'Русский';
$info[3][3] = 'Español';
$info[3][4] = '日本語';
$info[3][5] = 'Deutsche';
$info[3][6] = 'Türkçe';
$info[3][7] = 'Українська';
$info[3][8] = 'हिन्दी';
$info[3][9] = 'Français';
$info[3][10] = 'Italiano';
$info[3][11] = '中文(简体)';
$info[3][12] = '中文(香港)';
$info[3][13] = '‏العربية‏';
$info[3][14] = 'Português';
$info[3][15] = '한국어';
$info[3][16] = 'český';
$info[3][17] = 'Nederlands';
$info[3][18] = 'Dansk';
$info[3][19] = 'বাংলা';
$info[3][20] = 'Azərbaycan dili';
$info[3][21] = 'Eesti';
$info[3][22] = 'Latviešu';
$info[3][23] = 'Polski';
$info[3][24] = 'O\'zbek';
$info[3][25] = 'ภาษาไทย';
$info[3][26] = 'Tiếng Việt';
$info[3][27] = 'Svenska';
$info[3][28] = 'Lietuvių';
$info[3][29] = 'Íslenska';
$info[3][30] = 'Hrvatski';
$info[3][31] = 'Afrikaans';
$info[3][32] = 'Қазақша';
$info[3][33] = 'Македонски';
$info[3][34] = 'кыргызча';
$info[3][35] = 'Български';
$info[3][36] = 'Беларуская';
$info[3][37] = 'Монгол';
$info[3][38] = 'Bosanski';
$info[4][0] = array(0=>'No internet connection!',1=>'No internet access. This problem occurs when the power of internet modem will turn off, no wifi connection, switch off the internet access device or changing in proxy address.',2=>'OK',3=>'Select Language',4=>'Login blocked',5=>'We have been detect a strange actions on your pc and blocked your ip address for a while. We advise you to check your pc by antivirus. Sorry for problem.',6=>'Access is denied',7=>'The browser is not supported',8=>'Oops! Your browser is not supported by our social network. We suggest that you download and install one of the following browsers, as they are more common in the general audiences and has quite proven reliability and speed.',9=>'The password is not changed, as the old password is entered incorrectly.',10=>'Address not available',11=>'Incorrect address',12=>'Current address',13=>'Change address');
$info[4][1] = array(0=>'No internet connection!',1=>'No internet access. This problem occurs when the power of internet modem will turn off, no wifi connection, switch off the internet access device or changing in proxy address.',2=>'OK',3=>'Select Language',4=>'Login blocked',5=>'We have been detect a strange actions on your pc and blocked your ip address for a while. We advise you to check your pc by antivirus. Sorry for problem.',6=>'Access is denied',7=>'The browser is not supported',8=>'Oops! Your browser is not supported by our social network. We suggest that you download and install one of the following browsers, as they are more common in the general audiences and has quite proven reliability and speed.',9=>'The password is not changed, as the old password is entered incorrectly.',10=>'Address not available',11=>'Incorrect address',12=>'Current address',13=>'Change address');
$info[4][2] = array(0=>'Нет подключения к интернету!',1=>'Нет подключения к интернету. Возможные причины разьединения интернета, могут быть отключения модема или источника беспроводной сети, отключения питания источника доступа к интернету или измения прокси адреса.',2=>'OK',3=>'Выберите язык',4=>'Вход заблокирован',5=>'Мы обнаружили странное действие на вашем компьютере и заблокировали ваш IP адрес временно. Советуем вам проверить ваш компьютер на наличие вируса. Приносим свои извинения.',6=>'Вход ограничен',7=>'Браузер не поддерживается',8=>'Упс! Ваш браузер не поддерживается нашей социальной сетью. Мы советуем вам загрузить и установить один из ниже перечисленных браузеров, так как они более распространены в широкой аудиторий и имеет довольно проверенную надежность и скорость.',9=>'Пароль не изменён, так как прежний пароль введён неправильно.',10=>'Адрес занят',11=>'Неправильный адрес',12=>'Текущий Адрес',13=>'Изменить адрес');
$info[4][3] = array(0=>'Sin conexión a Internet!',1=>'Нет подключения к интернету. Возможные причины разьединения интернета, могут быть отключения модема или источника беспроводной сети, отключения питания источника доступа к интернету или измения прокси адреса.',2=>'OK',3=>'Cambiar la lengua',4=>'Iniciar sesión está bloqueada',5=>'Мы обнаружили странное действие на вашем компьютере и заблокировали ваш IP адрес временно. Советуем вам проверить ваш компьютер на наличие вируса. Приносим свои извинения.',6=>'Вход ограничен',7=>'Браузер не поддерживается',8=>'Упс! Ваш браузер не поддерживается нашей социальной сетью. Мы советуем вам загрузить и установить один из ниже перечисленных браузеров, так как они более распространены в широкой аудиторий и имеет довольно проверенную надежность и скорость.',9=>'Пароль не изменён, так как прежний пароль введён неправильно.',10=>'Адрес занят',11=>'Неправильный адрес',12=>'Текущий Адрес',13=>'Изменить адрес');
$info[16] = array(0=>array(0=>0,1=>'Not selected',2=>'Not selected'),1=>array(0=>'-39600',1=>'Midway Island',2=>'(GMT-11:00) Midway Island'),2=>array(0=>'-39600',1=>'Samoa',2=>'(GMT-11:00) Samoa'),3=>array(0=>'-36000',1=>'Hawaii',2=>'(GMT-10:00) Hawaii'),4=>array(0=>'-32400',1=>'Alaska',2=>'(GMT-09:00) Alaska'),5=>array(0=>'-28800',1=>'Pacific Time (US & Canada)',2=>'(GMT-08:00) Pacific Time (US & Canada)'),6=>array(0=>'-28800',1=>'Tijuana',2=>'(GMT-08:00) Tijuana'),7=>array(0=>'-25200',1=>'Mountain Time (US & Canada)',2=>'(GMT-07:00) Mountain Time (US & Canada)'),8=>array(0=>'-25200',1=>'Arizona',2=>'(GMT-07:00) Arizona'),9=>array(0=>'-25200',1=>'Chihuahua',2=>'(GMT-07:00) Chihuahua'),10=>array(0=>'-25200',1=>'Mazatlan',2=>'(GMT-07:00) Mazatlan'),11=>array(0=>'-21600',1=>'Central Time (US & Canada)',2=>'(GMT-06:00) Central Time (US & Canada)'),12=>array(0=>'-21600',1=>'Saskatchewan',2=>'(GMT-06:00) Saskatchewan'),13=>array(0=>'-21600',1=>'Guadalajara',2=>'(GMT-06:00) Guadalajara'),14=>array(0=>'-21600',1=>'Mexico City',2=>'(GMT-06:00) Mexico City'),15=>array(0=>'-21600',1=>'Monterrey',2=>'(GMT-06:00) Monterrey'),16=>array(0=>'-21600',1=>'Central America',2=>'(GMT-06:00) Central America'),17=>array(0=>'-18000',1=>'Eastern Time (US & Canada)',2=>'(GMT-05:00) Eastern Time (US & Canada)'),18=>array(0=>'-18000',1=>'Indiana (East)',2=>'(GMT-05:00) Indiana (East)'),19=>array(0=>'-18000',1=>'Bogota',2=>'(GMT-05:00) Bogota'),20=>array(0=>'-18000',1=>'Lima',2=>'(GMT-05:00) Lima'),21=>array(0=>'-18000',1=>'Quito',2=>'(GMT-05:00) Quito'),22=>array(0=>'-14400',1=>'Atlantic Time (Canada)',2=>'(GMT-04:00) Atlantic Time (Canada)'),23=>array(0=>'-14400',1=>'Caraca',2=>'(GMT-04:00) Caracas'),24=>array(0=>'-14400',1=>'La Paz',2=>'(GMT-04:00) La Paz'),25=>array(0=>'-14400',1=>'Georgetown',2=>'(GMT-04:00) Georgetown'),26=>array(0=>'-12600',1=>'Newfoundland',2=>'(GMT-03:30) Newfoundland'),27=>array(0=>'-10800',1=>'Santiago',2=>'(GMT-03:00) Santiago'),28=>array(0=>'-10800',1=>'Buenos Aires',2=>'(GMT-03:00) Buenos Aires'),29=>array(0=>'-10800',1=>'Greenland',2=>'(GMT-03:00) Greenland'),30=>array(0=>'-7200',1=>'Brasilia',2=>'(GMT-02:00) Brasilia'),31=>array(0=>'-7200',1=>'Mid-Atlantic',2=>'(GMT-02:00) Mid-Atlantic'),32=>array(0=>'-3600',1=>'Azores',2=>'(GMT-01:00) Azores'),33=>array(0=>'-3600',1=>'Cape Verde Is.',2=>'(GMT-01:00) Cape Verde Is.'),34=>array(0=>'0',1=>'Dublin',2=>'(GMT) Dublin'),35=>array(0=>'0',1=>'Edinburgh',2=>'(GMT) Edinburgh'),36=>array(0=>'0',1=>'Lisbon',2=>'(GMT) Lisbon'),37=>array(0=>'0',1=>'London',2=>'(GMT) London'),38=>array(0=>'0',1=>'Casablanca',2=>'(GMT) Casablanca'),39=>array(0=>'0',1=>'Monrovia',2=>'(GMT) Monrovia'),40=>array(0=>'0',1=>'UTC',2=>'(GMT) UTC'),41=>array(0=>'3600',1=>'Belgrade',2=>'(GMT+01:00) Belgrade'),42=>array(0=>'3600',1=>'Bratislava',2=>'(GMT+01:00) Bratislava'),43=>array(0=>'3600',1=>'Budapest',2=>'(GMT+01:00) Budapest'),44=>array(0=>'3600',1=>'Ljubljana',2=>'(GMT+01:00) Ljubljana'),45=>array(0=>'3600',1=>'Pragu',2=>'(GMT+01:00) Prague'),46=>array(0=>'3600',1=>'Sarajevo',2=>'(GMT+01:00) Sarajevo'),47=>array(0=>'3600',1=>'Skopje',2=>'(GMT+01:00) Skopje'),48=>array(0=>'3600',1=>'Warsaw',2=>'(GMT+01:00) Warsaw'),49=>array(0=>'3600',1=>'Zagreb',2=>'(GMT+01:00) Zagreb'),50=>array(0=>'3600',1=>'Brussels',2=>'(GMT+01:00) Brussels'),51=>array(0=>'3600',1=>'Copenhagen',2=>'(GMT+01:00) Copenhagen'),52=>array(0=>'3600',1=>'Madrid',2=>'(GMT+01:00) Madrid'),53=>array(0=>'3600',1=>'Paris',2=>'(GMT+01:00) Paris'),54=>array(0=>'3600',1=>'Amsterdam',2=>'(GMT+01:00) Amsterdam'),55=>array(0=>'3600',1=>'Berlin',2=>'(GMT+01:00) Berlin'),56=>array(0=>'3600',1=>'Bern',2=>'(GMT+01:00) Bern'),57=>array(0=>'3600',1=>'Rome',2=>'(GMT+01:00) Rome'),58=>array(0=>'3600',1=>'Stockholm',2=>'(GMT+01:00) Stockholm'),59=>array(0=>'3600',1=>'Vienna',2=>'(GMT+01:00) Vienna'),60=>array(0=>'3600',1=>'West Central Africa',2=>'(GMT+01:00) West Central Africa'),61=>array(0=>'7200',1=>'Bucharest',2=>'(GMT+02:00) Bucharest'),62=>array(0=>'7200',1=>'Cairo',2=>'(GMT+02:00) Cairo'),63=>array(0=>'7200',1=>'Helsinki',2=>'(GMT+02:00) Helsinki'),64=>array(0=>'7200',1=>'Kiev',2=>'(GMT+02:00) Kiev'),65=>array(0=>'7200',1=>'Kyiv',2=>'(GMT+02:00) Kyiv'),66=>array(0=>'7200',1=>'Riga',2=>'(GMT+02:00) Riga'),67=>array(0=>'7200',1=>'Sofia',2=>'(GMT+02:00) Sofia'),68=>array(0=>'7200',1=>'Tallinn',2=>'(GMT+02:00) Tallinn'),69=>array(0=>'7200',1=>'Vilnius',2=>'(GMT+02:00) Vilnius'),70=>array(0=>'7200',1=>'Athens',2=>'(GMT+02:00) Athens'),71=>array(0=>'7200',1=>'Jerusalem',2=>'(GMT+02:00) Jerusalem'),72=>array(0=>'7200',1=>'Harare',2=>'(GMT+02:00) Harare'),73=>array(0=>'7200',1=>'Pretoria',2=>'(GMT+02:00) Pretoria'),74=>array(0=>'10800',1=>'Istanbul',2=>'(GMT+03:00) Istanbul'),75=>array(0=>'10800',1=>'Minsk',2=>'(GMT+03:00) Minsk'),75=>array(0=>'10800',1=>'Moscow',2=>'(GMT+03:00) Moscow'),76=>array(0=>'10800',1=>'St. Petersburg',2=>'(GMT+03:00) St. Petersburg'),77=>array(0=>'10800',1=>'Volgograd',2=>'(GMT+03:00) Volgograd'),78=>array(0=>'10800',1=>'Kuwait',2=>'(GMT+03:00) Kuwait'),79=>array(0=>'10800',1=>'Riyadh',2=>'(GMT+03:00) Riyadh'),80=>array(0=>'10800',1=>'Nairobi',2=>'(GMT+03:00) Nairobi'),81=>array(0=>'10800',1=>'Baghdad',2=>'(GMT+03:00) Baghdad'),82=>array(0=>'10800',1=>'Tehran',2=>'(GMT+03:30) Tehran'),83=>array(0=>'14400',1=>'Abu Dhabi',2=>'(GMT+04:00) Abu Dhabi'),83=>array(0=>'14400',1=>'Muscat',2=>'(GMT+04:00) Muscat'),84=>array(0=>'14400',1=>'Baku',2=>'(GMT+04:00) Baku'),85=>array(0=>'14400',1=>'Tbilisi',2=>'(GMT+04:00) Tbilisi'),86=>array(0=>'14400',1=>'Yerevan',2=>'(GMT+04:00) Yerevan'),87=>array(0=>'16200',1=>'Kabul',2=>'(GMT+04:30) Kabul'),88=>array(0=>'18000',1=>'Ekaterinburg',2=>'(GMT+05:00) Ekaterinburg'),89=>array(0=>'18000',1=>'Islamabad',2=>'(GMT+05:00) Islamabad'),90=>array(0=>'18000',1=>'Karachi',2=>'(GMT+05:00) Karachi'),91=>array(0=>'18000',1=>'Tashkent',2=>'(GMT+05:00) Tashkent'),92=>array(0=>'19800',1=>'Chennai',2=>'(GMT+05:30) Chennai'),93=>array(0=>'19800',1=>'Kolkata',2=>'(GMT+05:30) Kolkata'),94=>array(0=>'19800',1=>'Mumbai',2=>'(GMT+05:30) Mumbai'),95=>array(0=>'19800',1=>'New Delhi',2=>'(GMT+05:30) New Delhi'),96=>array(0=>'19800',1=>'Sri Jayawardenepura',2=>'(GMT+05:30) Sri Jayawardenepura'),97=>array(0=>'20700',1=>'Kathmandu',2=>'(GMT+05:45) Kathmandu'),98=>array(0=>'21600',1=>'Astana',2=>'(GMT+06:00) Astana'),99=>array(0=>'21600',1=>'Dhaka',2=>'(GMT+06:00) Dhaka'),100=>array(0=>'21600',1=>'Almaty',2=>'(GMT+06:00) Almaty'),101=>array(0=>'21600',1=>'Urumqi',2=>'(GMT+06:00) Urumqi'),102=>array(0=>'23400',1=>'Rangoon',2=>'(GMT+06:30) Rangoon'),103=>array(0=>'25200',1=>'Novosibirsk',2=>'(GMT+07:00) Novosibirsk'),104=>array(0=>'25200',1=>'Bangkok',2=>'(GMT+07:00) Bangkok'),105=>array(0=>'25200',1=>'Hanoi',2=>'(GMT+07:00) Hanoi'),106=>array(0=>'25200',1=>'Jakarta',2=>'(GMT+07:00) Jakarta'),107=>array(0=>'25200',1=>'Krasnoyarsk',2=>'(GMT+07:00) Krasnoyarsk'),108=>array(0=>'28800',1=>'Beijing',2=>'(GMT+08:00) Beijing'),109=>array(0=>'28800',1=>'Chongqing',2=>'(GMT+08:00) Chongqing'),110=>array(0=>'28800',1=>'Hong Kong',2=>'(GMT+08:00) Hong Kong'),111=>array(0=>'28800',1=>'Kuala Lumpur',2=>'(GMT+08:00) Kuala Lumpur'),112=>array(0=>'28800',1=>'Singapore',2=>'(GMT+08:00) Singapore'),113=>array(0=>'28800',1=>'Taipei',2=>'(GMT+08:00) Taipei'),114=>array(0=>'28800',1=>'Perth',2=>'(GMT+08:00) Perth'),115=>array(0=>'28800',1=>'Irkutsk',2=>'(GMT+08:00) Irkutsk'),116=>array(0=>'28800',1=>'Ulaan Bataar',2=>'(GMT+08:00) Ulaan Bataar'),117=>array(0=>'32400',1=>'Seoul',2=>'(GMT+09:00) Seoul'),118=>array(0=>'32400',1=>'Osaka',2=>'(GMT+09:00) Osaka'),119=>array(0=>'32400',1=>'Sapporo',2=>'(GMT+09:00) Sapporo'),120=>array(0=>'32400',1=>'Tokyo',2=>'(GMT+09:00) Tokyo'),121=>array(0=>'32400',1=>'Yakutsk',2=>'(GMT+09:00) Yakutsk'),122=>array(0=>'32400',1=>'Darwin',2=>'(GMT+09:30) Darwin'),123=>array(0=>'36000',1=>'Brisbane',2=>'(GMT+10:00) Brisbane'),124=>array(0=>'36000',1=>'Vladivostok',2=>'(GMT+10:00) Vladivostok'),125=>array(0=>'36000',1=>'Guam',2=>'(GMT+10:00) Guam'),126=>array(0=>'36000',1=>'Port Moresby',2=>'(GMT+10:00) Port Moresby'),127=>array(0=>'36000',1=>'Solomon Is.',2=>'(GMT+10:00) Solomon Is.'),127=>array(0=>'37800',1=>'Adelaide',2=>'(GMT+10:30) Adelaide'),128=>array(0=>'39600',1=>'Canberra',2=>'(GMT+11:00) Canberra'),129=>array(0=>'39600',1=>'Melbourne',2=>'(GMT+11:00) Melbourne'),130=>array(0=>'39600',1=>'Sydney',2=>'(GMT+11:00) Sydney'),131=>array(0=>'39600',1=>'Hobart',2=>'(GMT+11:00) Hobart'),132=>array(0=>'39600',1=>'Magadan',2=>'(GMT+11:00) Magadan'),133=>array(0=>'39600',1=>'New Caledonia',2=>'(GMT+11:00) New Caledonia'),134=>array(0=>'43200',1=>'Kamchatka',2=>'(GMT+12:00) Kamchatka'),135=>array(0=>'43200',1=>'Marshall Is.',2=>'(GMT+12:00) Marshall Is.'),136=>array(0=>'46800',1=>'Fiji',2=>'(GMT+13:00) Fiji'),137=>array(0=>'46800',1=>'Auckland',2=>'(GMT+13:00) Auckland'),138=>array(0=>'46800',1=>'Wellington',2=>'(GMT+13:00) Wellington'),139=>array(0=>'50400',1=>'Nuku\'alofa',2=>'(GMT+14:00) Nuku\'alofa'),140=>array(0=>'-39600',1=>'International Date Line West',2=>'(GMT-11:00) International Date Line West'));
$info[17] = array(0=>array(0=>'Grape',1=>'rgb(46,66,83)'),1=>array(0=>'Sky',1=>'#3386a8'),2=>array(0=>'Blood',1=>'#900808'),3=>array(0=>'Rose',1=>'rgb(190, 44, 70)'),4=>array(0=>'Leaf',1=>'#0e520e'),5=>array(0=>'Orange',1=>'#cc7f21'),6=>array(0=>'Sand',1=>'#585540'));
function langScript() {
	$a = '<script>var lg = {';
	$b = 1;
	foreach ($GLOBALS['info'][4][$GLOBALS['info'][1]['lang']] as $k=>$v) {
		$a .= '\'p'.$b.'\': \''.$v.'\',';
		$b++;
	}
	$a .= '};</script>';
	return $a;
}
?>