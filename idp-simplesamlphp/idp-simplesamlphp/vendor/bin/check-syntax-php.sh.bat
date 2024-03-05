@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../simplesamlphp/simplesamlphp-test-framework/bin/check-syntax-php.sh
bash "%BIN_TARGET%" %*
