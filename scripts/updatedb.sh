#!/bin/bash
mysql -uUSERNAME -pPASSWORD DATABASE -Bse "INSERT INTO PowerStates (device_no, action_taken, triggered_by) VALUES('9', '0', '0');"
