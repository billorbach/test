#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <netdb.h>
#include <unistd.h>
#include <errno.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include<ctype.h>

#define PORT 35500   

char myHost[ 20 ];
int cr = 0;

void readConfigFile()
{
FILE *fp = NULL;
char buffer[ 1024 ];

	fp = fopen( "send.dat", "r" );
	if( !fp )
	{
		printf( "\nunable to open configuration file\n" );
		return;
	}
	memset( myHost, 0x00, 20 );
	fgets( myHost, 20, fp );
        myHost[ strlen( myHost ) - cr ] = '\0';
	printf( "\n%s\n", myHost );
	fclose( fp );
}


int main( int argc, char **argv )
{
        int sock, bytes_recieved, portno; 
        portno =  PORT;
        char send_data[1024],recv_data[45];
        int bytes_received = 0;
        struct hostent *host;
        struct sockaddr_in client;  

	readConfigFile();
	if( ( strlen( myHost ) > 1 ) )
	{
        	host = gethostbyname( myHost );
		printf( "\nHostname is %s\n", myHost );
	}
	else
	{
        	host = gethostbyname("localhost");
		printf( "\nHostname is localhost\n" );
	}
	char buf[ 100 ];


 
        client.sin_family = AF_INET;     
        client.sin_port = htons(portno);   
        client.sin_addr = *((struct in_addr *)host->h_addr);
        //client.sin_addr = INADDR_ANY;
        bzero(&(client.sin_zero),8); 
        int opt = 1;
        
	int sock_error = 0;
	int connect_error = 0;
	int send_error = 0;
	int iteration = 0;
        //while( 1 )
	{
		if ((sock = socket(AF_INET, SOCK_STREAM, 0)) == -1) 
		{
			sock_error++;
			printf( "\n%s: %d", argv[ 0 ], sock_error );
            		perror( "Client Socket" );
        	}
		printf( "\nGot socket\n" );
			
	 	if (connect(sock, (struct sockaddr *)&client,
        	            sizeof(struct sockaddr)) == -1) 
        	{
			connect_error++;
			printf( "\n%s: %d", argv[ 0 ], connect_error );
            		perror( "Client Connect" );
			close( sock );
        	}
		printf( "\nGot connection\n" );
        	memset(send_data,0,1024);
		sprintf( send_data, "reset" );
		int result = 0;
        	if( (send(sock,send_data,strlen(send_data), 0)) == -1 )
		{
			send_error++;
			printf( "\n%s: %d", argv[ 0 ], send_error );
            		perror( "Client Send" );
			close( sock );
		}
		printf( "\nsent data %s \n", send_data );
       		memset(recv_data,0,45);
               	bytes_received = recv(sock,recv_data,45,0); 
               	recv_data[bytes_received] = '\0';

               	close(sock);
		printf( "\nclosing socket\n" );
	}

	printf( "\nexiting send program\n" );
        return 0;
}
