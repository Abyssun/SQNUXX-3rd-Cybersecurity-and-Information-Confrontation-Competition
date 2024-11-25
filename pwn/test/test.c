#include <stdio.h>

int main() {
    int gadget = 0xc35f;
    int number;
    printf("请输入一个整数: ");
    scanf("%d", &number);

    int square = number * number;
    printf("该整数的平方是: %d\n", square);

    return 0;
}
// gcc -o output_file -no-pie  test.c
// gcc -g -o output_file test.c
// gcc -s -o output_file test.c
// gcc -o output_file -no-pie -fno-stack-protector test.c