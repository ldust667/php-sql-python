
from scapy.all import *
import sys

macfile=open(sys.argv[1],"r")
macfile.seek(0)
mac=macfile.readline()


for mac in macfile.readlines():
	mac=mac.rstrip()
	mac=mac.replace(":","")
	mac=mac.decode("hex")
	
	FF='\xff'
	sendp(Ether(dst='ff:ff:ff:ff:ff:ff') /IP(dst='255.255.255.255',version=4L) /UDP(dport=9) /Raw(FF*6+mac*16),iface="enp2s0")

macfile.close()
