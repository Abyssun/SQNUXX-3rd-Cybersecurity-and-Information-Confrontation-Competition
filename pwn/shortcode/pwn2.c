#include <stdio.h>  
#include <string.h>

char buff[0x20];  

int main() {  
    setbuf(stdin, 0);  
    setbuf(stderr, 0);  
    setbuf(stdout, 0);  
    
    mprotect((long long)(&stdout) & 0xffffffffffffff000, 0x1000, 7);  
    
    char buf[0x20];  
    memset(buf, 0, 0x20);
    puts("The yellow leaves rustle and close the sparsely arranged window.");
    read(0, buff, 0x20);    

    ((void(*)())&buff)(); // 考点就是短shellcode

    return 0;  
}
// gcc -o pwn pwn2.c