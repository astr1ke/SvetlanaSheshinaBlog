@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../voyager/installer/voyager
php "%BIN_TARGET%" %*
