section .bss
    buffer resb 1024 ; 定义一个缓冲区，大小为1024字节

section .data
    msg db 'What was once thought ordinary, now seems extraordinary.', 0xA, 0xD ; 提示信息
    msg_len equ $ - msg ; 计算提示信息的长度
    binsh db '/bin/sh',0x0 ;

section .text
    global _start

_start:
    sub rsp, 8          ;
    ; 输出提示信息
    mov rax, 1          ; syscall number for sys_write
    mov rdi, 1          ; file descriptor 1 is stdout
    mov rsi, msg        ; pointer to message to write
    mov rdx, msg_len    ; message length
    syscall             ; call kernel

    ; 读取用户输入
    mov rax, 0          ; syscall number for sys_read
    mov rdi, 0          ; file descriptor 0 is stdin
    mov rsi, rsp        ; pointer to buffer where input will be stored
    mov rdx, 1024       ; maximum number of bytes to read
    syscall             ; call kernel

    ; 输出用户输入的内容
    mov rdx, 8          ; number of bytes read (returned by sys_read)
    mov rax, 1          ; syscall number for sys_write
    mov rdi, 1          ; file descriptor 1 is stdout
    mov rsi, rsp        ; pointer to buffer containing user input
    syscall             ; call kernel

    pop rbp             ;
    ret                 ;

    pop rsi             ;
    pop rax             ; pop rax
    retn                ;

; nasm -f elf64 -o program.o test.asm
; ld -o output_file program.o

