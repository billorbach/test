#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main( int argc, char *argv[] )
{
	unsigned long i = 0;
        unsigned long k = 1000000;
        char *p = malloc( 10 );
	if( argc < 2 )
		exit( -1 );
	FILE *fp = fopen( "filler", "w" );
        unsigned long l = strtoul( argv[ 1 ], &p, 10 );
        char *a = malloc( k );
	if( ! a )
		exit( -2 );
	for( i = 0; i < k; i++ )
		a[ i ] = '.';
        printf( "%u\n", l );
        //printf( "%s\n", a );
        l /= k;
        printf( "%ld\n", l );
	for( i = 0; i < l ; i++ )
		fwrite( a, k, 1, fp );
	fclose( fp );
}
