import serial
mathematician =serial.Serial("COM8", 9600)
disp=mathematician.readline()
print (disp)
