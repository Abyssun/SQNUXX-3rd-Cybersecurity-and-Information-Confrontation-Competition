#include <stdio.h>
#include <stdlib.h>
#include <string.h>
void init(){
  setvbuf(stdin, NULL, _IONBF, 0);
  setvbuf(stdout, NULL, _IONBF, 0);
  setvbuf(stderr, NULL, _IONBF, 0);
}
int main(){
	init();
	char a[100];
	printf("悟已往之不谏\n");
	scanf("%s",a);
	if (strcmp(a, "知来者之可追") == 0)
	{
		printf("好样的少年，希望你能继续坚持下去\n");
		system("/bin/sh");
	}
	return 0;
}
