<?php

session_start();
unset($_SESSION['iduser']);

$_SESSION['msg'] =" <div class='alert alert-dark'>
                    ADMINISTRADOR desconectado!!
                    </div>";
                    header('Location: ../loginadministrador.php');