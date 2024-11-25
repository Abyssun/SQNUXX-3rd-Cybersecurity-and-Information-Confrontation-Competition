#include <stdio.h>
#include <string.h>
#include <stdlib.h>

char buffer[0x108];
int a = 1;
// 易受攻击的函数
void vulnerable_function(char *input) {
    char buffer[0x100];
    strcpy(buffer, input); // 这里存在off-by-null漏洞
    read(0,buffer,sizeof(buffer)-1);
    a=100;
}
#include <stdio.h>

void init() {
    setbuf(stdin, 0);  
    setbuf(stderr, 0);  
    setbuf(stdout, 0); 
}

void main() {
    init();
    int (*puts_ptr)(const char*) = puts;// 定义一个指向puts函数的指针
    puts("Who ponders the solitary chill of the western wind?");
    read(0,buffer,0x100); // 进行一次输入，对输入字节数进行了限制，off-by-null
    puts(&puts_ptr);// 打印puts函数的地址

    vulnerable_function(buffer);// 布栈
    return;
}
// gcc -fno-stack-protector -no-pie -o pwn pwn1.c
// patch rax,r12,r13 ==> 0