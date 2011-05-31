#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>

void fatal()
{
	fprintf(stderr, "Usage: cidr2range ip/netmask\n");
	exit(EXIT_FAILURE);
}

unsigned int ip2ui(char *ip)
{
	/* An IP consists of four ranges. */
	long ipAsUInt = 0;
	/* Deal with first range. */
	char *cPtr = strtok(ip, ".");
	if(cPtr) ipAsUInt += atoi(cPtr) * pow(256, 3);

	/* Proceed with the remaining ones. */
	int exponent = 2;
	while(cPtr && exponent >= 0)
	{
		cPtr = strtok(NULL, ".\0");
		if(cPtr) ipAsUInt += atoi(cPtr) * pow(256, exponent--);
	}

	return ipAsUInt;
}

char *ui2ip(unsigned int ipAsUInt)
{
	char *ip = malloc(16*sizeof(char));
	int exponent;
	for(exponent = 3; exponent >= 0; --exponent)
	{
		unsigned int r = ipAsUInt / pow(256, exponent);
		char buf[4];
		sprintf(buf, "%d", r);
		//printf( "%u", r );
		strcat(ip, buf);
		strcat(ip, ".");
		ipAsUInt -= r*pow(256, exponent);
	}
	/* Replace last dot with '\0'. */
	ip[strlen(ip)-1] = 0;
	return ip;
}

unsigned int createBitmask(const char *bitmask)
{
	unsigned int times = (unsigned int)atol(bitmask)-1, i, bitmaskAsUInt = 1;
	/* Fill in set bits (1) from the right. */
	for(i=0; i<times; ++i)
	{
		bitmaskAsUInt <<= 1;
		bitmaskAsUInt |= 1;
	}
	/* Shift in unset bits from the right. */
	for(i=0; i<32-times-1; ++i)
		bitmaskAsUInt <<= 1;
	return bitmaskAsUInt;
}

int main(int argc, char **argv)
{
	/* Correct call? */
	if(argc!=2) fatal();
	
	/* Split arguments and terminate application if wrong format. */
	char *ip, *bitmask;
	ip = strtok(argv[1], "/");
	if(!ip) fatal();
	bitmask = strtok(NULL, "\0");
	if(!bitmask) fatal();
	
	/* Convert the ASCII strings to workable integers.
	 * The inet_addr() function cannot be used because
	 * the resulting integer is in NBO.
	*/
	unsigned int ipAsUInt = ip2ui(ip);
	unsigned int bitmaskAsUInt = createBitmask(bitmask);

	char *networkAddress = ui2ip(ipAsUInt & bitmaskAsUInt),
		 *broadcastAddress = ui2ip(ipAsUInt | ~bitmaskAsUInt);
	printf("IP range spans from %s to %s (Network and broadcast addresses inclusive)\n", networkAddress, broadcastAddress);
	free(networkAddress);
	free(broadcastAddress);
	return 0;
}
