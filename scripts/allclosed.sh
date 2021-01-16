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

TIME=.3

gpio write 12 1
sleep $TIME
gpio write 13 1
sleep $TIME
gpio write 10 1
sleep $TIME
gpio write 11 1
sleep $TIME
gpio write 0 1
sleep $TIME
gpio write 7 1
sleep $TIME
gpio write 9 1
sleep $TIME
gpio write 8 1
sleep $TIME
