#include<stdio.h>
#include<stdlib.h>

void init(){
  setvbuf(stdin, 0LL, 2, 0LL);
  setvbuf(stdout, 0LL, 2, 0LL);
  setvbuf(stderr, 0LL, 2, 0LL);
}
void pwnme(){
    system("/bin/sh");
}


int main(){
	init();
    char buf[10];
    gets(buf);
    printf("恭喜你再上一层楼\n");
    return 0;
}
