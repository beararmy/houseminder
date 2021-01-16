#include <wiringPi.h>
#include <stdio.h>
#include <stdlib.h>
#include <stdint.h>
#define MAXTIMINGS	85
#define DHTPIN		1
int dht11_dat[5] = { 0, 0, 0, 0, 0 };
int x;
int z; 

void read_dht11_dat()
{
	uint8_t laststate	= HIGH;
	uint8_t counter		= 0;
	uint8_t j		= 0, i;
	float	f; 
//int x; 
//int y;
	dht11_dat[0] = dht11_dat[1] = dht11_dat[2] = dht11_dat[3] = dht11_dat[4] = 0;
 
	pinMode( DHTPIN, OUTPUT );
	digitalWrite( DHTPIN, LOW );
	delay( 18 );
	digitalWrite( DHTPIN, HIGH );
	delayMicroseconds( 40 );
	pinMode( DHTPIN, INPUT );
 
	for ( i = 0; i < MAXTIMINGS; i++ )
	{
		counter = 0;
		while ( digitalRead( DHTPIN ) == laststate )
		{
			counter++;
			delayMicroseconds( 1 );
			if ( counter == 255 )
			{
				break;
			}
		}
		laststate = digitalRead( DHTPIN );
 
		if ( counter == 255 )
			break;
 
		if ( (i >= 4) && (i % 2 == 0) )
		{
			dht11_dat[j / 8] <<= 1;
			if ( counter > 16 )
				dht11_dat[j / 8] |= 1;
			j++;
		}
	}
 
	if ( (j >= 40) &&
             (dht11_dat[4] == ( (dht11_dat[0] + dht11_dat[1] + dht11_dat[2] + dht11_dat[3]) & 0xFF) ) )







//{ if ( x < 1 )
//
//y = y + dht11_dat[2];
//
//    printf(" --- %y ---   ", dht11_dat[2] );
//x++;
//}








{
x++;
printf( "H:%d T:%d\n", dht11_dat[0], dht11_dat[2]);
}


//{
//		printf( "H:%d T:%d\n",
//			dht11_dat[0], dht11_dat[2]);
//	}
	
}
 
int main( void )
{
	if ( wiringPiSetup() == -1 )
		exit( 1 );
 
	while ( x < 5 )
	{
		read_dht11_dat();
		delay( 1000 ); 
	}
 
	return(0);
}
