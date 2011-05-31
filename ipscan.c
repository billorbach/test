#include <string>
#include <sstream>
#include <iostream>
#include <pthread.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <stdio.h>
#include "curl/curl.h"
#include "curl/easy.h"


void ipStrToInt(unsigned int (&ip)[4], std::string);
const std::string get_ip();
const std::string inttostr(const unsigned int);
void *scan(void *ptr);
void GetPrimaryIp(char* buffer, size_t buflen) ;
int curl( char *ip );

unsigned int IP[4] = {0,0,0,0};
unsigned int beginIP[4] = {0,0,0,0};
unsigned int endIP[4] = {0,0,0,0};
unsigned int startPort=0, stopPort=0;
unsigned int thread_cnt = 0, upIPcnt = 0;
bool done = false, first = true;

pthread_mutex_t mutex = PTHREAD_MUTEX_INITIALIZER;
pthread_mutex_t cntMutex = PTHREAD_MUTEX_INITIALIZER;
pthread_mutex_t prtMutex = PTHREAD_MUTEX_INITIALIZER;


int main(void) {
	std::string startIP, stopIP;
	std::string mPorts;
	
	char buf[ 100 ];
        char ip_addr[ 100 ];
	GetPrimaryIp( buf, 100 );
	printf( "Local IP address is %s\n", buf );
        char delims[] = ".";
        char *result = NULL;
        result = strtok( buf, delims );
        strcat( ip_addr, result );
        strcat( ip_addr, "." );

        int i = 0;
        while( i < 2 ) 
        {
       		  //printf( "result is \"%s\"\n", result );
         	  result = strtok( NULL, delims );
		  strcat( ip_addr, result );
		  strcat( ip_addr, "." );
		  i++;
        }
	printf( "Using range of %s\n", ip_addr );
	//exit( 1 );
        /*
	std::cout << "Enter IP Range <start end> ";
	std::cin >> startIP >> stopIP;
	
	while(1) {
		std::cout << "Scan Multiple Ports (Y/N) ";
		std::cin >> mPorts;
		if(mPorts == "Y" || mPorts == "y") {
			std::cout << "Enter port range <start end> ";
			std::cin >> startPort >> stopPort;
			break;
		} else if(mPorts == "N" || mPorts == "n") {
			std::cout << "Setting scan port to default (80)\n";
			startPort = stopPort = 80;
			break;
		} else {
			std::cout << "Bad Input try again";
		}
	}
	*/
        std::string ipAddr = ip_addr;
        std::string z = "0";
	std::string t = "255";
	startIP = ipAddr + z;
	stopIP = ipAddr + t;
	//startPort = stopPort = 80;
	startPort = stopPort = 22;

	// Parse begin IP
	ipStrToInt(beginIP, startIP);
	// Parse end IP
	ipStrToInt(endIP, stopIP);
	
	// Set IP to starting value
	IP[0] = beginIP[0];
	IP[1] = beginIP[1];
	IP[2] = beginIP[2];
	IP[3] = beginIP[3];
	
	const unsigned int max_threads = 100;
	pthread_t thread[100];

	while(thread_cnt < max_threads && !done) 
	{
		pthread_create(&thread[thread_cnt], NULL, &scan, &thread_cnt);
			
		// Lock thread_cnt before incrementing
		pthread_mutex_lock(&cntMutex);
		thread_cnt++;
		pthread_mutex_unlock(&cntMutex);	
	}

	// wait for threads to finish before cleaning up
	for(unsigned int x=0; x < thread_cnt; ++x)
        {
		pthread_join(thread[x], NULL);
	}
	
	std::cout << "Finished\nNumber of Active IPs: " << upIPcnt << std::endl;
	
	pthread_mutex_destroy(&mutex);
	pthread_mutex_destroy(&cntMutex);
	pthread_mutex_destroy(&prtMutex);
	pthread_exit(NULL);
	return 0;	
}

void *scan(void *arg) {
	unsigned int port = startPort;
	std::string curIP = "";
	int sock, cnx;
	struct sockaddr_in host;
	int web = 80;
	
	sock = socket(AF_INET, SOCK_STREAM, 0);
	if(sock < 0) 
	{
		std::cout << "ERROR: Could not open socket\n";
	} 
	else 
	{
		while(1)
		{
			pthread_mutex_lock(&mutex);
				curIP = get_ip(); // get the next ip address
			pthread_mutex_unlock(&mutex);
			
			if(curIP.empty()) 
			{
				done = true;
				break;	
			}
			
			host.sin_family = AF_INET;
			host.sin_addr.s_addr = inet_addr(curIP.c_str());
			
			if(!curIP.empty()) 
			{
				while(port <= stopPort) 
				{
					host.sin_port = htons(port);
					
					cnx = connect(sock, (struct sockaddr*)&host, sizeof(host));
					pthread_mutex_lock(&prtMutex);
					if(cnx < 0) 
					{
						//std::cout << inet_ntoa(host.sin_addr) << " ... connection failed. Host possibly down\n";
					}
					else
					{
						std::cout << inet_ntoa(host.sin_addr) << " ... Host appears to be up at port " << port << ".\n";
						
						pthread_mutex_lock(&cntMutex);
							upIPcnt++;
						pthread_mutex_unlock(&cntMutex);
                                                //char buf[ 50 ];
						//sprintf( buf, "%s", host.sin_addr );
					        //curl( buf );
					}
					pthread_mutex_unlock(&prtMutex);
					//port++;	

					host.sin_port = htons( web );
					
					cnx = connect(sock, (struct sockaddr*)&host, sizeof(host));
					pthread_mutex_lock(&prtMutex);
					if(cnx < 0) 
					{
						//std::cout << inet_ntoa(host.sin_addr) << " ... connection failed. Host possibly down\n";
					}
					else
					{
						std::cout << inet_ntoa(host.sin_addr) << " ... Host appears to be up at port " << web << ".\n";
						
						pthread_mutex_lock(&cntMutex);
							upIPcnt++;
						pthread_mutex_unlock(&cntMutex);
                                                //char buf[ 50 ];
						//sprintf( buf, "%s", host.sin_addr );
					        //curl( buf );
					}
					pthread_mutex_unlock(&prtMutex);
					port++;	

				}
			}
		}
	}
	close(sock);

	// lock thread_cnt before decrementing
	pthread_mutex_lock(&cntMutex);
		thread_cnt--;
	pthread_mutex_unlock(&cntMutex);
	
	pthread_exit((void*)0);
}

void ipStrToInt(unsigned int (&ip)[4], std::string strIP) {
	int found=0, cnt=0;
	std::string temp;
	temp = strIP;
	
	found = temp.find_first_of(".");
	
	while(found != std::string::npos && cnt < 4) {
		if(found > 0) {
			ip[cnt] = (unsigned)atoi(temp.substr(0,found).c_str());
		}
		temp = temp.substr(found+1);
		found = temp.find_first_of(".");
		cnt++;
	}
	if(temp.length() > 0 && cnt < 4) {
		ip[cnt]	= atoi(temp.c_str());
	}
}

// Works
const std::string get_ip() {
	if(!first) {
		if(memcmp(&IP, &endIP, 4*sizeof(int)) != 0) {
			if(IP[3] == 255 || IP[3] == endIP[3]) {
				if(IP[2] == 255 || IP[2] == endIP[2]) {
					if(IP[1] == 255 || IP[1] == endIP[1]) {
						if(IP[0] <= 255 || IP[0] <= endIP[0]) {
							IP[0]++;
							IP[1] = IP[2] = IP[3] = 0;
						} else {
							return "";
						}
					} else {
						IP[1]++;
						IP[2] = IP[3] = 0;
					}
				} else {
					IP[2]++;
					IP[3] = 0;
				}
			} else {
				IP[3]++;	
			}
		} else {
			done = true;
			return "";
		}
	} else
		first = false;
	return inttostr(IP[0]) + "." + inttostr(IP[1]) + "." + inttostr(IP[2]) + "." + inttostr(IP[3]);
}

const std::string inttostr(const unsigned int x) {
    std::ostringstream o;
    if (!(o << x)) 
    	return "";
	return o.str();
}

void GetPrimaryIp(char* buffer, size_t buflen) 
{
    assert(buflen >= 16);

    int sock = socket(AF_INET, SOCK_DGRAM, 0);
    assert(sock != -1);

    const char* kGoogleDnsIp = "8.8.8.8";
    uint16_t kDnsPort = 53;
    struct sockaddr_in serv;
    memset(&serv, 0, sizeof(serv));
    serv.sin_family = AF_INET;
    serv.sin_addr.s_addr = inet_addr(kGoogleDnsIp);
    serv.sin_port = htons(kDnsPort);

    int err = connect(sock, (const sockaddr*) &serv, sizeof(serv));
    assert(err != -1);

    sockaddr_in name;
    socklen_t namelen = sizeof(name);
    err = getsockname(sock, (sockaddr*) &name, &namelen);
    assert(err != -1);

    const char* p = inet_ntop(AF_INET, &name.sin_addr, buffer, buflen);
    assert(p);

    close(sock);
}

int curl( char *ip )
{
  CURL *curl;
  CURLcode res;

  curl = curl_easy_init();
  char ipp[ 50 ];
  strcpy( ipp, "http://" );
  strcat( ipp, ip );
  printf( "In curl for address %s\n", ipp );

  if(curl) {
    curl_easy_setopt(curl, CURLOPT_URL, ipp );
    res = curl_easy_perform(curl);
    printf( "%s\n", curl_easy_strerror(res) );

    /* always cleanup */
    curl_easy_cleanup(curl);
  }
  return 0;
}
