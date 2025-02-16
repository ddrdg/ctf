# ctf

rustscan -r 1-65535 -a ip
nmap -sV -sC -p ip

ffuf -w /opt/wordlist/dirbuster/directory-list-2.3-medium.txt -u http://10.10.97.159/FUZZ

