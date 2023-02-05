import serial
mathematician =serial.Serial("COM18", 9600)
disp=mathematician.readline()
print (disp)
