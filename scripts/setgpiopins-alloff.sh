#!/bin/bash

#cycle test to test each one still works

#setup output types
gpio mode 12 out
gpio mode 13 out
gpio mode 10 out
gpio mode 11 out
gpio mode 0 out
gpio mode 7 out
gpio mode 9 out
gpio mode 8 out

TIME=.1

gpio write 12 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('1', '1', '0');"
sleep $TIME
gpio write 13 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('2', '1', '0');"
sleep $TIME
gpio write 10 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('3', '1', '0');"
sleep $TIME
gpio write 11 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('4', '1', '0');"
sleep $TIME
gpio write 0 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('5', '1', '0');"
sleep $TIME
gpio write 7 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('6', '1', '0');"
sleep $TIME
gpio write 9 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('7', '1', '0');"
sleep $TIME
gpio write 8 1
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('8', '1', '0');"
