#include <stdio.h>
#include <stdlib.h>
#include <string.h>


typedef struct
{
	void *previous;
	char *date;
	char *time;
	char *message;
	char *ip;
	char *action;
	void *next;
}linked_entry;

linked_entry *first = NULL;
linked_entry *last = NULL;
linked_entry *current = NULL;

int total_connections = 0;
int total_problems = 0;


linked_entry *create_linked_entry()
{
	linked_entry *le = ( linked_entry *)malloc( sizeof( linked_entry ) );
	le->previous = ( linked_entry *) malloc( sizeof( linked_entry * ) );
	le->date = ( char *) malloc( 20 );
	le->time = ( char *) malloc( 20 );
	le->message = ( char *) malloc( 100 );
	le->ip = ( char *) malloc( 15 );
	le->action = ( char *) malloc( 50 );
	le->next = ( linked_entry *) malloc( sizeof( linked_entry * ) );
	return( le );
}

void set_up_linked_entry( char *buffer )
{
	linked_entry *le = create_linked_entry();
	if( current == NULL )
	{
		le->previous = NULL;
		le->next = NULL;
		current = le;
		first = le;
	}
	else
	{
		le->previous = current;
		current->next = le;
		current = le;
		last = le;
	}

	char *delim=" \t";
	char *result = NULL;
	result = strtok( buffer, delim );
	strcpy( le->date, result );
	//printf( "%s\n", le->date );
	result = strtok( NULL, delim );
	strcpy( le->time, result );
	//printf( "%s\n", le->time );
	result = strtok( NULL, delim );
	result = strtok( NULL, delim );
	strcpy( le->message, result );
	//printf( "%s\n", le->message );
	result = strtok( NULL, delim );
	result = strtok( NULL, delim );
	strcpy( le->ip, result );
	//printf( "%s\n", le->ip );
	result = strtok( NULL, delim );
	strcpy( le->action, result );
	//printf( "%s\n", le->action );


} 

void print_linked_list()
{
	int n = 0;
	current = first;
	while( current != last )
	{
		printf( "%d: %s %s %s %s %s\n", n++, current->date, current->time, current->message, current->ip, current->action );
		current = current->next;
	}
}


void get_connection_data( char *file )
{
char buffer[ 1000 ];
FILE *fp = fopen( file, "r" );
total_connections = 0;

	if( !fp )
	{
		printf( "Cannot open %s. Exiting\n", file );
		exit( -1 );
	}
	while( !feof( fp ) )
	{
		fgets( buffer, 1000, fp );
		if( !strncmp( &buffer[ 28 ], "connection", 10 ) )
		{
			//printf( "%s\n", buffer );
			set_up_linked_entry( buffer );
			//printf( "Count is %d\n", total_connections );
			total_connections++;
		}
	}
	fclose( fp );
	printf( "Number of lines printed is %d\n", total_connections );
}

void analyze_linked_list()
{
	int n = 0;
	int old_n = 0;
	int number_of_consecutive_logoffs = 0;
	current = first;
	linked_entry *prev = NULL;
        int first = 0;
	int next = 0;
	total_problems = 0;
	
	while( current != last )
	{
		if( !strcmp( current->action, "logoff" ) && current->previous )
		{
			prev = current->previous;
			if( !( strcmp( current->ip, prev->ip ) ) )
			{
				first = atoi( &prev->time[ 3 ] );
				next = atoi( &current->time[ 3 ] );
				if( ( first == next ) || ( ( first + 1 ) == next ) || ( ( first + 2 ) == next ) )
				{
					printf( "Potential problem with entry %d %d=%d %s=%s\n", n, first, next, current->ip, prev->ip );
					total_problems++;
					if( ( old_n + 2 ) == n )
						number_of_consecutive_logoffs++;
					else
						number_of_consecutive_logoffs = 0;
					if( number_of_consecutive_logoffs >= 5 )
						printf( "Number_of_consecutive_logoffs is %d\n", number_of_consecutive_logoffs );
					old_n = n;
				}
			}
		}
		current = current->next;
		n++;
	}

}

int main( int argc, char *argv[] )
{
float percent = 0.0;

	if( argc < 2 )
	{
		printf( "Need the name of a trace file as the first parameter\n" );
		exit( -1 );
	}
	get_connection_data( argv[ 1 ]);
	analyze_linked_list();
	percent = ( float )total_problems/total_connections;
	percent *= 100;
	printf( "Total problems vs total connections is %d over %d or %.2f percent\n", total_problems, total_connections, percent );
}

