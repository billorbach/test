#include <stdio.h>
#include "curl/curl.h"
#include "curl/easy.h"

int main(void)
{
  CURL *curl;
  CURLcode res;

  curl = curl_easy_init();
  if(curl) {
    curl_easy_setopt(curl, CURLOPT_URL, "http://www.yahoo.com");
    res = curl_easy_perform(curl);
    printf( "%s\n", curl_easy_strerror(res) );

    /* always cleanup */
    curl_easy_cleanup(curl);
  }
  return 0;
}
