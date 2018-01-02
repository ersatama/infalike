
					
					
					if ($c[2][1][1]==$_SESSION['id']) {
					//$info[2][48] = ['_audio_playlist','id','own','name','dt','ss','tt'];//audio playlist
					//$info[2][49] = ['_audio_playlist_add','id','plst','own','ss','ct'];//audio playlist add
					$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")];
					$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
					for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) {
						$c[3][3] = $GLOBALS['DB']->f($c[3][0]);
						$c[2][0] .= plist([$c[3][3],0,alertBox::pLC([$c[3][3][0],$c[3][3][1]])]);
					}
					$c[2][0] = $c[2][0]!=''?'<div class="__19b0">'.$c[2][0].'</div>':'';
					$c[3][4] = plistC($c[2][1][1]);
					$c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__21a __24m"><div class="__24n"></div><div class="__24o"></div></div><div class="__22o">Объединяйте аудиозаписи в плейлисты по жанрам или по настроению. <span class="__22o0" onclick="return go.audio.newPList()">добавить плейлист</span>.</div>','<div class="__24b"><div class="__24l"><div class="__24la">Music playlist</div><div class="__24lb">'.$c[3][4].' плейлист'.($c[3][4]>1?'а':'').'</div></div> <div class="__24k" onclick="return go.audio.newPList()"></div></div>'],1),'Мой плейлисты',auHead([1,$c[2][1][1]])];
					} else {
					$c[3] = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][3]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$c[2][1][1]."' LIMIT 1")];
					if ($GLOBALS['DB']->n($c[3][0])!=0) {
						$c[3][1] = $GLOBALS['DB']->f($c[3][0])[0];
						$d[1] = uname([$c[2][1][1],0]);
						if ($c[3][1]==0||$c[3][1]==1) {
							$c[4] = [0];
							$c[3][1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][12][4]."` FROM `".$GLOBALS['info'][2][12][0]."` WHERE `".$GLOBALS['info'][2][12][1]."`='".$c[2][1][1]."' LIMIT 1");
							if ($GLOBALS['DB']->n($c[3][1])!=0) $c[4][0] = $GLOBALS['DB']->f($c[3][1])[0];
							if ($c[4][0]==0) {
								$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][1]."`='".$c[2][1][1]."' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")];
								$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
								for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) {
										$c[3][3] = $GLOBALS['DB']->f($c[3][0]);
										$c[2][0] .= $c[3][2];
								}
								$c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__21a"></div><div class="__22o">У '.$d[1].' нет плейлиста</div>'],1),'Плейлисты '.$d[1],auHead([1,$c[2][1][1]])];
							} elseif ($c[4][0]==1) {
								$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$c[2][1][1]."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10")];
								$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
								if ($c[3][1]!=0) {
									$c[3][2] = '';
									for ($c[3][3]=0;$c[3][3]<$c[3][1];$c[3][3]++) if ($c[3][3]==0) $c[3][2] = $GLOBALS['DB']->f($c[3][0])[0]; else $c[3][2] .= ','.$GLOBALS['DB']->f($c[3][0])[0];
									$c[3][4] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][53][1]."`) FROM `".$GLOBALS['info'][2][53][0]."` WHERE `".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][53][6]."`='0' AND `".$GLOBALS['info'][2][53][2]."` IN (".$c[3][2].") LIMIT 1");
									if ($c[3][4]!=0) {
										$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][1]."`='".$c[2][1][1]."' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")];
										$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
											for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) {
												$c[3][3] = $GLOBALS['DB']->f($c[3][0]);
												$c[2][0] .= $c[3][2];
											}
											$c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__21a"></div><div class="__22o">У '.$d[1].' нет плейлиста</div>'],1),'Плейлисты '.$d[1],auHead([1,$c[2][1][1]])];
									} else {
										$c[3][0] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10");
										$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
										if ($c[3][1]!=0) {
											$c[3][4] = '';
											for ($c[3][3]=0;$c[3][3]<$c[3][1];$c[3][3]++) if ($c[3][3]==0) $c[3][4] = $GLOBALS['DB']->f($c[3][0])[0]; else $c[3][4] .= ','.$GLOBALS['DB']->f($c[3][0])[0];
											$c[3][4] = $GLOBALS['DB']->c("SELECT COUNT(`a`.`".$GLOBALS['info'][2][53][3]."`) FROM `".$GLOBALS['info'][2][53][0]."` AS `a` INNER JOIN `".$GLOBALS['info'][2][53][0]."` as `b` ON `a`.`".$GLOBALS['info'][2][53][3]."`=`b`.`".$GLOBALS['info'][2][53][3]."` WHERE `a`.`".$GLOBALS['info'][2][53][2]."` IN(".$c[3][2].") AND `b`.`".$GLOBALS['info'][2][53][2]."` IN(".$c[3][4].") LIMIT 1");
											if ($c[3][4]!=0) {
												$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][1]."`='".$c[2][1][1]."' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")];
												$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
												for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) {
													$c[3][3] = $GLOBALS['DB']->f($c[3][0]);
													$c[2][0] .= $c[3][2];
												}
												$c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__21a"></div><div class="__22o">У '.$d[1].' нет плейлиста</div>'],1),'Плейлисты '.$d[1],auHead([1,$c[2][1][1]])];
											} else $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' ограничил доступ к плейлисту',auHead([1,$c[2][1][1]])];
										} else $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' ограничил доступ к плейлисту',auHead([1,$c[2][1][1]])];
									}
								} else $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' ограничил доступ к плейлисту',auHead([1,$c[2][1][1]])];
							} elseif ($c[4][0]==2) {
								$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$c[2][1][1]."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10")];
								$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
								if ($c[3][1]!=0) {
									$c[3][2] = '';
									for ($c[3][3]=0;$c[3][3]<$c[3][1];$c[3][3]++) if ($c[3][3]==0) $c[3][2] = $GLOBALS['DB']->f($c[3][0])[0]; else $c[3][2] .= ','.$GLOBALS['DB']->f($c[3][0])[0];
									$c[3][2] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][53][1]."`) FROM `".$GLOBALS['info'][2][53][0]."` WHERE `".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][53][6]."`='0' AND `".$GLOBALS['info'][2][53][2]."` IN (".$c[3][2].") LIMIT 1");
									if ($c[3][2]!=0) {
										$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][1]."`='".$c[2][1][1]."' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")];
										$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
											for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) {
												$c[3][3] = $GLOBALS['DB']->f($c[3][0]);
												$c[2][0] .= $c[3][2];
											}
											$c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__21a"></div><div class="__22o">У '.$d[1].' нет плейлиста</div>'],1),'Плейлисты '.$d[1],auHead([1,$c[2][1][1]])];
									} else $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$c[2][1][1].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' ограничил доступ к плейлисту',auHead([1,$c[2][1][1]])];
								} else $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' ограничил доступ к плейлисту',auHead([1,$c[2][1][1]])];
							} elseif ($c[4][0]==3) $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' ограничил доступ к плейлисту',auHead([1,$c[2][1][1]])];
						} else if ($c[3][1]==2) $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Пользователь заблокирован администрацией</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),$d[1].' заблокирован',auHead([1,$c[2][1][1]])]; else if ($c[3][1]==3) $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Страница удалена</div><a href="/audios'.$c[2][1][1].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),'Страница удалена',auHead([1,$c[2][1][1]])];
					} else $c[2] = [auBody([[1,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Страница не найдена</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>'],1),'Страница не найдена',auHead([1,$c[2][1][1]])];
					}
					
					
					
					
					
					/*
if ($c[2][1][1]==$_SESSION['id']) {
					$c[3] = [music([$_SESSION['id'],0])];
					$c[3][1] = sizeof($c[3][0]);
					for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) $c[2][0] .= aucon([$c[3][0][$c[3][2]],0,[0,$_SESSION['id']]]);
					//audio data
					$c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__22n"></div><div class="__22o">You haven\'t added any music</div>']),'Мой аудиозаписи',auHead([0,$c[2][1][1]])];
				} else {
					$c[3] = [$GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][2][3]."` FROM `".$GLOBALS['info'][2][2][0]."` WHERE `".$GLOBALS['info'][2][2][1]."`='".$c[2][1][1]."' LIMIT 1")];
					if ($GLOBALS['DB']->n($c[3][0])!=0) {
						$c[3][1] = $GLOBALS['DB']->f($c[3][0])[0];
						$d[1] = uname([$c[2][1][1],0]);
						if ($c[3][1]==0||$c[3][1]==1) {
							$c[4] = [0];
							$c[3][1] = $GLOBALS['DB']->q("SELECT `".$GLOBALS['info'][2][12][4]."` FROM `".$GLOBALS['info'][2][12][0]."` WHERE `".$GLOBALS['info'][2][12][1]."`='".$c[2][1][1]."' LIMIT 1");
							if ($GLOBALS['DB']->n($c[3][1])!=0) $c[4][0] = $GLOBALS['DB']->f($c[3][1])[0];
							if ($c[4][0]==0) {
								$c[3] = [music([$c[2][1][1],0])];
								$c[3][1] = sizeof($c[3][0]);
								for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) $c[2][0] .= aucon([$c[3][0][$c[3][2]],0,[0,$c[2][1][1]]]);
								$c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__22n"></div><div class="__22o">You haven\'t added any music</div>']),$d[1].' аудиозаписи',auHead([0,$c[2][1][1]])];
							} elseif ($c[4][0]==1) {
								$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$c[2][1][1]."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10")];
								$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
								if ($c[3][1]!=0) {
									$c[3][2] = '';
									for ($c[3][3]=0;$c[3][3]<$c[3][1];$c[3][3]++) if ($c[3][3]==0) $c[3][2] = $GLOBALS['DB']->f($c[3][0])[0]; else $c[3][2] .= ','.$GLOBALS['DB']->f($c[3][0])[0];
									$c[3][4] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][53][1]."`) FROM `".$GLOBALS['info'][2][53][0]."` WHERE `".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][53][6]."`='0' AND `".$GLOBALS['info'][2][53][2]."` IN (".$c[3][2].") LIMIT 1");
									if ($c[3][4]!=0) {
										$c[3] = [music([$c[2][1][1],0])];
										$c[3][1] = sizeof($c[3][0]);
										for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) $c[2][0] .= aucon([$c[3][0][$c[3][2]],0,[0,$c[2][1][1]]]);
										$c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__22n"></div><div class="__22o">'.$d[1].' hasn\'t added any music</div>']),$d[1].' аудиозаписи',auHead([0,$c[2][1][1]])];
									} else {
										$c[3][0] = $GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10");
										$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
										if ($c[3][1]!=0) {
											$c[3][4] = '';
											for ($c[3][3]=0;$c[3][3]<$c[3][1];$c[3][3]++) if ($c[3][3]==0) $c[3][4] = $GLOBALS['DB']->f($c[3][0])[0]; else $c[3][4] .= ','.$GLOBALS['DB']->f($c[3][0])[0];
											$c[3][4] = $GLOBALS['DB']->c("SELECT COUNT(`a`.`".$GLOBALS['info'][2][53][3]."`) FROM `".$GLOBALS['info'][2][53][0]."` AS `a` INNER JOIN `".$GLOBALS['info'][2][53][0]."` as `b` ON `a`.`".$GLOBALS['info'][2][53][3]."`=`b`.`".$GLOBALS['info'][2][53][3]."` WHERE `a`.`".$GLOBALS['info'][2][53][2]."` IN(".$c[3][2].") AND `b`.`".$GLOBALS['info'][2][53][2]."` IN(".$c[3][4].") LIMIT 1");
											if ($c[3][4]!=0) {
												$c[3] = [music([$c[2][1][1],0])];
												$c[3][1] = sizeof($c[3][0]);
												for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) $c[2][0] .= aucon([$c[3][0][$c[3][2]],0,[0,$c[2][1][1]]]);
												$c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__22n"></div><div class="__22o">You haven\'t added any music</div>']),$d[1].' аудиозаписи',auHead([0,$c[2][1][1]])];
											} else $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' ограничил доступ к плейлисту',auHead([0,$c[2][1][1]])];
										} else $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' ограничил доступ к плейлисту',auHead([0,$c[2][1][1]])];
									}
								} else $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' ограничил доступ к плейлисту',auHead([0,$c[2][1][1]])];
							} elseif ($c[4][0]==2) {
								$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][53][2]."` FROM `".$GLOBALS['info'][2][53][0]."` AS `a`,`".$GLOBALS['info'][2][52][0]."` AS `b` WHERE `b`.`".$GLOBALS['info'][2][52][6]."`='0' AND `b`.`".$GLOBALS['info'][2][52][1]."`=`a`.`".$GLOBALS['info'][2][53][2]."` AND `a`.`".$GLOBALS['info'][2][53][3]."`='".$c[2][1][1]."' AND `a`.`".$GLOBALS['info'][2][53][6]."`='0' LIMIT 10")];
								$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
								if ($c[3][1]!=0) {
									$c[3][2] = '';
									for ($c[3][3]=0;$c[3][3]<$c[3][1];$c[3][3]++) if ($c[3][3]==0) $c[3][2] = $GLOBALS['DB']->f($c[3][0])[0]; else $c[3][2] .= ','.$GLOBALS['DB']->f($c[3][0])[0];
									$c[3][2] = $GLOBALS['DB']->c("SELECT COUNT(`".$GLOBALS['info'][2][53][1]."`) FROM `".$GLOBALS['info'][2][53][0]."` WHERE `".$GLOBALS['info'][2][53][3]."`='".$_SESSION['id']."' AND `".$GLOBALS['info'][2][53][6]."`='0' AND `".$GLOBALS['info'][2][53][2]."` IN (".$c[3][2].") LIMIT 1");
									if ($c[3][2]!=0) {
										$c[3] = [$GLOBALS['DB']->q("SELECT `a`.`".$GLOBALS['info'][2][48][1]."`,`a`.`".$GLOBALS['info'][2][48][2]."`,`a`.`".$GLOBALS['info'][2][48][3]."`,`a`.`".$GLOBALS['info'][2][48][4]."` FROM `".$GLOBALS['info'][2][48][0]."` AS `a`,`".$GLOBALS['info'][2][49][0]."` AS `b` WHERE `a`.`".$GLOBALS['info'][2][48][1]."`=`b`.`".$GLOBALS['info'][2][49][2]."` AND `a`.`".$GLOBALS['info'][2][48][5]."`='0' AND `b`.`".$GLOBALS['info'][2][49][1]."`='".$c[2][1][1]."' AND `b`.`".$GLOBALS['info'][2][49][3]."`='".$_SESSION['id']."' AND `b`.`".$GLOBALS['info'][2][49][4]."`='0' ORDER BY `b`.`".$GLOBALS['info'][2][49][5]."` DESC LIMIT 30")];
										$c[3][1] = $GLOBALS['DB']->n($c[3][0]);
											for ($c[3][2]=0;$c[3][2]<$c[3][1];$c[3][2]++) {
												$c[3][3] = $GLOBALS['DB']->f($c[3][0]);
												$c[2][0] .= $c[3][2];
											}
											$c[2][0] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__21a"></div><div class="__22o">У '.$d[1].' нет плейлиста</div>']),'Плейлисты '.$d[1],auHead([0,$c[2][1][1]])];
									} else $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' ограничил доступ к плейлисту',auHead([0,$c[2][1][1]])];
								} else $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' ограничил доступ к плейлисту',auHead([0,$c[2][1][1]])];
							} elseif ($c[4][0]==3) $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Доступ ограничен</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' ограничил доступ к плейлисту',auHead([0,$c[2][1][1]])];
						} else if ($c[3][1]==2) $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Пользователь заблокирован администрацией</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),$d[1].' заблокирован',auHead([0,$c[2][1][1]])]; else if ($c[3][1]==3) $c[2] = [auBody([[0,$c[2][1][1]],$c[2][0],'<div class="__13r"><div class="__21c">Страница удалена</div><a href="/audios'.$_SESSION['id'].'" class="__21d no-link" onclick="return return go.link(this,event);">вернуться к моим аудиозаписям</a></div>']),'Страница удалена',auHead([0,$c[2][1][1]])];
				}
			}
*/









			
			
		con: function(a,b=0) {
			var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z;
			if (b==0) c = dom.i(dom.s(dom.e("div"),[['class','__19c ui-sortable-handle'],['id','audio'+a.id],["onmouseenter","return go.audio.view(this)"],["onclick",'return go.audio.sel('+JSON.stringify([[a.id,a.nm,a.au,a.dr,a.gr,a.bt,a.cv],a.lt])+')'],["data-id",a.id],["data-t",0]]),'<div class="__20p"><div class="__20s" onmouseover="return go.audio.opView(this,'+dom.es(JSON.stringify([a.id]))+',event)"></div>'+(a.add!=2?(a.add!=0?'<div class="__20n __20n0" onmouseover="return go.audio.help1(this,\'Убрать аудиозапись\',event)" onclick="return go.audio.rem('+dom.es(JSON.stringify([a.id]))+',go.stop(event))"></div>':'<div class="__20n __20n1" onmouseover="return go.audio.help1(this,\'Добавить аудиозапись\',event)" onclick="return go.audio.add('+dom.es(JSON.stringify([a.id]))+',go.stop(event))"></div>'):'<div class="__20n" onmouseover="return go.audio.help1(this,\'Удалить аудиозапись\',event)" onclick="return go.audio.del('+dom.es(JSON.stringify([a.id]))+')"></div><div class="__20o" onmouseover="return go.audio.help1(this,\'Редактировать\',event)" onclick="return go.audio.edit('+dom.es(JSON.stringify([a.id]))+',go.stop(event))"></div>')+'</div><div class="__20q">'+a.dr+'</div><div class="__19d" style="background-image: url('+a.cv+');">'+(a.bt!=1?'<div class="__20j"></div>':'')+'<div class="__20u '+(go.audio.au.id==a.id?(go.audio.ob.ps==0?'__20u1':'__20u0'):'')+'"><div class="'+(go.audio.au.id==a.id?(go.audio.ob.ps==0?'__20v':'__20v0'):'__20v')+'"></div></div></div><div class="__19e"><div '+(a.txt==''?'class="__19f"':'class="__19f __19f0" onclick="return go.audio.txt(this,'+dom.es(JSON.stringify([a.id]))+',go.stop(event));"')+'>'+a.nm+'</div><div class="__19g" onclick="return go.audio.authorS(this,'+dom.es(JSON.stringify([a.id,a.au]))+')">'+a.au+'</div></div><div class="__19f1"><div class="__19f2"></div></div>');
			if (go.audio.au.id==a.id) {
				if (b==0) {
					$(c).addClass("__19c0").attr({'data-play':''});
				} else {
					
				}
			}
			return c;
		},