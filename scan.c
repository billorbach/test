#include<stdio.h>
#include<sys/socket.h>
#include<sys/types.h>
#include<stdlib.h>
#include<netdb.h>
int main(int argc,char **argv)
{
    int i,err,net;
    struct hostent *host;
    struct sockaddr_in sa;
    if(argc!=2)
    {
        printf("Error...Usage :%s ip-address",argv[0]);
        exit(0);
    }
    for(i=1;i<20000;i++)
    {
        sa.sin_family=AF_INET;
        sa.sin_port=htons(i);
        sa.sin_addr.s_addr=inet_addr(argv[1]);
        net=socket(AF_INET,SOCK_STREAM,0);
        err=connect(net,(struct sockaddr_in *)&sa,sizeof(sa));
        if(err>=0)
        {
            printf("\n%d is open",i);
        }
	else
        {
            printf(".");
        }
    }
    printf("\n");
 }
