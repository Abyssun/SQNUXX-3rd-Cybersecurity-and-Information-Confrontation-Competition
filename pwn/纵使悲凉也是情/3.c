#include <stdio.h>
#include <stdlib.h>
void init(){
  setvbuf(stdin, 0LL, 2, 0LL);
  setvbuf(stdout, 0LL, 2, 0LL);
  setvbuf(stderr, 0LL, 2, 0LL);
}
int main()
{
  init();
  char v1[44];
  float v2;

  v2 = 0.0;
  puts("Let's guess the number.");
  gets(v1);
  if ( v2 == 13.14 )
    return system("/bin/sh");
  else
    return puts("Its value should be 13.14");
}