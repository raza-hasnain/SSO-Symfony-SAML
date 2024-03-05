@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../simplesamlphp/simplesamlphp-test-framework/bin/check-syntax-yaml.sh
bash "%BIN_TARGET%" %*
