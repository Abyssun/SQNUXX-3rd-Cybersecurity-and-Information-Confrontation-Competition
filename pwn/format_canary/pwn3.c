#include <stdio.h>
#include <stdlib.h>

void vuln(){
    char buf[8];
    read(0,buf,0x20); // 返回main再次布栈可打通
}

void gadgets() {
    int a = 0xc35f;
    system("echo flag");
}
int main() {
    setbuf(stdin, 0);  
    setbuf(stderr, 0);  
    setbuf(stdout, 0);
    
    char buf[0x28];
    puts("Pondering the past as I stand in the remnants of the setting sun.");
    read(0,buf,sizeof(buf)-1);
    printf(buf);// 格式化字符串leak
    
    vuln(); // 调用漏洞函数

    puts("good!");
}
// gcc -s -o pwn -z lazy pwn3.c