#include <stdio.h>
#include <stdint.h>
#include <string.h>
#include <stdlib.h>

// 解码Base64字符到值
int base64_char_value(char c) {
    const char* base64_chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
    char* pos = strchr(base64_chars, c);
    if (pos) {
        return pos - base64_chars;
    } else {
        return -1;
    }
}

// 将四个Base64字符转换为三个字节
void base64_to_bytes(const char* input, unsigned char* output) {
    uint32_t sextet_a = base64_char_value(input[0]);
    uint32_t sextet_b = base64_char_value(input[1]);
    uint32_t sextet_c = base64_char_value(input[2]);
    uint32_t sextet_d = base64_char_value(input[3]);

    uint32_t triple = (sextet_a << 18) + (sextet_b << 12) + (sextet_c << 6) + sextet_d;

    output[0] = (triple >> 16) & 0xFF;
    output[1] = (triple >> 8) & 0xFF;
    output[2] = triple & 0xFF;
}

// 解码Base64字符串
char* base64_decode(const char* data, size_t input_length, size_t* output_length) {
    size_t in_len = input_length;
    size_t out_len = (in_len / 4) * 3;
    if (data[in_len - 1] == '=') out_len--;
    if (data[in_len - 2] == '=') out_len--;

    unsigned char* decoded_data = malloc(out_len);
    if (decoded_data == NULL) return NULL;

    for (size_t i = 0, j = 0; i < in_len; i += 4, j += 3) {
        base64_to_bytes(&data[i], &decoded_data[j]);
    }

    *output_length = out_len;
    return (char*)decoded_data;
}

void gadget() {
    unsigned long long sh = 0xc35f5058415c415d;
}
// backdoor
void backdoor() {
    system("/bin/sh");
}
void init() {
    setbuf(stdin, 0);  
    setbuf(stderr, 0);  
    setbuf(stdout, 0); 
}
// 主程序入口
int main() {
    char output[0x50];
    char input[256];
    
    init();
    printf("How are you feeling right now?\n");
    scanf("%s", input);

    size_t output_length;
    char* decoded = base64_decode(input, strlen(input), &output_length);

    if (decoded != NULL) {
        printf("You win.\n");
        memcpy(output,decoded,strlen(input)+1);
    } else {
        printf("Gambling with books is worthy of the aroma of tea, as if splashed about.\n");
    }

    return 0;
}
// gcc -s -no-pie -fno-stack-protector -o pwn pwn5.c