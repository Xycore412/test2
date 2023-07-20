<?php

if($data['poste'] === 'embarquement')
                              {

                                session_start();
                                $_SESSION['user'] = $data['identifiant'];
                                header('Location: em/index.php');
                                die();

                              }else {

                              			if($data['poste'] === 'pes')
			                              {

			                                session_start();
			                                $_SESSION['user'] = $data['identifiant'];
			                                header('Location: pes/mypage/index.php');
			                                die();
			                            }else header('Location: index.php?Erreur_de_compte_!');

									}