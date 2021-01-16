# houseminder

Recovery of some files that were on an old Pi. Caveat, undoubtedly terrible in every way.

This was used when I had an empty rental property that I was periodically staying in.

* Controlled a number of relays for lights.
* One relay for the fridge so if I was coming I could turn the fridge/freezer on pre-emptively.
* A small strip of WS2811 LED's near the window that could emulate TV.
* DB logging states as there was no good way I knew at the time to query state, so everything updated state and logged it to DB.

## Requirements

* php / httpd
* gpio (wiringPi)
* no desire for things to be done well
